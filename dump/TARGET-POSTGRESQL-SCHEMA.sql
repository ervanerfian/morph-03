-- ============================================================================
-- Target PostgreSQL Schema — Morph Workspace (Fresh Architecture, UUID)
-- ============================================================================
-- File: dump/TARGET-POSTGRESQL-SCHEMA.sql
-- Tanggal: 2026-10-31
-- Status: DRAFT — belum dijalankan. Jalankan sendiri di HeidiSQL/psql setelah review.
-- Batasan: Sanduk agent tidak memiliki psql, docker, atau PHP-PDO_PGSQL.
--          Skrip ini hanya disediakan sebagai dokumen untuk dieksekusi user.
--
-- KONSEP FRESH:
--   1. Semua ID menggunakan UUID dengan gen_random_uuid() (PostgreSQL 16 native).
--   2. Tidak butuh CREATE EXTENSION "uuid-ossp".
--   3. Semua tabel lama (jika ada) di-DROP terlebih dahulu, lalu dibuat ulang fresh.
--   4. Tidak ada data lama yang diimpor atau dipelihara.
--   5. Satu user (morph_admin) bisa menjalankan skrip ini.
--
-- PERINGATAN: Skrip ini akan MENGHAPUS semua tabel Morph yang sudah ada
--             dan membuatnya ulang dari nol. Data lama akan hilang.
--             Jangan jalankan pada database produksi kecuali kamu yakin.
-- ============================================================================

-- ============================================================================
-- 0. DROP SEMUA TABEL LAMA (Fresh Start)
-- ============================================================================

DROP TABLE IF EXISTS morph_layout_configs CASCADE;
DROP TABLE IF EXISTS morph_order_configs CASCADE;
DROP TABLE IF EXISTS morph_modal_configs CASCADE;
DROP TABLE IF EXISTS morph_definitions CASCADE;
DROP TABLE IF EXISTS morph_user_preferences CASCADE;
DROP TABLE IF EXISTS morph_design_tokens CASCADE;
DROP TABLE IF EXISTS morph_lookup_definitions CASCADE;
DROP TABLE IF EXISTS morph_relation_config CASCADE;
DROP TABLE IF EXISTS morph_relation_edges CASCADE;
DROP TABLE IF EXISTS morph_records CASCADE;
DROP TABLE IF EXISTS morph_field_bindings CASCADE;
DROP TABLE IF EXISTS morph_field_definitions CASCADE;
DROP TABLE IF EXISTS morph_table_views CASCADE;
DROP TABLE IF EXISTS morph_data_sources CASCADE;
DROP TABLE IF EXISTS morph_page_sections CASCADE;
DROP TABLE IF EXISTS morph_pages CASCADE;
DROP TABLE IF EXISTS extension_members CASCADE;
DROP TABLE IF EXISTS workspace_extensions CASCADE;
DROP TABLE IF EXISTS extension_instances CASCADE;
DROP TABLE IF EXISTS extension_catalog CASCADE;
DROP TABLE IF EXISTS workspace_members CASCADE;
DROP TABLE IF EXISTS workspaces CASCADE;
DROP TABLE IF EXISTS user_sessions CASCADE;
DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS morph_migrations CASCADE;
DROP TABLE IF EXISTS morph_globals CASCADE;

-- ============================================================================
-- 1. CORE WORKSPACE & ACCESS
-- ============================================================================

CREATE TABLE users (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    email TEXT NOT NULL UNIQUE,
    username TEXT NOT NULL UNIQUE,
    display_name TEXT,
    avatar_url TEXT,
    status TEXT NOT NULL DEFAULT 'active',
    password_hash TEXT,
    preferences JSONB NOT NULL DEFAULT '{}',
    email_verified_at TIMESTAMPTZ,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    deleted_at TIMESTAMPTZ,
    version INTEGER NOT NULL DEFAULT 1
);

CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_users_status ON users(status);

