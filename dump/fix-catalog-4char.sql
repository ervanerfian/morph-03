-- HeidiSQL: ROLLBACK dulu jika sebelumnya ERROR "transaction is aborted", lalu F9 file ini
-- FIX FK: DROP constraint dulu, baru update parent — cegah ERROR extension_instances_catalog_id_fkey
ROLLBACK;
BEGIN;
-- 0. DROP FK yang block update parent (IF EXISTS aman)
ALTER TABLE extension_instances DROP CONSTRAINT IF EXISTS extension_instances_catalog_id_fkey;
ALTER TABLE extension_instances DROP CONSTRAINT IF EXISTS extension_instances_catalog_id_foreign;
ALTER TABLE workspace_extensions DROP CONSTRAINT IF EXISTS workspace_extensions_extension_instance_id_fkey;
ALTER TABLE workspace_extensions DROP CONSTRAINT IF EXISTS workspace_extensions_extension_instance_id_foreign;
ALTER TABLE extension_members DROP CONSTRAINT IF EXISTS extension_members_extension_instance_id_fkey;
ALTER TABLE extension_members DROP CONSTRAINT IF EXISTS extension_members_extension_instance_id_foreign;
COMMIT;

BEGIN;
-- 1. extension_catalog.id
UPDATE extension_catalog SET id='m1N2' WHERE id='crm';
UPDATE extension_catalog SET id='n2O3' WHERE id='finance';
UPDATE extension_catalog SET id='o3P4' WHERE id='hrm';
UPDATE extension_catalog SET id='p4Q5' WHERE id='inventory';
UPDATE extension_catalog SET id='q5R6' WHERE id='pm';
UPDATE extension_catalog SET id='r6S7' WHERE id='support';
UPDATE extension_catalog SET id='s7T8' WHERE id='system';
-- 2. collections jsonb
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"crm-leads"', '"t1U2"')::jsonb WHERE collections::text LIKE '%crm-leads%';
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"crm-customers"', '"u2V3"')::jsonb WHERE collections::text LIKE '%crm-customers%';
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"pm-projects"', '"v3W4"')::jsonb WHERE collections::text LIKE '%pm-projects%';
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"pm-tasks"', '"w4X5"')::jsonb WHERE collections::text LIKE '%pm-tasks%';
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"fin-invoices"', '"x5Y6"')::jsonb WHERE collections::text LIKE '%fin-invoices%';
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"fin-transactions"', '"y6Z7"')::jsonb WHERE collections::text LIKE '%fin-transactions%';
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"inv-products"', '"z7A8"')::jsonb WHERE collections::text LIKE '%inv-products%';
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"inv-stock-movements"', '"a8B9"')::jsonb WHERE collections::text LIKE '%inv-stock-movements%';
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"hrm-employees"', '"b9C0"')::jsonb WHERE collections::text LIKE '%hrm-employees%';
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"hrm-attendance"', '"c0D1"')::jsonb WHERE collections::text LIKE '%hrm-attendance%';
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"help-tickets"', '"d1E2"')::jsonb WHERE collections::text LIKE '%help-tickets%';
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"site-branding"', '"e2F3"')::jsonb WHERE collections::text LIKE '%site-branding%';
UPDATE extension_catalog SET collections = REPLACE(collections::text, '"site-settings"', '"f3G4"')::jsonb WHERE collections::text LIKE '%site-settings%';
UPDATE extension_catalog SET globals = REPLACE(globals::text, '"site-branding"', '"e2F3"')::jsonb WHERE globals::text LIKE '%site-branding%';
UPDATE extension_catalog SET globals = REPLACE(globals::text, '"site-settings"', '"f3G4"')::jsonb WHERE globals::text LIKE '%site-settings%';
-- 3. morph_rows coll
UPDATE morph_rows SET coll='t1U2' WHERE coll='crm-leads';
UPDATE morph_rows SET coll='u2V3' WHERE coll='crm-customers';
UPDATE morph_rows SET coll='v3W4' WHERE coll='pm-projects';
UPDATE morph_rows SET coll='w4X5' WHERE coll='pm-tasks';
UPDATE morph_rows SET coll='x5Y6' WHERE coll='fin-invoices';
UPDATE morph_rows SET coll='y6Z7' WHERE coll='fin-transactions';
UPDATE morph_rows SET coll='z7A8' WHERE coll='inv-products';
UPDATE morph_rows SET coll='a8B9' WHERE coll='inv-stock-movements';
UPDATE morph_rows SET coll='b9C0' WHERE coll='hrm-employees';
UPDATE morph_rows SET coll='c0D1' WHERE coll='hrm-attendance';
UPDATE morph_rows SET coll='d1E2' WHERE coll='help-tickets';
UPDATE morph_rows SET workspace_id='a1B2' WHERE workspace_id='ws_default';
UPDATE morph_rows SET workspace_id='b2C3' WHERE workspace_id='ws-a';
UPDATE morph_rows SET workspace_id='c3D4' WHERE workspace_id='ws-b';
UPDATE morph_rows SET workspace_id='d4E5' WHERE workspace_id='ws-c';
UPDATE morph_rows SET workspace_id='e5F6' WHERE workspace_id='ws-d';
-- 4. extension_instances
UPDATE extension_instances SET id='f6G7' WHERE id='ext-crm-ws-d';
UPDATE extension_instances SET id='g7H8' WHERE id='ext-crm-ws-b';
UPDATE extension_instances SET id='h8I9' WHERE id='ext-pm-ws-d';
UPDATE extension_instances SET id='i9J0' WHERE id='ext-fin-ws-d';
UPDATE extension_instances SET id='j0K1' WHERE id='ext-inv-ws-a';
UPDATE extension_instances SET id='k1L2' WHERE id='ext-hrm-ws-a';
UPDATE extension_instances SET id='l2M3' WHERE id='ext-support-ws-d';
UPDATE extension_instances SET catalog_id='m1N2' WHERE catalog_id='crm';
UPDATE extension_instances SET catalog_id='n2O3' WHERE catalog_id='finance';
UPDATE extension_instances SET catalog_id='o3P4' WHERE catalog_id='hrm';
UPDATE extension_instances SET catalog_id='p4Q5' WHERE catalog_id='inventory';
UPDATE extension_instances SET catalog_id='q5R6' WHERE catalog_id='pm';
UPDATE extension_instances SET catalog_id='r6S7' WHERE catalog_id='support';
UPDATE extension_instances SET catalog_id='s7T8' WHERE catalog_id='system';
UPDATE extension_instances SET workspace_id='a1B2' WHERE workspace_id='ws_default';
UPDATE extension_instances SET workspace_id='b2C3' WHERE workspace_id='ws-a';
UPDATE extension_instances SET workspace_id='c3D4' WHERE workspace_id='ws-b';
UPDATE extension_instances SET workspace_id='d4E5' WHERE workspace_id='ws-c';
UPDATE extension_instances SET workspace_id='e5F6' WHERE workspace_id='ws-d';
-- 5. workspace_extensions
UPDATE workspace_extensions SET extension_instance_id='f6G7' WHERE extension_instance_id='ext-crm-ws-d';
UPDATE workspace_extensions SET extension_instance_id='g7H8' WHERE extension_instance_id='ext-crm-ws-b';
UPDATE workspace_extensions SET extension_instance_id='h8I9' WHERE extension_instance_id='ext-pm-ws-d';
UPDATE workspace_extensions SET extension_instance_id='i9J0' WHERE extension_instance_id='ext-fin-ws-d';
UPDATE workspace_extensions SET extension_instance_id='j0K1' WHERE extension_instance_id='ext-inv-ws-a';
UPDATE workspace_extensions SET extension_instance_id='k1L2' WHERE extension_instance_id='ext-hrm-ws-a';
UPDATE workspace_extensions SET extension_instance_id='l2M3' WHERE extension_instance_id='ext-support-ws-d';
UPDATE workspace_extensions SET workspace_id='a1B2' WHERE workspace_id='ws_default';
UPDATE workspace_extensions SET workspace_id='b2C3' WHERE workspace_id='ws-a';
UPDATE workspace_extensions SET workspace_id='c3D4' WHERE workspace_id='ws-b';
UPDATE workspace_extensions SET workspace_id='d4E5' WHERE workspace_id='ws-c';
UPDATE workspace_extensions SET workspace_id='e5F6' WHERE workspace_id='ws-d';
-- 6. extension_members
UPDATE extension_members SET extension_instance_id='f6G7' WHERE extension_instance_id='ext-crm-ws-d';
UPDATE extension_members SET extension_instance_id='g7H8' WHERE extension_instance_id='ext-crm-ws-b';
UPDATE extension_members SET extension_instance_id='h8I9' WHERE extension_instance_id='ext-pm-ws-d';
UPDATE extension_members SET extension_instance_id='i9J0' WHERE extension_instance_id='ext-fin-ws-d';
UPDATE extension_members SET extension_instance_id='j0K1' WHERE extension_instance_id='ext-inv-ws-a';
UPDATE extension_members SET extension_instance_id='k1L2' WHERE extension_instance_id='ext-hrm-ws-a';
UPDATE extension_members SET extension_instance_id='l2M3' WHERE extension_instance_id='ext-support-ws-d';
UPDATE extension_members SET workspace_id='a1B2' WHERE workspace_id='ws_default';
UPDATE extension_members SET workspace_id='b2C3' WHERE workspace_id='ws-a';
UPDATE extension_members SET workspace_id='c3D4' WHERE workspace_id='ws-b';
UPDATE extension_members SET workspace_id='d4E5' WHERE workspace_id='ws-c';
UPDATE extension_members SET workspace_id='e5F6' WHERE workspace_id='ws-d';
COMMIT;
-- Opsional: re-add FK manual nanti jika perlu (tidak wajib untuk app jalan)
-- SELECT id, collections::text FROM extension_catalog ORDER BY id;
-- SELECT DISTINCT coll FROM morph_rows ORDER BY coll;
