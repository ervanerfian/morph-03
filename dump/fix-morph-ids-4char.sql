-- HeidiSQL: copy-paste ke Query -> F9 (prefix LEAD/PRJ... -> 4-char + morph_rows id/data)
-- Maps: LEAD->t1U2 CUST->u2V3 PRJ->v3W4 TSK->w4X5 INV->x5Y6 TRX->y6Z7 SKU->z7A8 MOV->a8B9 EMP->b9C0 ATT->c0D1 TCK->d1E2
-- Id lama PRJ-007 -> v3W4-007 agar logic id pure chars (KTP) — pretty label tetap di display_name
BEGIN;
-- 1. morph_rows.id primary (char prefix)
UPDATE morph_rows SET id = REPLACE(id, 'LEAD-', 't1U2-') WHERE coll='t1U2';
UPDATE morph_rows SET id = REPLACE(id, 'lead-', 't1U2-') WHERE coll='t1U2';
UPDATE morph_rows SET id = REPLACE(id, 'CUST-', 'u2V3-') WHERE coll='u2V3';
UPDATE morph_rows SET id = REPLACE(id, 'cust-', 'u2V3-') WHERE coll='u2V3';
UPDATE morph_rows SET id = REPLACE(id, 'PRJ-', 'v3W4-') WHERE coll='v3W4';
UPDATE morph_rows SET id = REPLACE(id, 'TSK-', 'w4X5-') WHERE coll='w4X5';
UPDATE morph_rows SET id = REPLACE(id, 'INV-', 'x5Y6-') WHERE coll='x5Y6';
UPDATE morph_rows SET id = REPLACE(id, 'inv-', 'x5Y6-') WHERE coll='x5Y6';
UPDATE morph_rows SET id = REPLACE(id, 'TRX-', 'y6Z7-') WHERE coll='y6Z7';
UPDATE morph_rows SET id = REPLACE(id, 'trx-', 'y6Z7-') WHERE coll='y6Z7';
UPDATE morph_rows SET id = REPLACE(id, 'SKU-', 'z7A8-') WHERE coll='z7A8';
UPDATE morph_rows SET id = REPLACE(id, 'sku-', 'z7A8-') WHERE coll='z7A8';
UPDATE morph_rows SET id = REPLACE(id, 'MOV-', 'a8B9-') WHERE coll='a8B9';
UPDATE morph_rows SET id = REPLACE(id, 'mov-', 'a8B9-') WHERE coll='a8B9';
UPDATE morph_rows SET id = REPLACE(id, 'EMP-', 'b9C0-') WHERE coll='b9C0';
UPDATE morph_rows SET id = REPLACE(id, 'emp-', 'b9C0-') WHERE coll='b9C0';
UPDATE morph_rows SET id = REPLACE(id, 'ATT-', 'c0D1-') WHERE coll='c0D1';
UPDATE morph_rows SET id = REPLACE(id, 'att-', 'c0D1-') WHERE coll='c0D1';
UPDATE morph_rows SET id = REPLACE(id, 'TCK-', 'd1E2-') WHERE coll='d1E2';
UPDATE morph_rows SET id = REPLACE(id, 'tck-', 'd1E2-') WHERE coll='d1E2';
-- case insensitive fallback: upper
UPDATE morph_rows SET id = REPLACE(upper(id), 'PRJ-', 'v3W4-') WHERE coll='v3W4' AND id LIKE 'PRJ-%';
-- 2. data jsonb: ganti semua occurrence prefix di dalam data::text (id,code,title dll)
UPDATE morph_rows SET data = REPLACE(data::text, 'LEAD-', 't1U2-')::jsonb WHERE data::text LIKE '%LEAD-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'lead-', 't1U2-')::jsonb WHERE data::text LIKE '%lead-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'CUST-', 'u2V3-')::jsonb WHERE data::text LIKE '%CUST-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'cust-', 'u2V3-')::jsonb WHERE data::text LIKE '%cust-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'PRJ-', 'v3W4-')::jsonb WHERE data::text LIKE '%PRJ-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'prj-', 'v3W4-')::jsonb WHERE data::text LIKE '%prj-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'TSK-', 'w4X5-')::jsonb WHERE data::text LIKE '%TSK-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'tsk-', 'w4X5-')::jsonb WHERE data::text LIKE '%tsk-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'INV-', 'x5Y6-')::jsonb WHERE data::text LIKE '%INV-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'inv-', 'x5Y6-')::jsonb WHERE data::text LIKE '%inv-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'TRX-', 'y6Z7-')::jsonb WHERE data::text LIKE '%TRX-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'trx-', 'y6Z7-')::jsonb WHERE data::text LIKE '%trx-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'SKU-', 'z7A8-')::jsonb WHERE data::text LIKE '%SKU-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'sku-', 'z7A8-')::jsonb WHERE data::text LIKE '%sku-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'MOV-', 'a8B9-')::jsonb WHERE data::text LIKE '%MOV-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'mov-', 'a8B9-')::jsonb WHERE data::text LIKE '%mov-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'EMP-', 'b9C0-')::jsonb WHERE data::text LIKE '%EMP-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'emp-', 'b9C0-')::jsonb WHERE data::text LIKE '%emp-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'ATT-', 'c0D1-')::jsonb WHERE data::text LIKE '%ATT-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'att-', 'c0D1-')::jsonb WHERE data::text LIKE '%att-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'TCK-', 'd1E2-')::jsonb WHERE data::text LIKE '%TCK-%';
UPDATE morph_rows SET data = REPLACE(data::text, 'tck-', 'd1E2-')::jsonb WHERE data::text LIKE '%tck-%';
-- juga handle code tanpa dash: PRJ001 -> v3W4-001? fallback
-- 3. code fields inside data yang masih full semantic (contoh PRJ-HR-08)
-- sudah tercover via REPLACE di atas karena mengandung PRJ-
COMMIT;
-- cek: SELECT coll, id, data->>'code' FROM morph_rows ORDER BY coll, id LIMIT 20;
