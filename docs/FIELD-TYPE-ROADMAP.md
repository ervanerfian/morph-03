# Arah jenis field Generic Data Engine

Daftar yang diberikan pengguna (terinspirasi properti database Notion) menjadi
referensi kemampuan produk, bukan klaim bahwa fitur Notion telah disalin:
Text, Number, Select, Multi-select, Status, Date, Person, Files & media,
Checkbox, URL, Email, Phone, Formula, Relation, Rollup, Created time,
Created by, Last edited time, Last edited by, Button, Place, ID, serta AI
Autofill: Summarize (Basic) dan Translate (Basic).

## Kondisi awal branch morph-03

Per 2026-11-01 branch ini adalah foundation aplikasi PHP/UI; Generic Data Engine,
registry tipe, compiler, record store, atau runtime field type belum
diimplementasikan. Catatan tentang `text`, `textarea`, `integer`, `boolean`,
`select`, `email`, batas Owner, dan pengujian WORKBOOK berasal dari implementasi
legacy yang didokumentasikan sebelumnya dan bukan bukti fitur pada branch ini.
Verifikasi source/runtime baru diperlukan sebelum mengklaim tipe sudah tersedia.

## Prinsip registry yang dapat diperluas

Daftar di atas adalah backlog kebutuhan yang diketahui, **bukan enum atau menu
tertutup**. Field menunjuk stable type ID dan versi kontrak. Modul tepercaya
mendaftarkan descriptor yang menjelaskan schema config, validasi/normalisasi,
codec, renderer, query/filter/sort/index capabilities, authorization dan
projection/disclosure, dependencies, serta compatibility/migration. Compiler,
UI picker, API dan command menemukan tipe dari registry yang sama; alur CRUD
umum tidak boleh memiliki mapping tertutup per preset.

Pengguna mengisi konfigurasi deklaratif dari tipe yang terdaftar; mereka tidak
mengirim PHP, SQL, JavaScript, nama class, atau kode executable untuk membuat
tipe runtime. Tipe/version yang tidak dikenal gagal tertutup pada operasi yang
tidak aman dan definisi/nilai tetap dipertahankan agar tidak hilang. Menambah
tipe berarti menambah kontrak dan implementasi tepercaya melalui modul, bukan
mengubah setiap template atau menambahkan branch khusus di setiap fitur.

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