CREATE TABLE workspaces (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    slug TEXT NOT NULL UNIQUE,
    name TEXT NOT NULL,
    description TEXT,
    owner_user_id UUID NOT NULL REFERENCES users(id) ON DELETE RESTRICT,
    visibility TEXT NOT NULL DEFAULT 'private',
    settings JSONB NOT NULL DEFAULT '{}',
    plan TEXT NOT NULL DEFAULT 'free',
    status TEXT NOT NULL DEFAULT 'active',
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    deleted_at TIMESTAMPTZ,
    version INTEGER NOT NULL DEFAULT 1
);

CREATE INDEX idx_workspaces_slug ON workspaces(slug);
CREATE INDEX idx_workspaces_owner ON workspaces(owner_user_id);
CREATE INDEX idx_workspaces_status ON workspaces(status);

CREATE TABLE workspace_members (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL REFERENCES workspaces(id) ON DELETE CASCADE,
    user_id UUID NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    role TEXT NOT NULL DEFAULT 'member',
    permissions JSONB NOT NULL DEFAULT '{}',
    status TEXT NOT NULL DEFAULT 'active',
    invited_by UUID REFERENCES users(id) ON DELETE NO ACTION,
    joined_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    version INTEGER NOT NULL DEFAULT 1,
    UNIQUE (workspace_id, user_id)
);

CREATE INDEX idx_wm_workspace ON workspace_members(workspace_id);
CREATE INDEX idx_wm_user ON workspace_members(user_id);
CREATE INDEX idx_wm_role ON workspace_members(workspace_id, role);
CREATE INDEX idx_wm_status ON workspace_members(status);

-- extension_catalog harus dibuat SEBELUM extension_instances
-- karena extension_instances merujuk ke extension_catalog

CREATE TABLE extension_catalog (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    name TEXT NOT NULL,
    display_name TEXT,
    description TEXT,
    version TEXT NOT NULL DEFAULT '1.0.0',
    icon TEXT,
    collections JSONB NOT NULL DEFAULT '[]',
    globals JSONB NOT NULL DEFAULT '[]',
    status TEXT NOT NULL DEFAULT 'active',
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    version_seq INTEGER NOT NULL DEFAULT 1
);

CREATE INDEX idx_ext_catalog_status ON extension_catalog(status);

-- extension_instances harus dibuat SEBELUM workspace_extensions
-- karena workspace_extensions merujuk ke extension_instances

CREATE TABLE extension_instances (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    catalog_id UUID NOT NULL REFERENCES extension_catalog(id),
    instance_key TEXT NOT NULL UNIQUE,
    label TEXT NOT NULL,
    owner_user_id UUID NOT NULL REFERENCES users(id) ON DELETE RESTRICT,
    workspace_id UUID REFERENCES workspaces(id) ON DELETE SET NULL,
    config JSONB NOT NULL DEFAULT '{}',
    data_source TEXT NOT NULL DEFAULT 'postgres',
    quota JSONB NOT NULL DEFAULT '{}',
    template_id TEXT,
    head_revision BIGINT NOT NULL DEFAULT 1,
    status TEXT NOT NULL DEFAULT 'active',
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    deleted_at TIMESTAMPTZ,
    version INTEGER NOT NULL DEFAULT 1
);

CREATE INDEX idx_ext_instances_catalog ON extension_instances(catalog_id);
CREATE INDEX idx_ext_instances_instance_key ON extension_instances(instance_key);
CREATE INDEX idx_ext_instances_owner ON extension_instances(owner_user_id);
CREATE INDEX idx_ext_instances_workspace ON extension_instances(workspace_id);
CREATE INDEX idx_ext_instances_status ON extension_instances(status);

