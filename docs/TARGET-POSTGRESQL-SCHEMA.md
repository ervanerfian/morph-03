# Target PostgreSQL Schema Design — Morph Workspace (Komprehensif)

**Status: proposal target untuk database development baru; bukan persetujuan skema, DDL, migrasi, atau pembersihan.**
Diperbarui: 2026-11-02. Arah Fresh Database Architecture tidak mengotorisasi perubahan database.

Ini adalah **dokumen desain, bukan DDL siap eksekusi**. Tidak ada DDL yang dijalankan dari sandbox ini. Nama tabel, key, constraint, tipe, dan batas transaksi masih harus direview; belum ada skrip untuk dijalankan sebelum konsolidasi dan persetujuan eksplisit.

Dokumen ini mencakup **semua fitur Morph**: Generic Data Engine, Roles & Permissions, Pages, Workspace, View, IDs, Modal Mechanism, Reorder, Layout, Pinned, dan semua konfigurasi data yang terkait.

---

## 1. Filsufi Arsitektur

Developer membangun mesin dan aturan mainnya. User membangun struktur bisnis dan cara mengorganisasikan datanya.

Oleh karena itu:

- **Tidak ada satu tabel PostgreSQL fisik per preset/user.** Tidak boleh terjadi situasi di mana setiap kali user membuat preset PM baru, developer harus membuat tabel PostgreSQL baru.
- **Data Source** adalah sumber data permanen yang terpisah dari **Table View** (preset dan konfigurasi tampilan).
- Satu Data Source dapat memiliki banyak Table View. Membuat salinan PM tidak menggandakan data; hanya membuat variasi cara melihat data yang sama.
- **Record Identity** menggunakan `record_id` immutabel, terpisah dari `record_key` (business identifier yang boleh berubah).
- **Relation Edge** adalah logical edge, bukan foreign key PostgreSQL konvensional ke tabel fisik yang berbeda-beda.
- **Display Field** dipilih melalui radio button (satu field) dan tidak mengubah identitas relasi.
- **Setiap fitur Morph memiliki tempat konfigurasi dan data tersimpan** yang komprehensif. Tidak ada fitur yang dibilang "tidak ada ruang config/data".
- **Semua yang tampil di visual bukan hardcoded.** Semua bersifat on the fly, dieksekusi dari code, config, dan data. Bisa dijalankan dari command line, human (GUI — meski akhirnya menjadi data), dan AI. Tidak ada elemen visual yang dikodekan keras oleh developer.

---

## 1.5 Prinsip On the Fly / Config-Driven Everything

Semua aspek visual dan perilaku Morph dihasilkan secara dinamis dari konfigurasi dan data, bukan dari kode yang dikodekan keras (hardcoded).

| Aspek | Sumber | Eksekusi |
|---|---|---|
| Tampilan halaman | `morph_pages.config`, `morph_page_sections.config` | Code reads config → render UI on the fly |
| Keanggotaan Field di Table | `morph_field_bindings.is_active` pada Data Source/schema | View config mengatur visibilitas, urutan, dan label tanpa mengubah schema/value |
| Tipe field | `morph_field_definitions.type`, `config_json` | Code reads type → pilih renderer/input yang sesuai |
| Relasi | `morph_relation_edges`, `morph_relation_config.display_field_id` | Code baca edge → tampilkan nilai dari record tujuan |
| Modal | `morph_modal_configs.config` | Code baca config → tampilkan close control, shared token, geometry |
| Layout | `morph_layout_configs.config`, `is_pinned` | Code baca layout → atur shared geometry dan body wrapper |
| Urutan | `morph_order_configs.ordering_config` | Code baca urutan → tampilkan section/tab sesuai urutan |
| Izin | `workspace_members.permissions` JSONB | Code cek permission → tampilkan/sembunyikan aksi |
| Role | `workspace_members.role` | Code cek role → tentukan aksi yang diizinkan |

Eksekusi dapat dilakukan dari:
1. **Command line** — perintah CLI mengubah config/data, UI merespons segera.
2. **Human (GUI)** — pengguna mengubah konfigurasi melalui layar, disimpan sebagai data, visual diperbarui.
3. **AI** — AI mengubah config/data melalui engine yang sama, tidak ada jalur terpisah.

Tidak ada elemen visual yang terikat pada nama preset, tabel fisik, atau kode developer. Semua adalah konfigurasi data yang dapat diubah on the fly.

---

