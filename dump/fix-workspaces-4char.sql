-- Fix ws_* -> 4-char murni tanpa butuh superuser (insert new + pindah anak + delete old)
-- Jalankan: psql -U morph_app -d morph -f dump/fix-workspaces-4char.sql
BEGIN;

-- Bebaskan slug lama agar insert baru tidak clash unique idx_workspaces_slug
UPDATE workspaces SET slug = slug || '_old_' || id WHERE id IN ('ws_default','ws-a','ws-b','ws-c','ws-d') AND slug IN ('default','workspace-a','workspace-b','workspace-c','workspace-d');

-- Insert new workspaces dari old (hanya jika belum ada)
INSERT INTO workspaces (id, slug, name, description, owner_user_id, visibility, settings, plan, status, created_at, updated_at)
SELECT 'a1B2', 'default', name, description, owner_user_id, visibility, settings, plan, status, created_at, updated_at FROM workspaces WHERE id='ws_default' ON CONFLICT (id) DO NOTHING;
INSERT INTO workspaces (id, slug, name, description, owner_user_id, visibility, settings, plan, status, created_at, updated_at)
SELECT 'b2C3', 'workspace-a', name, description, owner_user_id, visibility, settings, plan, status, created_at, updated_at FROM workspaces WHERE id='ws-a' ON CONFLICT (id) DO NOTHING;
INSERT INTO workspaces (id, slug, name, description, owner_user_id, visibility, settings, plan, status, created_at, updated_at)
SELECT 'c3D4', 'workspace-b', name, description, owner_user_id, visibility, settings, plan, status, created_at, updated_at FROM workspaces WHERE id='ws-b' ON CONFLICT (id) DO NOTHING;
INSERT INTO workspaces (id, slug, name, description, owner_user_id, visibility, settings, plan, status, created_at, updated_at)
SELECT 'd4E5', 'workspace-c', name, description, owner_user_id, visibility, settings, plan, status, created_at, updated_at FROM workspaces WHERE id='ws-c' ON CONFLICT (id) DO NOTHING;
INSERT INTO workspaces (id, slug, name, description, owner_user_id, visibility, settings, plan, status, created_at, updated_at)
SELECT 'e5F6', 'workspace-d', name, description, owner_user_id, visibility, settings, plan, status, created_at, updated_at FROM workspaces WHERE id='ws-d' ON CONFLICT (id) DO NOTHING;

-- Pindahkan semua referensi workspace_id
UPDATE workspace_members SET workspace_id='a1B2' WHERE workspace_id='ws_default';
UPDATE workspace_members SET workspace_id='b2C3' WHERE workspace_id='ws-a';
UPDATE workspace_members SET workspace_id='c3D4' WHERE workspace_id='ws-b';
UPDATE workspace_members SET workspace_id='d4E5' WHERE workspace_id='ws-c';
UPDATE workspace_members SET workspace_id='e5F6' WHERE workspace_id='ws-d';

UPDATE workspace_extensions SET workspace_id='a1B2' WHERE workspace_id='ws_default';
UPDATE workspace_extensions SET workspace_id='b2C3' WHERE workspace_id='ws-a';
UPDATE workspace_extensions SET workspace_id='c3D4' WHERE workspace_id='ws-b';
UPDATE workspace_extensions SET workspace_id='d4E5' WHERE workspace_id='ws-c';
UPDATE workspace_extensions SET workspace_id='e5F6' WHERE workspace_id='ws-d';

UPDATE extension_instances SET workspace_id='a1B2' WHERE workspace_id='ws_default';
UPDATE extension_instances SET workspace_id='b2C3' WHERE workspace_id='ws-a';
UPDATE extension_instances SET workspace_id='c3D4' WHERE workspace_id='ws-b';
UPDATE extension_instances SET workspace_id='d4E5' WHERE workspace_id='ws-c';
UPDATE extension_instances SET workspace_id='e5F6' WHERE workspace_id='ws-d';

UPDATE morph_rows SET workspace_id='a1B2' WHERE workspace_id='ws_default';
UPDATE morph_rows SET workspace_id='b2C3' WHERE workspace_id='ws-a';
UPDATE morph_rows SET workspace_id='c3D4' WHERE workspace_id='ws-b';
UPDATE morph_rows SET workspace_id='d4E5' WHERE workspace_id='ws-c';
UPDATE morph_rows SET workspace_id='e5F6' WHERE workspace_id='ws-d';

UPDATE extension_members SET workspace_id='a1B2' WHERE workspace_id='ws_default';
UPDATE extension_members SET workspace_id='b2C3' WHERE workspace_id='ws-a';
UPDATE extension_members SET workspace_id='c3D4' WHERE workspace_id='ws-b';
UPDATE extension_members SET workspace_id='d4E5' WHERE workspace_id='ws-c';
UPDATE extension_members SET workspace_id='e5F6' WHERE workspace_id='ws-d';

