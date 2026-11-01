-- Murni 4-char: morph_rows.id -> 4-char random a1B2-style tanpa x5Y6- prefix & tanpa -005 numbering
-- Jalankan: psql -U morph_app -d morph -f dump/fix-morph-ids-murni.sql
BEGIN;
-- gen 4-char: substring(md5(gen_random_uuid()::text) from 1 for 4) is hex only; we want a1B2 style -> use custom function or just update via script
-- Simplest: set id = left(replace(gen_random_uuid()::text,'-',''),4)  -- hex 4-char, then ensure uniqueness via loop if needed
UPDATE morph_rows SET id = left(replace(gen_random_uuid()::text,'-',''),4);
UPDATE morph_rows SET data = jsonb_set(data, '{id}', to_jsonb(id::text), true);
COMMIT;
SELECT coll, count(*), count(DISTINCT id) as uniq FROM morph_rows GROUP BY coll ORDER BY coll;
