# Rancangan penyimpanan Database dan Relation Morph

**Status: rancangan untuk review; bukan DDL, implementasi, atau persetujuan migrasi.**
Diperbarui: 2026-11-02. Melengkapi [kontrak Template dan Database](DATABASE-TEMPLATE-JSON-CONTRACT.md),
[desain Field Binding dan Relation Edge](DATABASE-FIELD-BINDING-AND-RELATION-EDGE-DESIGN.md),
[arsitektur aplikasi](ARCHITECTURE.md), dan [skema target](TARGET-POSTGRESQL-SCHEMA.md).

Pengguna menyatakan data yang ada masih development, bukan produksi, dan tidak
keberatan jika **pembersihan data development diperlukan** agar target lebih
tepat. Itu tidak berarti database, volume, kredensial, workspace, user, atau
tabel pihak lain boleh dihapus tanpa identifikasi, preview ruang lingkup, dan
konfirmasi per tindakan. Rancangan ini tidak menjalankan SQL atau pembersihan.
Untuk data produksi di masa depan, evolusi dan pemulihan non-destruktif tetap
persyaratan utama.

## 1. Perjalanan produk yang dituju

```text
Workspace
├── Database: Project Management     ← instance dari Template
│   └── Table: Projects
│       ├── Field: Nama
│       └── Field: Manajer ───────────────────┐
└── Database: HR                             │
    └── Table: Employees ◄───────────────────┘
        └── Record: Andi
```

Field Relation menghubungkan **Record sumber → Record tujuan**, baik dalam satu
Database maupun antar-Database **di Workspace yang sama**, tanpa harus memakai
Template yang sama. Memilih Record tujuan mengubah link, bukan data tujuan.
Lookup membaca Field pada Record tujuan; perubahan sumber terlihat pada Lookup,
tetapi edit sumber lintas Table memerlukan kemampuan dan izin tersendiri. Tahap
awal Lookup read-only. Relasi lintas Workspace belum dirancang/diaktifkan.

Database dapat berada di beberapa Page sebagai instance yang sama. Owner mengatur
Database pada Page; siapa yang melihat section nantinya diatur per instance.
Itu tidak otomatis memberi hak melihat/mengomentari Record atau File: kebijakan
creator dan scope resource tetap berlaku, termasuk tanpa bypass otomatis Owner.
Cara Page/extension mengacu Database dan kombinasi policy masih perlu diputuskan.

## 2. Catatan legacy yang perlu diverifikasi

**Penting:** butir di bawah mendeskripsikan graph/implementasi lama yang ada di catatan proyek sebelumnya, bukan runtime aktif branch `morph-03`. Pada branch ini per 2026-11-01, data engine dan record store belum tersedia. Jangan gunakan sebagai bukti kondisi database lokal atau sebagai instruksi migrasi; sebelum reuse, verifikasi source/schema secara read-only setelah scope dan target disetujui.

- Graph canonical v1 punya `databases[]` yang secara produk merupakan **Table**;
  `modelGroups` adalah referensi presentasi, bukan bukti kepemilikan Database.
  Beberapa group dapat merujuk model yang sama; ID `legacy_rev_*` dapat dibangun
  dari riwayat dan dapat juga disimpan dalam urutan atau group yang dimaterialisasi.
- `morph_definition_heads`, `morph_definition_versions`, drafts dan events saat
  ini berscope workspace; satu head menserialisasi publish. Setiap Record di
  `morph_generic_records_v1` menunjuk `(workspace_id, schema_revision)` versi
  lama, memakai `database_id` sebagai ID model/Table dan nilai JSONB berkunci
  binding ID. `PostgresRecordStore` membaca schema asal dan mengizinkan update
  hanya bila additive compatibility aman.
- Kode active saat ini hanya Owner, daftar/edit record sendiri dan tipe scalar
  terbatas. Tidak ada Relation, Lookup, Trash, import/export Database, instance
  policy, per-Database head atau enforcement relasi yang dapat diklaim sudah
  tersedia. Jangan menghidupkan routes/catalog yang sudah ditangguhkan.
- Setup development lima tabel sudah pernah berhasil. Jangan menjalankannya ulang
  sebagai metode upgrade atau mengasumsikan container/port/role dari namanya
  saja; verifikasi koneksi aplikasi nyata terlebih dahulu.

## 3. Batas desain: satu engine dan satu kebenaran

Usulan target tetap memakai PostgreSQL + PHP/PDO + Datastar, canonical graph,
compiler, type registry, revision dan otorisasi server yang sama. Tidak membuat
CRUD terpisah per template, ORM wajib, server baru, atau database PostgreSQL fisik
per Database logis. Definisi JSON tervalidasi menentukan struktur dan UI; nilai
Record tidak disimpan sebagai satu file JSON raksasa.