CREATE TABLE workspace_extensions (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL REFERENCES workspaces(id) ON DELETE CASCADE,
    extension_instance_id UUID NOT NULL REFERENCES extension_instances(id),
    role_required TEXT NOT NULL DEFAULT 'member',
    status TEXT NOT NULL DEFAULT 'active',
    settings JSONB NOT NULL DEFAULT '{}',
    installed_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    UNIQUE (workspace_id, extension_instance_id)
);

CREATE INDEX idx_we_workspace ON workspace_extensions(workspace_id);
CREATE INDEX idx_we_instance ON workspace_extensions(extension_instance_id);
CREATE INDEX idx_we_status ON workspace_extensions(status);

CREATE TABLE extension_members (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL REFERENCES workspaces(id) ON DELETE CASCADE,
    extension_instance_id UUID NOT NULL REFERENCES extension_instances(id),
    user_id UUID NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    role TEXT NOT NULL DEFAULT 'member',
    status TEXT NOT NULL DEFAULT 'active',
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    UNIQUE (workspace_id, extension_instance_id, user_id)
);

CREATE INDEX idx_em_workspace ON extension_members(workspace_id);
CREATE INDEX idx_em_extension ON extension_members(extension_instance_id);
CREATE INDEX idx_em_user ON extension_members(user_id);
CREATE INDEX idx_em_role ON extension_members(workspace_id, extension_instance_id, role);

CREATE TABLE user_sessions (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    user_id UUID NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    token_hash TEXT NOT NULL UNIQUE,
    expires_at TIMESTAMPTZ NOT NULL,
    revoked_at TIMESTAMPTZ,
    ip TEXT,
    user_agent TEXT,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE INDEX idx_user_sessions_user ON user_sessions(user_id);
CREATE INDEX idx_user_sessions_token ON user_sessions(token_hash);
CREATE INDEX idx_user_sessions_expires ON user_sessions(expires_at);

-- ============================================================================
-- 2. PAGES & PAGE CONFIGURATION
-- ============================================================================

CREATE TABLE morph_pages (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL,
    p_code TEXT NOT NULL UNIQUE,
    owner_user_id UUID NOT NULL REFERENCES users(id),
    title TEXT NOT NULL,
    config JSONB NOT NULL DEFAULT '{}',
    shell_config JSONB NOT NULL DEFAULT '{}',
    status TEXT NOT NULL DEFAULT 'active',
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    deleted_at TIMESTAMPTZ
);

CREATE INDEX idx_pages_workspace ON morph_pages(workspace_id);
CREATE INDEX idx_pages_p_code ON morph_pages(p_code);
CREATE INDEX idx_pages_owner ON morph_pages(owner_user_id);

CREATE TABLE morph_page_sections (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    page_id UUID NOT NULL REFERENCES morph_pages(id) ON DELETE CASCADE,
    section_type TEXT NOT NULL,
    section_id UUID NOT NULL,
    section_label TEXT,
    ordering INTEGER NOT NULL DEFAULT 0,
    is_visible BOOLEAN NOT NULL DEFAULT true,
    config JSONB NOT NULL DEFAULT '{}',
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE INDEX idx_page_sections_page ON morph_page_sections(page_id);
CREATE INDEX idx_page_sections_ordering ON morph_page_sections(page_id, ordering);

-- ============================================================================
-- 3. GENERIC DATA ENGINE — Metadata Layer
-- ============================================================================

CREATE TABLE morph_data_sources (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL,
    label TEXT NOT NULL,
    binding_key TEXT NOT NULL,
    template_id TEXT,
    head_revision BIGINT NOT NULL DEFAULT 1,
    lifecycle TEXT NOT NULL DEFAULT 'active',
    created_by UUID NOT NULL REFERENCES users(id),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),

    CONSTRAINT morph_data_sources_workspace_unique UNIQUE (workspace_id, binding_key)
);

CREATE INDEX idx_data_sources_workspace ON morph_data_sources(workspace_id);
CREATE INDEX idx_data_sources_template ON morph_data_sources(template_id);

CREATE TABLE morph_table_views (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL,
    data_source_id UUID NOT NULL REFERENCES morph_data_sources(id),
    label TEXT NOT NULL,
    ordering INTEGER NOT NULL DEFAULT 0,
    is_active BOOLEAN NOT NULL DEFAULT true,
    config JSONB NOT NULL DEFAULT '{}',
    created_by UUID NOT NULL REFERENCES users(id),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),

    CONSTRAINT morph_table_views_workspace_unique UNIQUE (workspace_id, label)
);