```text
┌─────────────┐       ┌──────────────────┐       ┌─────────────────┐
│   users     │       │   workspaces     │       │ workspace_members│
├─────────────┤       ├──────────────────┤       ├─────────────────┤
│ id (PK)     │───────┤ id (PK)          │───────┤ id (PK)         │
│ email       │       │ owner_user_id (FK│       │ workspace_id (FK│
│ username    │       │   → users.id)    │       │ user_id (FK →   │
│ role        │       │                  │       │   users.id)     │
│ status      │       │ ...              │       │ role            │
│ ...         │       │                  │       │ permissions JSONB│
└──────┬──────┘       └──────────────────┘       │ status          │
       │                                         └─────────┬───────┘
       │                                                   │
       │                                         ┌─────────┴────────┐
       │                                         │ workspace_extensions│
       │                                         ├──────────────────┤
       │                                         │ id (PK)          │
       │                                         │ workspace_id (FK │
       │                                         │   → workspaces.id)│
       │                                         │ extension_instance_id│
       │                                         │   → extension_instances.id)│
       │                                         │ role_required    │
       │                                         │ status           │
       │                                         │ settings JSONB   │
       │                                         └─────────┬────────┘
       │                                                   │
       │                                         ┌─────────┴────────┐
       │                                         │ extension_instances│
       │                                         ├──────────────────┤
       │                                         │ id (PK)          │
       │                                         │ catalog_id (FK   │
       │                                         │   → extension_catalog.id)│
       │                                         │ instance_key     │
       │                                         │ label            │
       │                                         │ owner_user_id    │
       │                                         │ workspace_id (FK │
       │                                         │   → workspaces.id)│
       │                                         │ config JSONB     │
       │                                         │ data_source TEXT │
       │                                         │ quota JSONB      │
       │                                         │ status           │
       │                                         │ deleted_at       │
       │                                         │ version          │
       │                                         └──────────────────┘
       │
       │                                         ┌──────────────────┐
       └────────────────────────────────────────►│ morph_pages      │
                                                 ├──────────────────┤
                                                 │ id (PK)          │
                                                 │ workspace_id (FK │
                                                 │   → workspaces.id)│
                                                 │ p_code           │
                                                 │ owner_user_id    │
                                                 │ title            │
                                                 │ config JSONB     │
                                                 │ shell_config JSONB│
                                                 │ status           │
                                                 │ created_at       │
                                                 │ updated_at       │
                                                 └────────┬─────────┘
                                                          │
                                          ┌───────────────┴───────────────┐
                                          │                                 │
                                          ▼                                 ▼
                                  ┌──────────────┐                   ┌──────────────┐
                                  │ page_sections│                   │ page_section_sections│
                                  ├──────────────┤                   ├──────────────┤
                                  │ id (PK)      │                   │ id (PK)      │
                                  │ page_id (FK  │                   │ page_id (FK  │
                                  │   → pages.id)│                   │   → pages.id)│
                                  │ section_type │                   │ section_type │
                                  │ section_id   │                   │ section_id   │
                                  │ ordering     │                   │ ordering     │
                                  │ is_visible   │                   │ is_visible   │
                                  │ config JSONB │                   │ config JSONB │
                                  └──────────────┘                   └──────────────┘
                         ┌────────────────────┐
                         │ morph_data_sources │
                         └─────────┬──────────┘
                                   │
                     ┌─────────────┼──────────────────────┐
                     │             │                      │
                     ▼             ▼                      ▼
              morph_table_views  morph_records      morph_field_bindings ◄── morph_field_definitions
              (presentation:     │                  (schema membership;
               visibility/order/ │                   is_active/is_required)
               label only)       ▼
                          morph_relation_edges
                          (source_field_id = field_definition_id;
                           immutable target_record_id per edge)

              morph_relation_config (schema, not a per-record value):
                field_definition_id, target_data_source_id,
                one display_field_id, cardinality = single V1
```

`field_definition_id*` dan `source_field_id*` menandai identitas Field kanonis V1: `field_definition_id`, bukan ID `morph_field_bindings`. Sesuai keputusan pengguna, `morph_field_bindings` adalah keanggotaan schema pada Data Source/Table (relasi konseptual ke `morph_data_sources.id`), bukan Table View; `morph_table_views.config` menyimpan preferensi visibilitas/urutan/label. Key/constraint PostgreSQL final masih perlu review. Identitas target Record (`target_record_id`) hanya ada pada edge per Record; config menentukan target Data Source, satu `display_field_id`, dan `single` target per source Record/Field. Source Record lain boleh menunjuk target yang sama; tidak ada keunikan target global.

---

## 3. Target PostgreSQL Schema per Kelompok Fitur

### 3.1 Core Workspace & Access (Dipertahankan dari eksisting, tanpa perubahan struktur fisik)

| Tabel | Fungsi | Catatan |
|---|---|---|
| `users` | Pengguna sistem | Tidak berubah |
| `workspaces` | Workspace tenant | Tidak berubah |
| `workspace_members` | Anggota workspace + role/permissions | Tidak berubah |
| `workspace_extensions` | Ekstensi terpasang workspace | Tidak berubah |
| `extension_catalog` | Katalog ekstensi | Tidak berubah |
| `extension_instances` | Instance ekstensi | Diadaptasi: tambah `template_id`, `head_revision` |
| `extension_members` | Anggota ekstensi | Tidak berubah |
| `user_sessions` | Sesi pengguna | Tidak berubah |

### 3.2 Roles & Permissions

Role Morph (dari session memory):

| Role | Deskripsi |
|---|---|
| Super Admin | Internal SaaS provider |
| Owner | Workspace creator |
| Admin | Assists Owner |
| Editor | Below Admin |
| Member | Variations |
| View | Permission (bukan role) |
| Comment | Permission (bukan role) |

Tabel `workspace_members` sudah menyimpan `role` dan `permissions` (JSONB). `View` dan `Comment` disimpan sebagai permissions, bukan role.

```sql
-- Contoh struktur permissions JSONB di workspace_members
{
  "view": true,
  "comment": true,
  "edit_own_records": true,
  "delete_own_records": true,
  "edit_member_records": false,  -- Editor+
  "delete_member_records": false -- Admin+
}
```

Tidak perlu tabel terpisah untuk role; `role` (text) + `permissions` (JSONB) di `workspace_members` cukup, dengan validasi di lapisan aplikasi.

### 3.3 Pages & Page Configuration

Page adalah display, bukan Database owner. `p=xxx` owns content/config. Shell regions truly show/hide, not CSS-only.