| Objek konseptual | Identitas / tanggung jawab target |
| --- | --- |
| Workspace | Boundary tenant; identity dan membership dibuktikan server |
| Database instance | ID stabil, workspace, lifecycle, setting visibility dan provenance template |
| Definition revision | Snapshot immutable berversi: konfigurasi Database, Table, Field, binding dan dependensi graph yang dibutuhkan untuk membaca revision |
| Table dan Field | Identitas stabil; schema binding menyatakan Field tersedia pada Table/Data Source; Table View hanya presentation. Berbagi harus eksplisit, tidak diasumsikan eksklusif pada extension/Database |
| Record | ID stabil, Data Source/Table, creator, revision penulis, lifecycle, version token; nilai scalar dikodekan menurut identitas Field kanonis dan schema revision |
| Relation definition | Konfigurasi Field Relation: target Data Source, satu Display Field, dan `single` target per source Record/Field pada V1; tanpa reverse Field otomatis |
| Relation edge | Hubungan konkret source Record + identitas Field kanonis → target Record immutable; bukan binding placement Table View |
| Lookup definition | Field turunan dengan path Relation + identitas target Field kanonis; capability, tipe hasil, dependency dan disclosure tervalidasi |

### Bentuk fisik yang direkomendasikan untuk diteliti

Ini **bukan nama/DDL final**; foreign key, indeks dan akses harus dibuktikan pada
PostgreSQL nyata. Satu workspace registry/graph menyimpan identity dan sharing,
snapshot Database mereferensikannya dengan pin dependensi immutable. Snapshot
bukan salinan lain yang bisa diedit di luar graph. Publikasi beberapa resource
bersama harus konsisten atomik atau ditolak; strategi transaksi/per-Database head
perlu proof, bukan perubahan nama v1 secara langsung.

1. **Registry instance**: `(workspace_id, logical_database_id)` dengan lifecycle,
   label, provenance dan head/version; Database ini bukan `database_id` v1.
2. **Registry Table dan binding**: identity serta membership/reference dengan
   workspace eksplisit. Tidak memaksakan Table hanya boleh berada dalam satu
   Database; sharing aktif memerlukan kontrak policy tersendiri. Saat ini jangan
   menganggap group lama sebagai ownership definitif.
3. **Published definitions**: immutable `(workspace, logical_database_id,
   revision)` + pin versi registry/dependensi, dan draft/head CAS. Alternatif
   workspace graph head dengan per-Database projections dapat dipakai sebagai
   transisi, tetapi hanya satu writer/sumber kebenaran yang sah pada setiap fase.
4. **Records**: `(workspace, data_source_id, record_id)` dengan creator,
   revision yang dapat didecode, token version dan values JSONB untuk scalar.
   Nilai memakai identitas Field kanonis `field_definition_id`, bukan ID
   binding presentation Table View. Reuse satu Field Definition berarti
   semantik/config yang sama; perbedaan semantik per-Data-Source memerlukan
   identitas/config eksplisit yang berbeda.
   FK/unique membuktikan scope workspace dan
   Data Source. Tidak membuat satu physical SQL table per Data Source pengguna.
5. **Edges**: struktur typed/indexable dengan `(workspace_id,
   source_data_source_id, source_record_id, source_field_id,
   target_data_source_id, target_record_id)`; `source_field_id` adalah identitas
   Field kanonis `field_definition_id`, bukan binding view-specific.
   `target_record_id` hanya ada pada edge per Record. Config Relation terpisah
   membatasi target Data Source, satu `display_field_id`, dan maksimal satu
   target per `(workspace_id, source_data_source_id, source_record_id,
   field_definition_id)` pada V1. Target yang sama boleh dirujuk banyak source
   Record; keunikan target global tidak diasumsikan. V1 tidak memerlukan ordinal;
   multi-target adalah ekstensi masa depan, bukan atribut edge yang sudah aktif.
   Composite FK dan unique/index yang sesuai memverifikasi kedua endpoint berada
   di workspace/Data Source yang benar; schema service juga memvalidasi Field
   dan revision. Indeks arah keluar **dan masuk** diperlukan untuk read dan
   pemeriksaan dampak delete. Jangan menyimpan nilai Relation yang sama sebagai
   dua sumber writable di JSONB dan edge table: **edge menjadi sumber kebenaran**,
   JSON response adalah proyeksi. Audit, history, dan versioning edge perlu
   dirinci.

Registry field-type perlu kontrak identitas/versi, config schema, default,
normalize/validate, codec, renderer, query/index capability, compatibility,
migration dan dependencies. Config JSON bukan kode executable, dan semua
client/API/command/AI harus melalui gate server yang sama. Tipe yang belum
didukung tidak boleh diam-diam diganti.