CREATE INDEX idx_table_views_workspace ON morph_table_views(workspace_id);
CREATE INDEX idx_table_views_data_source ON morph_table_views(data_source_id);

CREATE TABLE morph_field_definitions (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL,
    label TEXT NOT NULL,
    type TEXT NOT NULL,
    config_json JSONB NOT NULL DEFAULT '{}',
    is_system BOOLEAN NOT NULL DEFAULT false,
    created_by UUID NOT NULL REFERENCES users(id),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE INDEX idx_field_definitions_workspace ON morph_field_definitions(workspace_id);
CREATE INDEX idx_field_definitions_type ON morph_field_definitions(type);

CREATE TABLE morph_field_bindings (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL,
    table_view_id UUID NOT NULL REFERENCES morph_table_views(id),
    field_definition_id UUID NOT NULL REFERENCES morph_field_definitions(id),
    is_active BOOLEAN NOT NULL DEFAULT true,
    position INTEGER NOT NULL DEFAULT 0,
    label_override TEXT,
    is_required BOOLEAN NOT NULL DEFAULT false,
    is_readonly_ui BOOLEAN NOT NULL DEFAULT false,
    created_by UUID NOT NULL REFERENCES users(id),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),

    CONSTRAINT morph_field_bindings_unique UNIQUE (workspace_id, table_view_id, field_definition_id)
);

CREATE INDEX idx_field_bindings_table_view ON morph_field_bindings(table_view_id);
CREATE INDEX idx_field_bindings_field_def ON morph_field_bindings(field_definition_id);
CREATE INDEX idx_field_bindings_active ON morph_field_bindings(is_active);

-- ============================================================================
-- 4. GENERIC DATA ENGINE — Data Layer
-- ============================================================================

CREATE TABLE morph_records (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    record_key TEXT NOT NULL,
    workspace_id UUID NOT NULL,
    data_source_id UUID NOT NULL REFERENCES morph_data_sources(id),
    creator_id UUID NOT NULL REFERENCES users(id),
    schema_revision BIGINT NOT NULL DEFAULT 1,
    request_id TEXT,
    values_json JSONB NOT NULL DEFAULT '{}',
    version_token TEXT NOT NULL,
    lifecycle TEXT NOT NULL DEFAULT 'active',
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),

    CONSTRAINT morph_records_workspace_key_unique UNIQUE (workspace_id, record_key)
);

CREATE INDEX idx_records_workspace ON morph_records(workspace_id);
CREATE INDEX idx_records_data_source ON morph_records(data_source_id);
CREATE INDEX idx_records_lifecycle ON morph_records(lifecycle);
CREATE INDEX idx_records_values_gin ON morph_records USING gin(values_json);
CREATE UNIQUE INDEX idx_records_request_id ON morph_records(request_id) WHERE request_id IS NOT NULL;

CREATE TABLE morph_relation_edges (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL,
    source_data_source_id UUID NOT NULL REFERENCES morph_data_sources(id),
    source_record_id UUID NOT NULL REFERENCES morph_records(id),
    source_field_id UUID NOT NULL REFERENCES morph_field_bindings(id),
    target_data_source_id UUID NOT NULL REFERENCES morph_data_sources(id),
    target_record_id UUID NOT NULL REFERENCES morph_records(id),
    cardinality TEXT NOT NULL DEFAULT 'single',
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),

    CONSTRAINT morph_relation_edges_unique UNIQUE (
        workspace_id,
        source_data_source_id,
        source_record_id,
        source_field_id,
        target_data_source_id,
        target_record_id
    )
);