-- Fix id yang mengandung old prefix (ws_* -> 4-char)
UPDATE workspace_members SET id=REPLACE(id, 'ws_default', 'a1B2') WHERE id LIKE '%ws_default%';
UPDATE workspace_members SET id=REPLACE(id, 'ws-a', 'b2C3') WHERE id LIKE '%ws-a%';
UPDATE workspace_members SET id=REPLACE(id, 'ws-b', 'c3D4') WHERE id LIKE '%ws-b%';
UPDATE workspace_members SET id=REPLACE(id, 'ws-c', 'd4E5') WHERE id LIKE '%ws-c%';
UPDATE workspace_members SET id=REPLACE(id, 'ws-d', 'e5F6') WHERE id LIKE '%ws-d%';
UPDATE workspace_members SET id=REPLACE(id, 'ws_a', 'b2C3') WHERE id LIKE '%ws_a%';
UPDATE workspace_members SET id=REPLACE(id, 'ws_b', 'c3D4') WHERE id LIKE '%ws_b%';
UPDATE workspace_members SET id=REPLACE(id, 'ws_c', 'd4E5') WHERE id LIKE '%ws_c%';
UPDATE workspace_members SET id=REPLACE(id, 'ws_d', 'e5F6') WHERE id LIKE '%ws_d%';

UPDATE workspace_extensions SET id=REPLACE(id, 'ws_default', 'a1B2') WHERE id LIKE '%ws_default%';
UPDATE workspace_extensions SET id=REPLACE(id, 'ws-a', 'b2C3') WHERE id LIKE '%ws-a%';
UPDATE workspace_extensions SET id=REPLACE(id, 'ws-b', 'c3D4') WHERE id LIKE '%ws-b%';
UPDATE workspace_extensions SET id=REPLACE(id, 'ws-c', 'd4E5') WHERE id LIKE '%ws-c%';
UPDATE workspace_extensions SET id=REPLACE(id, 'ws-d', 'e5F6') WHERE id LIKE '%ws-d%';
UPDATE workspace_extensions SET id=REPLACE(id, 'ws_a', 'b2C3') WHERE id LIKE '%ws_a%';
UPDATE workspace_extensions SET id=REPLACE(id, 'ws_b', 'c3D4') WHERE id LIKE '%ws_b%';
UPDATE workspace_extensions SET id=REPLACE(id, 'ws_c', 'd4E5') WHERE id LIKE '%ws_c%';
UPDATE workspace_extensions SET id=REPLACE(id, 'ws_d', 'e5F6') WHERE id LIKE '%ws_d%';

-- Hapus old workspaces jika sudah tidak direferensikan
DELETE FROM workspaces WHERE id='ws_default' AND NOT EXISTS (SELECT 1 FROM workspace_members WHERE workspace_id='ws_default' UNION ALL SELECT 1 FROM workspace_extensions WHERE workspace_id='ws_default' UNION ALL SELECT 1 FROM extension_instances WHERE workspace_id='ws_default' UNION ALL SELECT 1 FROM morph_rows WHERE workspace_id='ws_default');
DELETE FROM workspaces WHERE id='ws-a' AND NOT EXISTS (SELECT 1 FROM workspace_members WHERE workspace_id='ws-a' UNION ALL SELECT 1 FROM workspace_extensions WHERE workspace_id='ws-a' UNION ALL SELECT 1 FROM extension_instances WHERE workspace_id='ws-a' UNION ALL SELECT 1 FROM morph_rows WHERE workspace_id='ws-a');
DELETE FROM workspaces WHERE id='ws-b' AND NOT EXISTS (SELECT 1 FROM workspace_members WHERE workspace_id='ws-b' UNION ALL SELECT 1 FROM workspace_extensions WHERE workspace_id='ws-b' UNION ALL SELECT 1 FROM extension_instances WHERE workspace_id='ws-b' UNION ALL SELECT 1 FROM morph_rows WHERE workspace_id='ws-b');
DELETE FROM workspaces WHERE id='ws-c' AND NOT EXISTS (SELECT 1 FROM workspace_members WHERE workspace_id='ws-c' UNION ALL SELECT 1 FROM workspace_extensions WHERE workspace_id='ws-c' UNION ALL SELECT 1 FROM extension_instances WHERE workspace_id='ws-c' UNION ALL SELECT 1 FROM morph_rows WHERE workspace_id='ws-c');
DELETE FROM workspaces WHERE id='ws-d' AND NOT EXISTS (SELECT 1 FROM workspace_members WHERE workspace_id='ws-d' UNION ALL SELECT 1 FROM workspace_extensions WHERE workspace_id='ws-d' UNION ALL SELECT 1 FROM extension_instances WHERE workspace_id='ws-d' UNION ALL SELECT 1 FROM morph_rows WHERE workspace_id='ws-d');

COMMIT;

-- Verifikasi (harus 0 old, 5 new)
SELECT 'workspaces old' as cek, count(*) FROM workspaces WHERE id IN ('ws_default','ws-a','ws-b','ws-c','ws-d')
UNION ALL SELECT 'workspaces new', count(*) FROM workspaces WHERE id IN ('a1B2','b2C3','c3D4','d4E5','e5F6')
UNION ALL SELECT 'workspace_members old', count(*) FROM workspace_members WHERE workspace_id IN ('ws_default','ws-a','ws-b','ws-c','ws-d')
UNION ALL SELECT 'morph_rows old', count(*) FROM morph_rows WHERE workspace_id IN ('ws_default','ws-a','ws-b','ws-c','ws-d');