## 4. Konsistensi, keamanan dan lifecycle relation

- Buat/edit Relation: otorisasi aksi pada Record sumber **dan** hak yang sesuai
  untuk menemukan/mereferensikan tujuan; pastikan target ada, scope sama, Table
  sesuai, schema/head dan record version valid. Jalankan pemeriksaan dan write
  dalam transaksi, dengan lock urutan stabil dan concurrency test; perubahan
  permission/revocation bersamaan tidak boleh membuka celah.
- Pada read/Lookup, periksa akses **tujuan dan Field tujuan**, bukan hanya
  akses sumber atau section. Filtering, sorting, autocomplete, counts, exports
  dan error tidak boleh membocorkan nilai/keberadaan Record yang tersembunyi.
  Tampilan referensi terbatas yang tidak membocorkan data perlu desain UX;
  jangan menampilkan ID, nama, atau jumlah yang tidak diotorisasi secara implisit.
- Source dan target harus tetap valid saat create/update/delete bersamaan.
  Pilih lock/FK/isolation dan retry semantics yang terbukti, termasuk target
  ditrash saat link dibuat dan publish schema bersamaan. Tidak mengandalkan
  pemeriksaan browser atau FK sebagai pengganti policy.
- Lookup read-only awal membaca sumber yang terotorisasi; jika kelak materialized
  cache/index diperkenalkan, ia derived, dapat dibangun ulang dan mengikuti
  dependency/version/disclosure. Perubahan sumber, permission, schema, trash dan
  restore harus menginvalidasi/recompute dengan strategi yang diuji; tidak boleh
  menyajikan nilai stale yang membocorkan informasi.
- Edit source lewat Table lain belum tersedia. Jika diaktifkan kelak, tampilkan
  bahwa Record sumber berubah; lakukan authorization sumber/Field, CAS Record dan
  audit yang sama dengan edit langsung. Mengganti pilihan Relation tidak mengedit
  Record tujuan.
- **Target Record Trash (keputusan pengguna):** tolak perubahan ke Trash selama
  masih ada incoming Relation edge. Pengguna harus melepas atau mengganti link
  secara eksplisit terlebih dahulu; validasi dan lifecycle write harus atomik.
  Relation baru juga tidak boleh memilih target yang sudah berada di Trash.
- **Permanent delete Record (keputusan pengguna):** tolak selama masih ada
  incoming atau outgoing edge. Semua edge harus diselesaikan eksplisit sebelum
  delete; jangan cascade-delete edge maupun source Record secara implisit.
- Source Record yang memiliki outgoing edge saat di-Trash masih belum diputuskan.
  Trash Database yang memuat Record bertarget juga kebijakan terpisah; ia tidak
  boleh melewati aturan target-Record tanpa pemeriksaan/penyelesaian dependensi.
- Database instance Trash, restore, dan permanent delete tetap memerlukan
  pemeriksaan izin, konflik, identitas dan dependensi; restore tidak otomatis
  membuat izin baru. Retention Trash, backup, dan file eksternal belum ditetapkan.

## 5. Export / import dan identitas

Export dapat memuat manifest versi, definisi dan Record yang diizinkan, serta
opsi media; relasi internal, relasi lintas Database, data tersembunyi, policy dan
Page harus dijelaskan secara eksplisit. Jangan diam-diam membocorkan data yang
hanya diketahui karena Relation. Format, tipe/codec versi dan batas ukuran harus
valid. Tidak mengasumsikan semua user boleh export seluruh Database.

- **Restore**: mempertahankan ID hanya jika provenance/target scope dan konflik
  diperiksa. Keputusan konflik harus jelas; tidak menimpa instance lain otomatis.
- **Salinan**: menghasilkan ID baru untuk Database/Table/Field/binding/Record,
  lalu remap semua relasi internal dan pilihan sesuai peta tervalidasi.
- **Relation ke Database eksternal paket**: tidak otomatis mengikat hanya karena
  label/ID tampak sama. Preview dan minta mapping dengan pemeriksaan scope dan
  izin; jika tidak cocok, fail closed atau selesaikan secara eksplisit, jangan
  membuang link tersembunyi. Import validasi dependency dan seluruh write secara
  atomik atau resumable dengan rollback yang benar. Page dan izin tidak otomatis
  disalin, dibuka atau diberi bypass. Fitur export/import belum dibuat.

## 6. Perubahan terencana dan opsi cleaning development

**Opsi A — migrasi data development (default bila aman):** mapping dari graph v1,
model/Table, group kandidat, shared binding, record & revision lama; menahan
ambiguitas dan merehearsal historical decode/FK. User tidak wajib mempertahankan
data ini, sehingga biaya migrasi historis dapat dibandingkan dengan opsi B.

