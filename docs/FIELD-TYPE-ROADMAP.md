# Arah jenis field Generic Data Engine

Daftar yang diberikan pengguna (terinspirasi properti database Notion) menjadi
referensi kemampuan produk, bukan klaim bahwa fitur Notion telah disalin:
Text, Number, Select, Multi-select, Status, Date, Person, Files & media,
Checkbox, URL, Email, Phone, Formula, Relation, Rollup, Created time,
Created by, Last edited time, Last edited by, Button, Place, ID, serta AI
Autofill: Summarize (Basic) dan Translate (Basic).

## Kondisi awal

Engine saat ini menyediakan text, textarea, integer, boolean, select dan
email. Integer bukan pengganti lengkap Number desimal; boolean dapat menjadi
dasar Checkbox tetapi pilihan tampilan/semantiknya belum ditetapkan. Select
belum berarti Status atau Multi-select. Created/edited metadata dan ID belum
tersedia sebagai field model pengguna. Implementasi yang sudah ada masih
memiliki batas Owner, record sendiri, dan pengujian live yang tercatat di
WORKBOOK.

## Urutan pengembangan bertahap

1. Tipe scalar dengan batas dan validasi server yang eksplisit: URL, Date,
   Phone, serta Number desimal dengan aturan presisi dan migrasi yang aman.
2. Multi-select dan Status: ID opsi stabil, definisi nilai, pengurutan dan
   aturan perubahan opsi; workflow Status diputuskan terpisah.
3. Field sistem (Created time/by, Last edited time/by, ID): sumber server,
   identitas stabil, audit, semantics saat edit dan akses sesuai workspace.
4. Person, Files & media, Relation dan Rollup: identitas dan izin, integritas,
   lifecycle, akses target, storage dan dependency/recompute; tanpa bypass
   kebijakan resource. Formula juga memerlukan kontrak tipe, dependencies,
   rekalkulasi serta pembatasan disclosure.
5. Button, Place dan AI Autofill memerlukan desain aksi/geodata/AI tersendiri.
   Summarize dan Translate memerlukan keputusan provider, bahasa, sumber,
   izin pengguna, persetujuan, biaya dan perlindungan data sebelum diaktifkan.

Setiap tipe harus melalui canonical graph dan kontrak registry yang sama:
identitas/versi, schema config, validasi, codec, rendering, capability dan
kompatibilitas/migrasi. Tambahan field tidak boleh menghapus data lama;
perubahan tipe yang berpotensi kehilangan data membutuhkan keputusan eksplisit.
Urutan ini adalah usulan kerja, bukan persetujuan provider, aturan workflow,
maupun janji bahwa seluruh kemampuan sudah tersedia.