```sql
CREATE TABLE morph_pages (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id TEXT NOT NULL,
    p_code TEXT NOT NULL UNIQUE,          -- "p=xxx" identifier
    owner_user_id TEXT NOT NULL REFERENCES users(id),
    title TEXT NOT NULL,
    config JSONB NOT NULL DEFAULT '{}',   -- page-level configuration
    shell_config JSONB NOT NULL DEFAULT '{}', -- shell regions show/hide config
    status TEXT NOT NULL DEFAULT 'active', -- active | trash | archived
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    deleted_at TIMESTAMPTZ,

    CONSTRAINT morph_pages_workspace_unique UNIQUE (workspace_id, p_code)
);

-- Index
CREATE INDEX idx_pages_workspace ON morph_pages(workspace_id);
CREATE INDEX idx_pages_p_code ON morph_pages(p_code);
CREATE INDEX idx_pages_owner ON morph_pages(owner_user_id);
```

#### Page Sections — penempatan Database/Table View di Page

```sql
CREATE TABLE morph_page_sections (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    page_id UUID NOT NULL REFERENCES morph_pages(id),
    section_type TEXT NOT NULL,           -- 'database_table' | 'custom' | 'form' | ...
    section_id UUID NOT NULL,             -- rujuk ke morph_table_views.id atau entitas lain
    section_label TEXT,                   -- label ditampilkan di section
    ordering INTEGER NOT NULL DEFAULT 0,  -- urutan section di page
    is_visible BOOLEAN NOT NULL DEFAULT true,
    config JSONB NOT NULL DEFAULT '{}',   -- pengaturan section per instance
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- Index
CREATE INDEX idx_page_sections_page ON morph_page_sections(page_id);
CREATE INDEX idx_page_sections_ordering ON morph_page_sections(page_id, ordering);
```

**Aturan penting:**
- Owner memilih satu atau banyak Database section per Page.
- Sama Database instance dapat muncul di beberapa Pages tanpa menyalin data.
- Siapa yang melihat Database section diatur per instance (section visibility), bukan granted oleh placement di Page.
- Page placement tidak otomatis memberikan akses ke Record/File.
- Shell regions truly show/hide based on `shell_config`, bukan CSS-only.

### 3.4 IDs & Identity Model

```text
morph_records:
  id: UUID (immutabel, record_id)      ← digunakan untuk relasi, tidak pernah berubah
  record_key: TEXT (boleh berubah)     ← business identifier, misal "HR-001"
```

- Stable IDs untuk semua entitas utama (UUID).
- Draft/publish: `schema_revision` + `version_token` untuk optimistic concurrency.
- Non-destructive migration: perubahan skema harus berserta strategi rollback.
- Immutable record_id untuk relasi; record_key boleh berubah tanpa memutus relasi.

### 3.5 Modal Mechanism

Modal mechanism perlu konfigurasi dan data tersimpan:

- Close controls (tutup modal)
- Global shared tokens
- Closing modal tidak mempengaruhi auth/workspace
- Debug Overview uniform
- Stable close geometry

```sql
CREATE TABLE morph_modal_configs (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id TEXT NOT NULL,
    modal_type TEXT NOT NULL,             -- 'demo' | 'account' | 'workspace' | 'sheet' | 'dialog'
    config JSONB NOT NULL DEFAULT '{}',   -- close control config, shared tokens, geometry
    is_global BOOLEAN NOT NULL DEFAULT false,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- Index
CREATE INDEX idx_modal_configs_workspace ON morph_modal_configs(workspace_id);
CREATE INDEX idx_modal_configs_type ON morph_modal_configs(modal_type);
```

### 3.6 Reorder & Ordering

Page-specific ordering, Puzzle reorder, ModelSectionOrder:

```sql
CREATE TABLE morph_order_configs (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id TEXT NOT NULL,
    owner_type TEXT NOT NULL,             -- 'page' | 'puzzle' | 'workspace'
    owner_id TEXT NOT NULL,               -- page_id, puzzle_id, atau workspace_id
    ordering_config JSONB NOT NULL DEFAULT '{}', -- urutan section/tab/model
    version BIGINT NOT NULL DEFAULT 1,    -- optimistic concurrency for ordering
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- Index
CREATE INDEX idx_order_configs_owner ON morph_order_configs(owner_type, owner_id);
```

### 3.7 Layout & Pinned

Layout configuration dan pinned items:

```sql
CREATE TABLE morph_layout_configs (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id TEXT NOT NULL,
    layout_type TEXT NOT NULL,            -- 'modal' | 'page' | 'dashboard' | 'sheet'
    config JSONB NOT NULL DEFAULT '{}',   -- shared geometry, body wrappers, spacing
    is_pinned BOOLEAN NOT NULL DEFAULT false,
    pinned_position INTEGER,              -- posisi jika dipin
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- Index
CREATE INDEX idx_layout_configs_workspace ON morph_layout_configs(workspace_id);
CREATE INDEX idx_layout_configs_pinned ON morph_layout_configs(is_pinned, pinned_position);
```

### 3.8 Generic Data Engine (Database, Table, Field, Record)

Tabel-tabel ini sudah dirinci di bagian 3.2 Metadata Layer dan 3.3 Data Layer dari versi sebelumnya:

| Tabel | Fungsi |
|---|---|
| `morph_data_sources` | Sumber data permanen |
| `morph_table_views` | Representasi tampilan/preset |
| `morph_field_definitions` | Definisi Field dan semantik tipe yang reusable |
| `morph_field_bindings` | Keanggotaan schema Field pada Data Source/Table; bukan per Table View |
| `morph_records` | Record dengan record_id immutabel + record_key |
| `morph_relation_edges` | Nilai Relation per source Record ke target Record immutable |
| `morph_relation_config` | Target Data Source + satu Display Field (radio); tanpa target Record |
| `morph_lookup_definitions` | Lookup read-only |

**Peringatan arsitektur:** Generic Data Engine bukan developer-defined CRUD atau per-post dynamic fields. Semua tampilan dan perilaku dihasilkan dari konfigurasi data (`config_json`, `values_json`, `permissions`, `ordering_config`, dll.), bukan dari kode yang dikodekan keras untuk tiap preset. Reuse existing contracts, no legacy route restoration.

### 3.9 Design Tokens & Preferences (Semua Visual On the Fly)

Inspirasi dari sistem preferensi Halaman Publik Hypedern (`https://hypedern.wew.web.id/`): semua aspek visual dan perilaku disimpan sebagai data konfigurasi, tidak ada elemen UI yang dikodekan keras. Pengguna, admin, dan AI dapat mengubah preferensi on the fly melalui command, GUI, atau AI — semuanya disimpan sebagai data.

**Pola yang diadopsi dari Halaman Publik Hypedern:**

- "100% design token & bebas hardcoded" — semua token visual disimpan sebagai data, tidak ada nilai visual yang dikodekan keras di code atau CSS statis.
- "Ubah warna, tipografi, ritme, dan kepadatan antarmuka. Preferensi tersimpan di perangkatmu—tanpa mengubah isi karya yang sedang kamu lihat." — preferensi hanya mempengaruhi presentasi, tidak mengubah konten/data.
- "Palet aksen", "Tipografi responsif", "Seluruh pilihan bisa diubah kapan saja" — semua pilihan visual dapat diubah kapan saja dan diterapkan segera.
- Semua data disimpan secara terstruktur; live update melalui SSE + Datastar (tanpa reload halaman).

```sql
CREATE TABLE morph_design_tokens (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id TEXT NOT NULL,
    token_key TEXT NOT NULL,              -- misal "accent-primary", "surface-primary", "foreground-primary", "radius-md", "font-sans", "rhythm-scale", "density-scale"
    token_value TEXT NOT NULL,            -- nilai token (warna hex, ukuran, font, scale, dll.)
    token_category TEXT NOT NULL DEFAULT 'visual', -- color | typography | rhythm | density | effect | spacing
    scope TEXT NOT NULL DEFAULT 'workspace', -- workspace | global | user
    created_by TEXT NOT NULL,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),

    CONSTRAINT morph_design_tokens_unique UNIQUE (workspace_id, token_key, scope)
);

-- Index
CREATE INDEX idx_design_tokens_workspace ON morph_design_tokens(workspace_id);
CREATE INDEX idx_design_tokens_scope ON morph_design_tokens(scope);
CREATE INDEX idx_design_tokens_category ON morph_design_tokens(token_category);
```

```sql
CREATE TABLE morph_user_preferences (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    user_id TEXT NOT NULL REFERENCES users(id),
    workspace_id TEXT NOT NULL,
    preference_key TEXT NOT NULL,         -- misal "theme", "sidebar_collapsed", "default_view", "items_per_page"
    preference_value JSONB NOT NULL DEFAULT '{}', -- nilai preferensi bisa skalar atau objek
    is_global BOOLEAN NOT NULL DEFAULT false,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),

    CONSTRAINT morph_user_preferences_unique UNIQUE (user_id, workspace_id, preference_key)
);

-- Index
CREATE INDEX idx_user_preferences_user ON morph_user_preferences(user_id);
CREATE INDEX idx_user_preferences_workspace ON morph_user_preferences(workspace_id);
```

**Contoh design token yang disimpan sebagai data (bukan hardcoded):**

| token_key | token_value | token_category | scope |
|---|---|---|---|
| `accent-primary` | `#0f172a` | color | workspace |
| `surface-primary` | `#ffffff` | color | workspace |
| `foreground-primary` | `#0f172a` | color | workspace |
| `radius-md` | `0.5rem` | spacing | workspace |
| `font-sans` | `Inter, system-ui, sans-serif` | typography | workspace |
| `font-scale` | `1` | typography | user |
| `rhythm-scale` | `1` | rhythm | user |
| `density-scale` | `1` | density | user |
| `border-color` | `#e2e8f0` | color | workspace |
| `shadow-sm` | `0 1px 2px 0 rgb(0 0 0 / 0.05)` | effect | workspace |

**Contoh user preference:**

| preference_key | preference_value | scope |
|---|---|---|
| `theme` | "dark" | user |
| `sidebar_collapsed` | `false` | user |
| `default_view` | "grid" | user |
| `items_per_page` | `25` | user |
| `accent_color` | "#0f172a" | user |
| `font_scale` | `1.1` | user |

**Aturan on the fly:**
- Semua elemen visual baca dari `morph_design_tokens` dan `morph_user_preferences`, bukan dari CSS hardcoded atau konstanta di code.
- Perubahan token/preference diterapkan segera tanpa perlu restart atau deploy ulang code. Live update melalui SSE + Datastar (mirip pola Halaman Publik Hypedern).
- Preferensi hanya mempengaruhi presentasi, tidak mengubah konten/data (`tanpa mengubah isi karya yang sedang kamu lihat`).
- Command line, GUI (human), dan AI menggunakan engine yang sama untuk mengubah config/data ini.
- Tidak ada satu benang UI pun yang dikodekan keras oleh developer untuk tiap preset atau tampilan.
---