CREATE INDEX idx_relation_edges_source ON morph_relation_edges(source_data_source_id, source_record_id);
CREATE INDEX idx_relation_edges_target ON morph_relation_edges(target_data_source_id, target_record_id);
CREATE INDEX idx_relation_edges_workspace ON morph_relation_edges(workspace_id);
CREATE INDEX idx_relation_edges_source_field ON morph_relation_edges(source_field_id);

CREATE TABLE morph_relation_config (
    field_binding_id UUID PRIMARY KEY REFERENCES morph_field_bindings(id),
    target_data_source_id UUID NOT NULL REFERENCES morph_data_sources(id),
    target_record_id UUID NOT NULL REFERENCES morph_records(id),
    display_field_id UUID NOT NULL REFERENCES morph_field_definitions(id),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE INDEX idx_relation_config_target ON morph_relation_config(target_data_source_id, target_record_id);

CREATE TABLE morph_lookup_definitions (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL,
    source_field_id UUID NOT NULL REFERENCES morph_field_bindings(id),
    path TEXT NOT NULL,
    target_data_source_id UUID NOT NULL REFERENCES morph_data_sources(id),
    target_field_id UUID NOT NULL REFERENCES morph_field_definitions(id),
    label TEXT NOT NULL,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- ============================================================================
-- 5. DESIGN TOKENS & PREFERENCES
-- ============================================================================

CREATE TABLE morph_design_tokens (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL,
    token_key TEXT NOT NULL,
    token_value TEXT NOT NULL,
    token_category TEXT NOT NULL DEFAULT 'visual',
    scope TEXT NOT NULL DEFAULT 'workspace',
    created_by UUID NOT NULL REFERENCES users(id),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),

    CONSTRAINT morph_design_tokens_unique UNIQUE (workspace_id, token_key, scope)
);

CREATE INDEX idx_design_tokens_workspace ON morph_design_tokens(workspace_id);
CREATE INDEX idx_design_tokens_scope ON morph_design_tokens(scope);
CREATE INDEX idx_design_tokens_category ON morph_design_tokens(token_category);

CREATE TABLE morph_user_preferences (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    user_id UUID NOT NULL REFERENCES users(id),
    workspace_id UUID NOT NULL,
    preference_key TEXT NOT NULL,
    preference_value JSONB NOT NULL DEFAULT '{}',
    is_global BOOLEAN NOT NULL DEFAULT false,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),

    CONSTRAINT morph_user_preferences_unique UNIQUE (user_id, workspace_id, preference_key)
);

CREATE INDEX idx_user_preferences_user ON morph_user_preferences(user_id);
CREATE INDEX idx_user_preferences_workspace ON morph_user_preferences(workspace_id);

-- ============================================================================
-- 6. METADATA & DEFINITIONS
-- ============================================================================