**Opsi B — cleaning terarah development:** setelah inventaris dan konfirmasi
scope eksplisit, berhentikan writer aplikasi, backup yang sesuai dan reset hanya
objek/data Generic Engine yang disepakati. Tidak menghapus seluruh PostgreSQL,
volume/container, roles, workspace/user, tabel aplikasi lain atau test database.
Rencana harus menyebut tepat nama objek, dampak data/riwayat, cara verifikasi,
recovery dan apakah existing permissions/RLS perlu ditangani. Jangan menghapus
immutable revisions yang masih direferensikan sebelum semua FK dan fungsi lain
dipetakan. Tidak menjalankan `docker compose down -v`, `DROP DATABASE`, reset
password, `TRUNCATE ... CASCADE` atau installer lama sebagai shortcut. Jika
identitas target belum terbukti, berhenti.

**Tahap kerja:**

1. Audit read-only koneksi aplikasi dan lima tabel/kolom, relasi, versi, counts,
   schema privileges, dependency eksternal dan data scope; tanpa meminta secret
   atau export SQL di chat. Periksa apakah aplikasi atau operator sedang menulis.
2. Susun DDL/migration versioned dan rencana A/B dalam fixture/schema test
   terisolasi; bandingkan keselamatan dan kompleksitas. Tentukan aturan shared
   Table/Field dan atomic version pins sebelum menetapkan constraint final.
3. Bangun slice vertikal kecil: template → Database logis → Table → typed Field
   → Record, dengan validation, CAS, UI/Datastar, Owner gate dan real PostgreSQL.
   Rehearsal data lama atau reset hanya sesuai rencana yang disetujui.
4. Tambahkan Relation dalam satu Database lalu lintas Database di workspace yang
   sama menggunakan engine dan tabel edges yang sama; lanjutkan Lookup read-only.
   Masing-masing butuh integrity, ACL/disclosure dan concurrency gates.
5. Tambahkan Trash/restore, lalu export/import dengan dampak relation; dapat
   dikerjakan bertahap tetapi tidak mengaktifkan permanent delete atau export yang
   tidak aman hanya untuk menyelesaikan UI.
6. Sebelum perubahan nyata pada Laragon: tampilkan preview target, backup,
   expected effects, batas dan rencana recovery; minta konfirmasi jelas untuk
   tindakan yang direncanakan. Jalankan hanya setelah user memutuskan A/B dan
   scope spesifik; verifikasi sesudahnya terhadap koneksi dan workspace yang sama.

## 7. Acceptance gates

- Identitas baru berbeda dan stabil; repeated Template menghasilkan instance
  independen; rename/reorder tidak memutus Record/Relation. Validasi canonical,
  unknown capability dan duplicate keys fail closed.
- Real PostgreSQL: cross-workspace dan wrong-table target ditolak, FK tidak
  meninggalkan edge yatim; V1 single-target per source Record/Field ditegakkan
  secara atomik dan satu target dapat direferensikan banyak source Records.
  Target dengan incoming edge tidak dapat di-Trash; permanent delete ditolak
  selama ada incoming/outgoing edge, tanpa cascade implisit. Uji concurrent
  create/relink/lifecycle/schema/permission dan rollback.
- Auth tests dengan principal dan membership nyata: tidak ada implicit Owner
  bypass atas creator View/Comment; test source/target/Field, hidden records,
  lookup, errors, sort/filter, autocomplete dan export; mock bukan bukti RLS.
- Snapshot lama decode benar; migrasi A mempertahankan ID/nilai dan teruji dengan
  legacy/standalone/shared cases. Cleaning B menghapus tepat scope yang disetujui
  dan menyisakan tabel, users, workspaces dan aplikasi lain; repeat-safe.
- Trash/restore dan permanent-delete dependency review, backup/recovery, export
  restore dan copy/remap diuji. Browser/Datastar setelah server confirmation;
  visible UI tidak cukup tanpa POST/auth/PG tests.

## 8. Pertanyaan produk tersisa

- Kebijakan UI saat target Relation tidak dapat diakses; V1 tidak menyediakan
  reverse Relation Field atau backlink UI.
- Lifecycle source Record dengan outgoing edges saat di-Trash dan Trash Database
  yang memuat target Record; retention Trash serta siapa yang boleh restore atau
  menghapus permanen Record/Database. Target Trash dan permanent delete dengan
  edge aktif sudah dibatasi sesuai keputusan V1.
- Cara instance Database, extension dan page berelasi; bagaimana kombinasi akses
  per instance/Page dengan creator-configured View/Comment.
- Penerapan shared Field/Table, izin edit bersama dan transaksi multi-Database;
  desain index/codec, history Record/edge, dan export file eksternal.