### 3.10 Metadata & Definitions

```sql
CREATE TABLE morph_definitions (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    workspace_id TEXT NOT NULL,
    definition_type TEXT NOT NULL,        -- 'database' | 'table' | 'field' | 'template'
    definition_json JSONB NOT NULL,       -- definisi deklaratif
    revision BIGINT NOT NULL DEFAULT 1,
    is_published BOOLEAN NOT NULL DEFAULT false,
    created_by TEXT NOT NULL,
    created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
    updated_at TIMESTAMPTZ NOT NULL DEFAULT now()
);

-- Index
CREATE INDEX idx_definitions_workspace ON morph_definitions(workspace_id);
CREATE INDEX idx_definitions_type ON morph_definitions(definition_type);
CREATE INDEX idx_definitions_published ON morph_definitions(is_published);
```

---

### 3.11 JSON Schema DSL & Field Type System (On the Fly)

Ini adalah inti dari **Generic Data Engine**. Semua tabel, field, dan tipe field didefinisikan melalui **JSON Schema DSL** yang disimpan sebagai data, bukan dikodekan keras di code atau UI.

#### 3.11.1 JSON Schema DSL untuk Tabel dan Field

Setiap Table View dan Field Definition dihasilkan dari definisi deklaratif JSON. Contoh struktur:

```json
{
  "data_source": {
    "id": "uuid-1",
    "label": "Proyek",
    "binding_key": "proyek",
    "template_id": null,
    "head_revision": 1
  },
  "table_views": [
    {
      "id": "uuid-2",
      "data_source_id": "uuid-1",
      "label": "PM - Project",
      "ordering": 0,
      "config": {
        "layout": "grid",
        "default_view": "table",
        "page_size": 25
      }
    }
  ],
  "field_definitions": [
    {
      "id": "uuid-3",
      "label": "Nama",
      "type": "text",
      "config_json": {
        "placeholder": "Masukkan nama proyek",
        "max_length": 255
      },
      "is_system": false
    },
    {
      "id": "uuid-4",
      "label": "PIC",
      "type": "relation",
      "config_json": {
        "target_data_source_id": "uuid-employee-source",
        "display_field_id": "uuid-employee-name-field",
        "cardinality": "single"
      },
      "is_system": false
    },
    {
      "id": "uuid-5",
      "label": "Status",
      "type": "select",
      "config_json": {
        "options": [
          {"label": "On Progress", "color": "blue"},
          {"label": "Planning", "color": "yellow"},
          {"label": "Done", "color": "green"}
        ]
      },
      "is_system": false
    }
  ]
}
```

Contoh Relation di atas hanya konfigurasi skema: `target_data_source_id`, tepat satu `display_field_id`, dan `cardinality = 'single'` pada V1. Target Record yang dipilih pada setiap source Record disimpan sebagai `target_record_id` pada `morph_relation_edges`, bukan di `config_json`. Paling banyak satu edge berlaku bagi satu source Record/Field; beberapa source Record boleh menunjuk target yang sama. Kardinalitas bukan atribut setiap edge, dan batasan fisik final tetap perlu review sebelum DDL.

**Aturan JSON Schema DSL:**

- Semua definisi disimpan di `morph_data_sources`, `morph_table_views`, `morph_field_definitions`, dan `morph_field_bindings` sebagai JSONB.
- Config dari user menjadi JSON Schema yang bisa dieksekusi engine untuk generate UI on the fly.
- Tidak ada tabel fisik PostgreSQL baru yang dibuat setiap kali user membuat preset. Semua menggunakan tabel metadata yang sama.

#### 3.11.2 Field Type System (Notion-like)

Berikut daftar field type yang didukung, dengan konfigurasi masing-masing:

| Field Type | Konfigurasi (config_json) | Renderer UI | Catatan |
|---|---|---|---|
| **Text** | `max_length`, `placeholder`, `multiline` | Input teks | Nilai disimpan di `values_json` |
| **Number** | `min`, `max`, `step`, `format` | Input angka | Validasi rentang |
| **Select** | `options[]` (label, value, color) | Dropdown satu pilihan | Opsi dikonfigurasi pengguna |
| **Multi-select** | `options[]` (label, value, color) | Checkbox / chips | Beberapa opsi sekaligus |
| **Status** | `options[]` (label, color, group) | Badge / status pill | Cocok untuk workflow |
| **Date** | `format`, `include_time`, `timezone` | Date picker | Disimpan sebagai TIMESTAMPTZ |
| **Person** | `target_data_source`, `cardinality` | Autocomplete user | Relasi ke tabel pengguna |
| **Files & media** | `max_size`, `allowed_types`, `max_files` | Upload file | Referensi ke penyimpanan file |
| **Checkbox** | `default_value` | Toggle / checkbox | Boolean |
| **URL** | `pattern`, `placeholder` | Input URL | Validasi format URL |
| **Email** | `placeholder` | Input email | Validasi format email |
| **Phone** | `pattern`, `country_code` | Input telepon | Validasi nomor telepon |
| **Formula** | `expression`, `result_type` | Read-only display | Dievaluasi engine, tidak disimpan langsung |
| **Relation** | `target_data_source_id`, satu `display_field_id`, `cardinality = 'single'` (V1) | Autocomplete record | Target `record_id` disimpan per nilai pada relation edge; maksimal satu per source Record/Field |
| **Rollup** | `relation_field`, `target_field`, `aggregation` | Read-only display | Agregasi dari relasi |
| **Created time** | `format` | Read-only | Timestamp pembuatan |
| **Created by** | `user_field` | Read-only display | Referensi user pembuat |
| **Last edited time** | `format` | Read-only | Timestamp perubahan terakhir |
| **Last edited by** | `user_field` | Read-only display | Referensi user pengubah |
| **Button** | `label`, `action`, `action_config` | Tombol aksi | Trigger aksi custom |
| **Place** | `map_config`, `allow_search` | Picker lokasi | Data lokasi/peta |
| **ID** | `prefix`, `format`, `auto_generate` | Read-only display | Identifier unik otomatis |