CREATE TABLE morph_definitions (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL,
    definition_type TEXT NOT NULL,
    definition_json JSONB NOT NULL,
    revision BIGINT NOT NULL DEFAULT 1,
    is_published BOOLEAN NOT NULL DEFAULT false,
    created_by UUID NOT NULL REFERENCES users(id),
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE INDEX idx_definitions_workspace ON morph_definitions(workspace_id);
CREATE INDEX idx_definitions_type ON morph_definitions(definition_type);
CREATE INDEX idx_definitions_published ON morph_definitions(is_published);

-- ============================================================================
-- 7. UI MECHANISM TABLES
-- ============================================================================

CREATE TABLE morph_modal_configs (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL,
    modal_type TEXT NOT NULL,
    config JSONB NOT NULL DEFAULT '{}',
    is_global BOOLEAN NOT NULL DEFAULT false,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE INDEX idx_modal_configs_workspace ON morph_modal_configs(workspace_id);
CREATE INDEX idx_modal_configs_type ON morph_modal_configs(modal_type);

CREATE TABLE morph_order_configs (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL,
    owner_type TEXT NOT NULL,
    owner_id UUID NOT NULL,
    ordering_config JSONB NOT NULL DEFAULT '{}',
    version BIGINT NOT NULL DEFAULT 1,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE INDEX idx_order_configs_owner ON morph_order_configs(owner_type, owner_id);

CREATE TABLE morph_layout_configs (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id UUID NOT NULL,
    layout_type TEXT NOT NULL,
    config JSONB NOT NULL DEFAULT '{}',
    is_pinned BOOLEAN NOT NULL DEFAULT false,
    pinned_position INTEGER,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE INDEX idx_layout_configs_workspace ON morph_layout_configs(workspace_id);
CREATE INDEX idx_layout_configs_pinned ON morph_layout_configs(is_pinned, pinned_position);

-- ============================================================================
-- 8. MIGRATIONS TRACKING
-- ============================================================================

CREATE TABLE morph_migrations (
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL UNIQUE,
    batch INTEGER NOT NULL,
    executed_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- ============================================================================
-- 9. SEED DATA — User Default untuk Pengembangan
-- ============================================================================
-- PENTING: Password di bawah ini adalah PLAIN TEXT untuk pengembangan.
--          Sebelum produksi, ganti dengan bcrypt hash yang sebenarnya.
--          Kolom password_hash di tabel users menyimpan hash, bukan plain text.
--
-- Pola email: [role]@gmail.com
-- Password: 12345678 (semua user sama untuk pengembangan)
-- ============================================================================

INSERT INTO users (id, email, username, display_name, status, password_hash, email_verified_at, created_at, updated_at, version) VALUES
    ('a0eebc99-9c0b-4ef8-bb6d-6bb9bd380a11', 'super-admin@gmail.com', 'super-admin', 'Super Admin', 'active', '$2b$10$PLACEHOLDER_HASH_SUPER_ADMIN', now(), now(), now(), 1),
    ('b1eebc99-9c0b-4ef8-bb6d-6bb9bd380a22', 'owner@gmail.com', 'owner', 'Owner Workspace', 'active', '$2b$10$PLACEHOLDER_HASH_OWNER', now(), now(), now(), 1),
    ('c2eebc99-9c0b-4ef8-bb6d-6bb9bd380a33', 'admin@gmail.com', 'admin', 'Admin', 'active', '$2b$10$PLACEHOLDER_HASH_ADMIN', now(), now(), now(), 1),
    ('d3eebc99-9c0b-4ef8-bb6d-6bb9bd380a44', 'editor@gmail.com', 'editor', 'Editor', 'active', '$2b$10$PLACEHOLDER_HASH_EDITOR', now(), now(), now(), 1),
    ('e4eebc99-9c0b-4ef8-bb6d-6bb9bd380a55', 'member@gmail.com', 'member', 'Member', 'active', '$2b$10$PLACEHOLDER_HASH_MEMBER', now(), now(), now(), 1)
ON CONFLICT (email) DO NOTHING;

INSERT INTO workspaces (id, slug, name, description, owner_user_id, visibility, settings, plan, status, created_at, updated_at, version) VALUES
    ('f5eebc99-9c0b-4ef8-bb6d-6bb9bd380a66', 'owner-workspace', 'Workspace Owner', 'Workspace default untuk Owner', 'b1eebc99-9c0b-4ef8-bb6d-6bb9bd380a22', 'private', '{}', 'free', 'active', now(), now(), 1)
ON CONFLICT (slug) DO NOTHING;

INSERT INTO workspace_members (id, workspace_id, user_id, role, permissions, status, invited_by, joined_at, created_at, updated_at, version) VALUES
    ('a6eebc99-9c0b-4ef8-bb6d-6bb9bd380a77', 'f5eebc99-9c0b-4ef8-bb6d-6bb9bd380a66', 'a0eebc99-9c0b-4ef8-bb6d-6bb9bd380a11', 'super_admin', '{"view":true,"comment":true,"edit_own_records":true,"delete_own_records":true,"edit_member_records":true,"delete_member_records":true,"admin_all":true}', 'active', 'a0eebc99-9c0b-4ef8-bb6d-6bb9bd380a11', now(), now(), now(), 1),
    ('b7eebc99-9c0b-4ef8-bb6d-6bb9bd380a88', 'f5eebc99-9c0b-4ef8-bb6d-6bb9bd380a66', 'b1eebc99-9c0b-4ef8-bb6d-6bb9bd380a22', 'owner', '{"view":true,"comment":true,"edit_own_records":true,"delete_own_records":true,"edit_member_records":true,"delete_member_records":true,"admin_all":true}', 'active', 'b1eebc99-9c0b-4ef8-bb6d-6bb9bd380a22', now(), now(), now(), 1),
    ('c8eebc99-9c0b-4ef8-bb6d-6bb9bd380a99', 'f5eebc99-9c0b-4ef8-bb6d-6bb9bd380a66', 'c2eebc99-9c0b-4ef8-bb6d-6bb9bd380a33', 'admin', '{"view":true,"comment":true,"edit_own_records":true,"delete_own_records":true,"edit_member_records":true,"delete_member_records":false,"admin_all":false}', 'active', 'b1eebc99-9c0b-4ef8-bb6d-6bb9bd380a22', now(), now(), now(), 1),
    ('d9eebc99-9c0b-4ef8-bb6d-6bb9bd380abb', 'f5eebc99-9c0b-4ef8-bb6d-6bb9bd380a66', 'd3eebc99-9c0b-4ef8-bb6d-6bb9bd380a44', 'editor', '{"view":true,"comment":true,"edit_own_records":true,"delete_own_records":false,"edit_member_records":true,"delete_member_records":false,"admin_all":false}', 'active', 'b1eebc99-9c0b-4ef8-bb6d-6bb9bd380a22', now(), now(), now(), 1),
    ('e0eebc99-9c0b-4ef8-bb6d-6bb9bd380bcc', 'f5eebc99-9c0b-4ef8-bb6d-6bb9bd380a66', 'e4eebc99-9c0b-4ef8-bb6d-6bb9bd380a55', 'member', '{"view":true,"comment":true,"edit_own_records":true,"delete_own_records":false,"edit_member_records":false,"delete_member_records":false,"admin_all":false}', 'active', 'b1eebc99-9c0b-4ef8-bb6d-6bb9bd380a22', now(), now(), now(), 1)
ON CONFLICT (workspace_id, user_id) DO NOTHING;

-- ============================================================================
-- SELESAI
-- ============================================================================
-- Catatan:
-- 1. Skrip ini adalah DRAFT untuk STRUKTUR BARU SAHAJA. Review terlebih dahulu sebelum eksekusi.
-- 2. Jalankan sendiri di HeidiSQL/psql pada database Laragon Anda.
-- 3. Semua tabel lama akan di-DROP terlebih dahulu, lalu dibuat ulang fresh.
-- 4. Tidak ada data lama yang diimpor dari dump/morph-db.sql.
-- 5. File dump/morph-db.sql adalah hanya simpanan belaka (backup referensi).
-- 6. Semua ID menggunakan UUID dengan gen_random_uuid() (PostgreSQL 16 native).
-- 7. Tidak butuh CREATE EXTENSION "uuid-ossp".
-- 8. Integritas relation edge ditangani di lapisan aplikasi, bukan FK fisik PostgreSQL.
-- 9. Password seed data menggunakan placeholder hash. Ganti dengan bcrypt hash sebenarnya
--    sebelum penggunaan produksi.
-- ============================================================================