Katalog tabel ini adalah daftar kemampuan target yang sudah disebutkan, bukan enum tipe tertutup. Tipe baru harus dapat didaftarkan oleh modul tepercaya melalui registry berversi yang menyediakan config schema, validation/normalization, codec, renderer, query/index capability, authorization/disclosure rules, dan compatibility/migration behavior. Config pengguna tetap data deklaratif; tidak memuat kode executable. Registry tidak boleh berubah menjadi `switch`/mapping tertutup yang harus diedit pada setiap alur CRUD. Tipe/version yang tidak dikenal gagal tertutup dan data tersimpan tidak boleh dibuang diam-diam.

**Aturan field type:**

- Setiap Field merujuk ke type ID dan versi kontrak registry; `config_json` divalidasi oleh kontrak tersebut.
- Engine membaca descriptor melalui registry tepercaya untuk validasi, codec, renderer, dan kapabilitas lain.
- Tipe yang belum didukung tidak boleh diam-diam diganti atau diabaikan.
- `target_record_id` (UUID immutabel) adalah identitas tujuan pada Relation edge per Record, bukan config tipe; jangan memakai `record_key` yang boleh berubah.
- `Formula` dan `Rollup` adalah read-only, nilai dihitung engine saat baca.

#### 3.11.3 Replikasi Tabel (Database / Table View)

User dapat mereplikasi tabel yang pernah dibuat menjadi tabel baru, baik:

| Jenis Replikasi | Isi yang Diikutsertakan | Use Case |
|---|---|---|
| **Struktur saja (fresh)** | Data Source + Table View + Field Definition + Field Binding (tanpa record) | Template baru, coba varian konfigurasi |
| **Struktur + data** | Semua di atas + `morph_records` + `morph_relation_edges` | Duplikasi database dengan isi data |
| **Struktur + sebagian data** | Struktur + record yang difilter (misal status aktif) | Migrasi selektif |

**Aturan replikasi:**

- Record ID baru dihasilkan (UUID baru), record_key dapat disesuaikan.
- Relation edge diremap ke record ID baru.
- Display field configuration dipertahankan.
- Izin dan permission dapat di-copy atau di-reset sesuai kebutuhan.

#### 3.11.4 Engine Generate UI dari JSON Schema

Engine bekerja on the fly:

\`\`\`text
JSON Schema DSL (config_json, values_json, permissions, ordering_config)
        │
        ▼
Engine baca type + config_json
        │
        ▼
Pilih renderer input yang sesuai (text, select, datepicker, autocomplete, dll.)
        │
        ▼
Generate UI untuk klien secara dinamis
        │
        ▼
User mengubah data → disimpan kembali ke JSONB
        │
        ▼
Live update melalui SSE + Datastar (tanpa reload)
\`\`\`

**Peringatan arsitektur:**

- Generic Data Engine bukan developer-defined CRUD atau per-post dynamic fields.
- Semua tampilan dan perilaku dihasilkan dari konfigurasi data.
- Reuse existing contracts, no legacy route restoration.
- Tidak ada satu benang UI yang dikodekan keras untuk tiap preset.

---

## 3.12 Database Driver Configuration & Infrastructure Notes (PENTING — Jangan diabaikan)

Ini adalah catatan operasional dari pengalaman implementasi agar masalah serupa tidak terulang di masa depan.

### 3.12.1 Masalah: Aplikasi Terpaksa Pakai JsonDriver (Bukan PostgreSQL)

**Gejala:** Login gagal dengan pesan "Email tidak ditemukan" meskipun data user sudah ada di tabel PostgreSQL `users`.

**Penyebab root:** Di `app/Bootstrap.php`, inisialisasi `DataStore` hanya memilih `PostgresDriver` jika environment variable `DRIVER=postgres` **dan** `extension_loaded('pdo_pgsql')` terpenuhi. Jika salah satu tidak terpenuhi, sistem diam-diam fallback ke `JsonDriver` (membaca dari `data/collections`), yang berisi data lama/seed JSON, bukan data di PostgreSQL.

**Akibat:** Aplikasi membaca user dari JSON (hanya 2 user: budi@gmail.com, admin@gmail.com) bukan dari PostgreSQL (5 user seeded), sehingga login dengan email baru gagal.

### 3.12.2 Solusi yang Diterapkan

Di `app/Bootstrap.php`, tambahkan pengecekan `DATABASE_URL` untuk memaksa `PostgresDriver` saat PostgreSQL tersedia, terlepas dari nilai `DRIVER`:

```php
$driverName = getenv('DRIVER') ?: ($_ENV['DRIVER'] ?? self::config('driver', 'json'));
$databaseUrl = getenv('DATABASE_URL') ?: ($_ENV['DATABASE_URL'] ?? null);

// Paksa Postgres jika DATABASE_URL tersedia dan pdo_pgsql aktif
if ($databaseUrl && extension_loaded('pdo_pgsql')) {
    $driverName = 'postgres';
}
```

### 3.12.3 Checklist Sebelum Deploy/Produksi

| Item | Nilai yang Diperlukan | Catatan |
|---|---|---|
| `DRIVER` | `postgres` | Di `.env` |
| `DATABASE_URL` | Simpan hanya di `.env` lokal yang tidak dilacak; gunakan `morph03_app` menuju `127.0.0.1:5433/morph_03` | Read-only audit menemukan `morph03_app` belum ada; jangan gunakan `morph03_admin` untuk PHP |
| PHP extension `pdo_pgsql` | Loaded | Cek via `php -m | grep pdo_pgsql` |
| PHP extension `pdo` | Loaded | Cek via `php -m | grep pdo` |
| Koneksi PostgreSQL | Harus diverifikasi dengan `morph03_app` | CLI/PDO yang sudah diverifikasi memakai `morph03_admin`; read-only audit menemukan `morph03_app` belum ada dan Laragon web-SAPI masih pending (lihat `LOCAL-DEVELOPMENT.md`) |
| Web server restart | Dilakukan | Setelah mengubah `.env`, restart Apache/Nginx |

### 3.12.4 Aturan Untuk Pengembangan Selanjutnya

1. **Jangan mengandalkan hanya `DRIVER` env** — selalu verifikasi `DATABASE_URL` juga tersedia dan valid.
2. **Jangan fallback diam-diam ke JsonDriver** saat PostgreSQL tersedia — jika koneksi gagal, throw exception agar masalah terdeteksi segera.
3. **Selalu restart web server** setelah mengubah `.env` (terutama `DRIVER` dan `DATABASE_URL`).
4. **Gunakan `morph03_app` untuk PHP runtime hanya setelah role dan scoped non-superuser privileges diverifikasi**; `morph03_admin` hanya untuk administrasi/provisioning. Jangan gunakan superuser sebagai role runtime.
5. **Verifikasi driver aktif** saat boot — tambahkan log atau health check yang mencetak class driver yang aktif.

---

## 4. Data Ownership Model (Lengkap)

| Entitas | Pemilik | Isolasi | Kolom Isolasi |
|---|---|---|---|
| `users` | Global (sistem) | Tidak terisolasi | — |
| `workspaces` | Owner user | Per workspace | `owner_user_id` |
| `morph_pages` | Workspace | Per workspace | `workspace_id` |
| `morph_page_sections` | Page | Per page | `page_id` |
| `morph_data_sources` | Workspace | Per workspace | `workspace_id` |
| `morph_table_views` | Workspace | Per workspace | `workspace_id` |
| `morph_field_definitions` | Workspace | Per workspace | `workspace_id` |
| `morph_field_bindings` | Workspace | Per workspace | `workspace_id` |
| `morph_records` | Workspace | Per workspace | `workspace_id` |
| `morph_relation_edges` | Workspace | Per workspace | `workspace_id` |
| `morph_relation_config` | Workspace | Diwarisi | via identitas Field kanonis (kandidat field_definition) |
| `workspace_members` | Workspace | Per workspace | `workspace_id` |
| `extension_instances` | Workspace | Per workspace | `workspace_id` |
| `morph_modal_configs` | Workspace | Per workspace | `workspace_id` |
| `morph_order_configs` | Workspace | Per workspace | `workspace_id` |
| `morph_layout_configs` | Workspace | Per workspace | `workspace_id` |

Semua tabel data memiliki `workspace_id` untuk enforcing isolasi workspace di lapisan aplikasi.

---

## 5. Workspace Isolation Model

- Setiap query data harus memfilter dengan `workspace_id` dari konteks pengguna yang login.
- Record, Data Source, Table View, Field Binding, Relation Edge, Page, Section tidak boleh diakses lintas workspace tanpa izin.
- Owner workspace memiliki kontrol penuh atas semua Data Source, Table View, Page dalam workspace tersebut.
- Member memiliki izin berdasarkan role dan permissions yang dikonfigurasi.
- View dan Comment adalah permissions, bukan roles. Creator mengatur View/Comment pada record/file miliknya.
- Owner tidak punya bypass otomatis atas hak View/Comment yang dikonfigurasi creator.
- Page placement tidak otomatis memberikan akses ke Record/File.

---

## 6. Field Definition & Type System

Setiap field definition memiliki:

| Komponen | Deskripsi |
|---|---|
| `type` | text | integer | boolean | select | relation | lookup | ... |
| `config_json` | Konfigurasi spesifik tipe (pilihan select, target data source untuk relation, dll.) |
| `codec` | Encode/decode nilai untuk penyimpanan dan query |
| `normalizer` | Normalisasi nilai sebelum disimpan |
| `validator` | Validasi nilai input |
| `compatibility` | Periksa apakah perubahan tipe aman untuk nilai eksisting |
| `dependencies` | Dependensi field lain atau data source |

Tipe yang belum didukung tidak boleh diam-diam diganti. Perubahan tipe harus ditolak jika ada nilai record yang tidak kompatibel.

---

## 7. Record Identity Model

```text
morph_records:
  id: UUID (immutabel, record_id)      ← digunakan untuk relasi
  record_key: TEXT (boleh berubah)     ← business identifier, misal "HR-001"
```

- Relasi selalu menyimpan `record_id` (UUID immutabel), bukan `record_key`.
- Jika `record_key` berubah (misal `HR-001` → `HR-002`), relasi tetap utuh.
- Target Record yang memiliki incoming Relation edge tidak dapat masuk Trash; link harus dilepas/diganti secara eksplisit terlebih dahulu.
- Permanent delete ditolak selama Record masih memiliki incoming/outgoing edge. Tidak ada cascade implisit ke source Record maupun edge.
- Kebijakan Trash untuk source Record dengan outgoing edge dan Trash seluruh Database yang memuat target Record masih perlu diputuskan.

---

## 8. Relation Edge & Cardinality Model

Kontrak Relation V1 yang dipilih adalah `cardinality = 'single'`: paling banyak satu target untuk setiap `(source_data_source_id, source_record_id, field_definition_id)`. Beberapa source Record boleh menunjuk target yang sama; V1 tidak menyiratkan unique target atau one-to-one. Ini adalah batas logis yang perlu ditegakkan terhadap kumpulan edge per source Record/Field, bukan atribut yang diulang pada tiap edge. Bentuk constraint fisik, concurrency control, dan transaction boundary masih memerlukan review sebelum DDL.

| Pola | Status V1 | Catatan |
|---|---|---|
| Many-to-One | Didukung secara semantik | Banyak source dapat menunjuk target sama; satu target maksimal per source Record/Field. |
| One-to-One | Tidak dijamin | Memerlukan constraint unik tambahan pada target yang belum dipilih. |
| One-to-Many | Masa depan | Memerlukan multi-target pada satu source Record/Field. |
| Many-to-Many | Masa depan | Memerlukan multi-target per source dan aturan tambahan. |

Integritas logical relation edge:
1. Source record harus berasal dari source data source yang sesuai.
2. Target record harus milik target data source.
3. Kedua record harus dalam workspace yang sama.
4. Edge baru atau yang diarahkan ulang tidak boleh memilih target Record yang sudah berada di Trash; ini menjaga invariant bahwa tidak ada incoming Relation edge menuju target yang berada di Trash.
5. Untuk V1, target dengan incoming edge tidak boleh di-Trash. Permanent delete diblokir sampai seluruh incoming/outgoing edge diselesaikan eksplisit; tidak ada cascade implisit.

---

## 9. Table View & Projection Model

| Komponen | Deskripsi |
|---|---|
| `morph_table_views` | Konfigurasi tampilan (label, urutan, config JSONB) |
| `morph_field_bindings` | Field Definition yang tersedia/aktif pada schema Data Source/Table |
| `morph_table_views.config` | Preferensi per-view: visibilitas, urutan, label; tidak mengubah membership/value |
| `morph_relation_config.display_field_id` | Satu Field target yang diproyeksikan untuk Relation (radio) |
| Reverse Relation Field | Tidak ada pada V1; incoming edges tetap dipertahankan untuk integritas/lifecycle, tanpa backlink UI |
| `morph_lookup_definitions` | Nilai derived dari record tujuan (read-only) |

Field Binding mengaitkan Field Definition pada schema Data Source/Table; Table View hanya mengatur visibilitas, urutan, dan label. Nilai scalar dan Relation edge memakai identitas Field kanonis yang sama lintas Table View; jangan mengikat nilai ke binding presentation. Keputusan V1 adalah `field_definition_id`: penggunaan ulang Field Definition membawa semantik/config yang sama. Bila semantik/config berbeda per Data Source, diperlukan identitas/config eksplisit yang berbeda; jangan menyamarkan perbedaan itu melalui binding view. Bentuk fisik dan constraint tetap menunggu review skema.

Contoh tampilan:
- "PM - Project" → Data Source Proyek → kolom: Nama, PIC (relation ke Karyawan), Status
- "PM - Project (Copy)" → Data Source Proyek yang sama → kolom: Nama, Budget (tidak ada PIC)

Membuat salinan preset tidak menggandakan record; hanya membuat Table View baru dengan konfigurasi kolom yang berbeda.

---

## 10. Langkah Selanjutnya (Setelah Desain Disetujui)

1. **Review desain** oleh Anda (termasuk nama tabel, kolom, dan aturan integritas untuk semua fitur di atas).
2. **Buat skrip SQL fresh database** (CREATE TABLE, index, tanpa DROP pada tabel eksisting).
3. **Anda jalankan skrip** di HeidiSQL/psql di database Laragon Anda.
4. **Implementasi slice kecil** di kode aplikasi: field binding → record → relation edge → UI "Pengaturan Kolom" dengan radio display field.

**STOP GATE:** Tidak ada DDL yang dijalankan dari sandbox. Skrip SQL akan disediakan sebagai dokumen untuk review dan eksekusi Anda.

---

## 11. Pertanyaan untuk Review Desain

1. Apakah semua fitur yang disebutkan (Roles, Permissions, Pages, Workspace, View, IDs, Modal Mechanism, Reorder, Layout, Pinned) sudah tercakup dengan cukup?
2. Apakah nama tabel dan kolom di atas sesuai dengan harapan Anda?
3. Apakah pemisahan Data Source dan Table View jelas?
4. Apakah immutable `record_id` terpisah dari `record_key` sudah cukup?
5. Apakah relation edge sebagai logical edge (bukan FK fisik) acceptable?
6. Apakah ada entitas atau relasi yang kurang sebelum kita lanjut ke skrip SQL?

---

**Catatan:** Dokumen ini adalah **target architecture**. Semua perubahan nama, penambahan, atau pengurangan entitas dapat dilakukan sebelum skrip SQL akhir dibuat.
