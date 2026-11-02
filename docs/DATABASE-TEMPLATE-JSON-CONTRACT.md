# Rancangan: Template → Database → Table → Field → Record

**Status: rancangan produk dan kontrak usulan; belum diimplementasikan dan bukan persetujuan DDL.**
Diperbarui 2026-11-02. Contoh JSON adalah ilustrasi, bukan API atau fixture valid. Dokumen ini melengkapi [architecture](ARCHITECTURE.md), [module boundaries](MODULE-BOUNDARIES.md), [roadmap tipe Field](FIELD-TYPE-ROADMAP.md), dan [desain Relation](DATABASE-FIELD-BINDING-AND-RELATION-EDGE-DESIGN.md). Tidak mengubah DB, permissions, route atau perilaku runtime yang sudah berjalan.

## 1. Istilah dan batas

| Produk | Makna | Tampilan awal |
| --- | --- | --- |
| Database Template | Cetakan konfigurasi untuk membuat satu Database logis | Pilihan dan pratinjau template |
| Database | Hasil penerapan template dalam Workspace; bukan database PostgreSQL fisik baru | Satu section vertikal yang dapat ditata pada Page |
| Table | Unit organisasi dalam Database logis yang merujuk pada sumber Record di graph canonical | Tab dalam section Database |
| Data Source | Pemilik persisten Record dan schema-level Field Binding | Dapat dibaca melalui satu atau beberapa Table View |
| Table View | Presentation atas Data Source; tidak menentukan schema membership atau identitas nilai | Visibilitas, urutan, dan label per view |
| Field | Definisi tipe dan pengaturan nilai; schema binding menyatakan Data Source tempat Field tersedia | Kolom dan kontrol input sesuai preferensi Table View |
| Record | Satu entri dengan nilai Field dalam satu Table | Baris tabel |

Tampilan Table sebagai tab dan Field sebagai kolom adalah **presentasi**, bukan
identitas data. **Workspace menampung koleksi Database**; alur yang disepakati
adalah user memilih Template untuk membuat Database dalam Workspace. Kemungkinan
template kosong atau jalur pembuatan lain belum diputuskan.

Pada setiap Page, Owner menentukan Database apa yang ditampilkan: satu Database
atau beberapa section Database yang tersusun vertikal. Database yang sama dapat
ditampilkan di beberapa Page sebagai instance yang sama, bukan salinan definisi
atau Record; perubahan data mengikuti instance itu. Page bukan pemilik Database;
seleksi dan urutan section berscope Page dan workspace, bukan ownership. Cara
user membuat Page dan pengaturan view/akses terperinci dibahas kemudian. Page
sebagai mading/shortcut extension tetap berlaku; cara tepat menautkan Database
ke page melalui extension belum diputuskan. Menampilkan Database pada Page tidak
memberi izin otomatis atau membuka general composition yang masih ditangguhkan.

**Keputusan visibilitas section:** siapa yang dapat melihat section Database
nantinya ditentukan di pengaturan masing-masing instance, bukan otomatis oleh
Page atau Template. Instance yang sama pada beberapa Page menggunakan pengaturan
instance yang sama; Page dapat memiliki aturan akses tersendiri bila dikonfigurasi.
Visibilitas section tidak otomatis memberi hak melihat atau mengomentari setiap
Record/File: aturan creator dan izin resource tetap berlaku. Rincian setting,
hubungan instance Database dengan instance extension, kombinasi aturan Page,
dan enforcement masih perlu dirancang; fitur tersebut belum diimplementasikan.

Extension dan Database adalah konsep berbeda: hanya Owner membuat/menonaktifkan extension,
tetapi kardinalitas extension ↔ Database serta aturan ownership bersama masih
keputusan produk. Jangan menciptakan extension, page, relasi, permission atau
record hanya karena sebuah Database Template diterapkan.

Database mengatur komposisi/referensi Table; jangan menjadikan Field atau Table
selalu milik eksklusif sebuah extension atau Database. Kebutuhan mengacu Table
yang sama dari beberapa Database, cara izin dan dampak perubahan bersama perlu
kontrak terpisah. Hingga selesai, jangan menawarkan sharing baru yang tidak aman;
keanggotaan atau tampilan tidak boleh menjadi bukti hak akses.

## 2. Catatan legacy dan keadaan branch morph-03

**Penting:** butir berikut merekam model/implementasi lama yang disebut dalam dokumen sebelumnya, bukan kode yang tersedia pada branch `morph-03`. Pada branch ini saat diperiksa 2026-11-01, aplikasi adalah foundation UI/PHP; Generic Data Engine, template compiler, record store, migrasi, dan Relation runtime belum ada. Jangan menyebut butir legacy sebagai fitur yang sedang aktif atau menganggapnya izin migrasi. Audit kode dan database aktual baru boleh dilakukan pada gate terpisah.

- Katalog `data/templates/applications.json` berisi dua template; builder
  `ApplicationTemplateBuilder` membuat `modelGroups`, `databases`, shared field,
  binding dan opsi baru dengan ID terpisah. Template saat ini membuat struktur,
  bukan relasi, pages, automasi, permissions atau seed data.
- Pada graph canonical v1, `modelGroups` adalah **kelompok referensi presentasi**,
  bukan Database logis yang dijamin memiliki Table. Satu model dapat dirujuk oleh
  lebih dari satu group. `databases[]` justru merupakan model yang mendekati
  istilah produk **Table**; `sharedFields[]` berisi definisi Field dan binding
  memiliki ID/key sendiri. Nama properti v1 tidak otomatis berubah.
- `LegacyTemplateGroups` mengusulkan section berdasarkan riwayat jika dapat
  dikenali; ini hanya rekonstruksi tampilan, bukan bukti kepemilikan/provenance.
  Model standalone disajikan sebagai section sintetis. `modelSectionOrders`
  adalah urutan per Page, bukan ownership.
- Published canonical JSON dan head saat ini **satu per workspace**, draft per
  actor/workspace; record disimpan dengan `workspace_id`, `database_id` v1
  (yaitu ID model/Table), `schema_revision`, dan nilai JSONB berkunci binding ID.
  Revision record merujuk `(workspace_id, revision)` graph lama. Record lama
  dibaca dengan revision asal; edit mengharuskan additive compatibility. Tidak
  ada JSON tersimpan per Database logis atau head per Database saat ini.
- Registry runtime mendukung `text`, `textarea`, `email`, `integer`, `boolean`,
  `select`; katalog template saat ini lebih terbatas. Batas compiler v1 adalah
  20 model per workspace, 100 binding per model dan batas ukuran proyeksi.
  Banyaknya kombinasi belum berarti batas itu sudah diangkat atau tipe lain siap.
- Runtime aktif masih Owner-only dan daftar/edit record sendiri. Ini bukan policy
  final, bukti isolasi RLS, bukti transaksi migrasi, atau pembuktian browser/PG.
  General page composition tetap ditangguhkan; Puzzle reorder section yang ada
  tidak otomatis mengaktifkan catalog/composition umum.

## 3. Bentuk target dan sumber kebenaran

Targetnya satu sistem canonical, bukan engine CRUD baru:

1. Katalog template deklaratif dan berversi menyimpan **blueprint**, bukan data
   user atau kode executable. UI, API, command dan AI nantinya menggunakan
   compiler, validation, authorization dan operasi server yang sama.
2. Database logis memiliki **definisi canonical JSON berversi**. Usulan bentuk
   persistence: satu snapshot immutable per `(workspace, logicalDatabaseId,
   databaseRevision)` dan satu head/draft per scope yang sesuai. PostgreSQL tetap
   tempat penyimpanan; JSON dapat berupa kolom DB, bukan file per user. Format
   fisik TEXT/JSONB dan DDL diputuskan setelah kebutuhan validasi, indexing,
   migration dan deployment diuji. JSON bukan bukti otomatis bahwa query aman.
3. Registry graph workspace tetap memetakan identitas Table, Field, binding,
   relasi dan referensi bersama. Database JSON menyimpan komposisi dan referensi
   tervalidasi; setiap snapshot harus mengunci versi dependensi atau berisi
   snapshot dependensi immutable untuk dapat direkonstruksi. Snapshot itu bagian
   dari **satu graph canonical berversi**, bukan salinan editable kedua. Perubahan
   shared object harus menerbitkan dependensi yang konsisten secara atomik atau
   ditolak; detail mekanisme dan izin perubahan bersama belum diputuskan.
4. UI dirender dari published definition terotorisasi dan registry tipe yang
   dipercaya. Client tidak boleh memasok graph, tipe, policy atau actor sebagai
   otoritas. Perubahan melalui draft → validasi → compatibility/migration →
   publish CAS; record mutation kembali mengecek membership/policy, scope,
   published revision dan validasi server dalam transaksi.
5. Record tetap terpisah dari definisi dan tersimpan di PostgreSQL. Nilai scalar
   serta Relation edge mengacu pada identitas Field kanonis, bukan binding
   placement Table View; revision diperlukan agar nilai lama dapat didecode.
   JSONB saja tidak membuktikan integritas Relation, query bertipe, indexing atau
   permission. Key fisik final masih terbuka, lihat §3.1.

Belum ada keputusan untuk melakukan migrasi head workspace menjadi head Database
atau DDL tertentu. Sebelum itu, boleh memproyeksikan satu Database dari graph
v1 **secara read-only** untuk pembuktian dan UX; proyeksi bukan sumber tulis
baru. Perubahan yang disajikan ke user tetap harus melalui engine v1 yang sama
sampai cutover resmi. `schemaVersion`, versi template, versi field-type dan
revision instance berbeda dan tidak boleh dipertukarkan.

### Ilustrasi konsep, bukan skema yang sudah didukung

```json
{
  "schemaVersion": 2,
  "database": {
    "id": "db_project_a",
    "label": "Project Management A",
    "tableRefs": ["table_projects", "table_tasks"]
  },
  "tables": [
    {"id": "table_projects", "label": "Projects", "dataSourceId": "ds_projects"},
    {"id": "table_tasks", "label": "Tasks", "dataSourceId": "ds_tasks"}
  ],
  "dataSources": [
    {
      "id": "ds_projects",
      "label": "Projects",
      "bindings": [
        {"id": "binding_name", "fieldId": "field_name"},
        {"id": "binding_notes", "fieldId": "field_notes"}
      ]
    },
    {"id": "ds_tasks", "label": "Tasks", "bindings": []}
  ],
  "tableViews": [
    {
      "id": "view_projects_default",
      "dataSourceId": "ds_projects",
      "label": "Projects",
      "columns": [
        {"fieldId": "field_name", "visible": true, "position": 1},
        {"fieldId": "field_notes", "visible": false, "position": 2}
      ]
    }
  ],
  "fields": [
    {"id": "field_name", "label": "Nama", "type": "text"},
    {"id": "field_notes", "label": "Keterangan", "type": "textarea"}
  ]
}
```

Contoh sengaja menghilangkan config wajib, dependency pins dan metadata revision;
ini bukan fixture valid compiler v1, bukan contoh payload API, dan tidak memutuskan
apakah Table kosong diperbolehkan. `dataSources[].bindings` menunjukkan schema
membership pada Data Source kanonis; `tables[].dataSourceId` dan
`tableViews[].dataSourceId` menunjuk ke identity yang sama. `tableViews[].columns`
hanya menyimpan preferensi presentation dan boleh merujuk Field yang tersedia pada
schema Data Source tersebut. Nama/key JSON masih ilustratif, bukan kontrak final. ID
contoh tidak boleh dipakai untuk instance nyata. Kontrak final harus dirinci dan
divalidasi sebelum implementasi.

### 3.1 Kontrak Relation yang dikonfirmasi pengguna

Untuk V1, target Relation dan nilai yang ditampilkan adalah dua hal berbeda:

- Konfigurasi Field Relation menentukan target Data Source dan **tepat satu**
  `displayFieldId` dari target. UI menggunakan radio untuk memilih Display
  Field; radio ini bukan pilihan Record tujuan dan bukan pengaturan cardinality.
- Nilai pada setiap Record sumber adalah Relation edge yang menyimpan immutable
  `targetRecordId` (record identity/UUID), bukan label yang sedang ditampilkan
  dan bukan `record_key` yang dapat berubah. Target Record dipilih per nilai
  Record sumber; karena itu `targetRecordId` tidak berada di config Field.
- Saat Display Field diganti, edge tetap menunjuk Record yang sama dan hanya
  proyeksinya yang berubah. Saat nilai Field target diedit, pembacaan Relation
  menampilkan nilai terbaru sesuai izin target; nama/label tidak disalin ke edge.
- Field Binding mengaitkan Field Definition ke schema Data Source kanonis; setiap
  Table View hanya mengatur visibilitas, urutan, dan label tampilannya. Ini tetap
  terpisah dari radio Display Field. Multi-field Projection (misalnya Nama +
  Departemen) adalah kemampuan berbeda di masa depan, bukan checkbox tambahan.
- V1 tidak membuat reverse Relation Field atau backlink UI; incoming edge tetap
  dihitung untuk integritas dan lifecycle.
- Target Record yang masih memiliki incoming edge tidak dapat di-Trash. Permanent
  delete ditolak selama masih ada incoming/outgoing edge; edge harus diselesaikan
  secara eksplisit dan tidak ada cascade implisit. Source/Database Trash masih
  memerlukan kebijakan tersendiri.
- Relation V1 menggunakan `cardinality: "single"`: setiap source Record/Relation
  Field memiliki nol atau satu target. Banyak source Records boleh menunjuk target
  yang sama; tidak ada keunikan target global. Kardinalitas berlaku pada config
  dan kumpulan edge, bukan disimpan berulang pada tiap edge. Multi-target adalah
  kemampuan masa depan dan tidak diaktifkan oleh kontrak V1.

Ilustrasi berikut **bukan format API/DDL**; ia hanya memisahkan schema config
Relation dari nilai edge per Record:

```json
{
  "relationFieldConfig": {
    "targetDataSourceId": "employee_data_source",
    "displayFieldId": "employee_name_field",
    "cardinality": "single"
  },
  "relationEdge": {
    "sourceRecordId": "project_record_uuid",
    "sourceFieldId": "project_owner_field",
    "targetDataSourceId": "employee_data_source",
    "targetRecordId": "employee_record_uuid"
  }
}
```

`sourceFieldId` harus mengidentifikasi nilai Field kanonis, bukan binding
presentation yang berbeda untuk setiap Table View. Keputusan V1 adalah memakai
`field_definition_id` sebagai key nilai pada sebuah Record: Field Definition
yang sama berarti semantik/config yang sama, tetapi Record berbeda tetap
menyimpan nilai berbeda. Jika semantik harus berbeda per Data Source, diperlukan
identitas/config Field eksplisit yang berbeda, bukan key view binding. Bentuk
persistensi, constraint final, revision pin, dan capability pin tetap perlu
review sebelum DDL.

## 4. Template composable dan pengalaman user

- **Database Template** mengomposisikan Table Template dan/atau definisi Table;
  **Table Template** mengomposisikan Field Set Template dan/atau Field;
  **Field Set Template** adalah kumpulan Field, bukan nested Table atau relasi.
- Setiap template memiliki ID, versi immutable, label/deskripsi, kategori,
  referensi terikat versi, persyaratan kapabilitas dan struktur tervalidasi.
  Resolver mendeteksi referensi hilang, siklus, konflik, versi tak dikenal,
  ukuran/depth dan tipe/config unsupported sebelum publish. Jangan mengambil
  executable, path, JS, SQL atau URL arbitrer dari JSON. JSON Schema dapat
  memeriksa bentuk, tetapi validasi semantik, permission dan capability tetap
  otoritas server.
- Tampilkan pratinjau Table dan Field, dengan **Field utama terpilih** dan Field
  tambahan opsional; user dapat menyesuaikan sebelum membuat Database. Tentukan
  per template apa yang utama—bukan semua kemungkinan Field pada setiap Table.
  Validasi ketergantungan dan minimal struktur tetap berlaku; ketidaktersediaan
  tipe jangan diam-diam diganti tipe lain. Template dengan capability yang belum
  siap tidak boleh disajikan seolah dapat dipakai.
- Instansiasi menerbitkan ID baru untuk Database, Table, Field, binding, pilihan
  dan sebagainya, serta mencatat provenance template ID/versi dan pilihan user.
  Repeated apply menghasilkan instance dan record terpisah secara default.
  Provenance adalah metadata, bukan mekanisme live sync. Pembaruan template
  tidak otomatis menimpa definisi atau data user; update terkelola/diff/opt-in
  adalah kemampuan masa depan.
- Default hasil template independen; penggunaan Field/Table bersama adalah
  fitur eksplisit berbeda yang memerlukan kebijakan perubahan dan izin. Hindari
  asumsi bahwa Field atau Table intrinsik hanya boleh berada di satu Database.
- Menyembunyikan kolom adalah perubahan view, bukan menghapus Field/nilai.
  Menghapus Field memerlukan desain dampak, arsip/pemulihan dan konfirmasi;
  fitur delete belum tersedia. Tidak pernah membuang nilai otomatis.

## 5. Evolusi, validasi, dan keamanan

- Rename/reorder mempertahankan ID Database, Table, Field dan binding serta
  nilai. Urutan field Table default dan override urutan/visibilitas view harus
  dibedakan; urutan section Page tetap page-scoped. Tidak menambah entitlement.
- Semua tipe mengikuti kontrak identitas/versi, config schema/default,
  normalization/validation, codec, renderer, query/index capability,
  compatibility/migration dan dependencies. Unknown type/version gagal tertutup.
- **Keputusan user untuk perubahan tipe:** hanya izinkan bila seluruh nilai yang
  terdampak kompatibel; tolak bila ada yang tidak cocok. Pemeriksaan mencakup
  semua pemilik Record, semua binding/referensi terkait dan revision lama, bukan
  hanya 50 record yang tampil. Konversi harus lossless menurut aturan tipe yang
  eksplisit; nilai asli dan kemampuan membaca revision lama harus aman. Validasi,
  lock/concurrency, perubahan data/definisi dan publikasi harus atomik atau aman
  untuk dilanjutkan/rollback. Belum ada perubahan tipe yang diaktifkan.
- Setiap command memerlukan authenticated trusted scope serta resource policy
  server; lookup selalu membatasi workspace dan resource. Creator-configured
  View/Comment, termasuk public dan tanpa bypass otomatis Owner, tetap mengikuti
  keputusan produk. Jangan menyamakan role, UI tersembunyi atau RLS kandidat
  dengan enforcement. Record relations perlu target existence, disclosure,
  integrity, capability, dependency/recompute dan scope checks tersendiri.
- Limit ukuran/depth, duplicate JSON keys, nama, ID, count, template expansion,
  parsing UTF-8 dan request ditetapkan server-side. Encode label dalam HTML;
  renderer menggunakan komponen terdaftar dan token tema, bukan HTML dari user.
  Fail closed pada schema rusak, capability tidak ada, izin gagal atau revision
  stale; tampilkan error yang menjaga draft jika memungkinkan.

### Kontrak registry Field yang terbuka

Daftar tipe pada `FIELD-TYPE-ROADMAP.md` adalah katalog kebutuhan saat ini,
bukan enum tertutup. Setiap tipe memiliki stable type ID dan versi kontrak,
config schema, validasi/normalisasi, codec baca/tulis, renderer, capability query
/filter/sort/index, authorization/disclosure rules, dependency, dan aturan
compatibility/migration. Modul tepercaya mendaftarkan tipe beserta kapabilitasnya;
compiler dan UI menemukan tipe melalui registry, bukan mapping hardcoded per
preset atau `switch` yang harus diubah pada setiap CRUD flow. Pengguna dapat
mengkonfigurasi tipe yang terdaftar, tetapi JSON pengguna tetap data deklaratif,
bukan kode executable atau plugin runtime.

Tipe atau versi yang tidak dikenal harus fail closed untuk read/write yang tidak
aman, dengan definisi/nilai asli tetap dipertahankan agar tidak hilang. Menambah
kapabilitas baru boleh menambah modul handler tepercaya; tidak boleh memerlukan
perombakan semua template/CRUD. Tidak ada tipe roadmap yang dianggap
terimplementasi sampai registry handler, migrasi/compatibility, izin, dan tesnya
benar-benar tersedia.

## 6. Transisi tanpa menghilangkan data

Ini rencana, bukan perintah migrasi atau izin menjalankan DDL sekarang.

1. **Inventaris read-only**: cek versi/head/history, group, section order per
   page, model, shared field/binding, referensi, counts dan revision record;
   capture metadata non-sensitif, verifikasi akses, backup dan rehearsal terpisah.
   Tidak rerun installer lima tabel dan tidak menghapus, mereset atau menebak data.
2. **Pemetaan eksplisit**: model v1 → Table dengan ID model tetap; binding,
   Field, option, record ID/nilai/creator dan revision historis tetap. Group
   canonical menjadi kandidat Database, tetapi group adalah referensi presentasi:
   group overlap, shared Fields, group manual, template berulang, standalone,
   urutan Page dan sejarah ambigu harus ditangani tanpa mengklaim ownership atau
   provenance. Standalone perlu identitas Database baru yang persisten dan
   idempotent; ID sintetis tampilan tidak otomatis ID kepemilikan. Usulan dari
   `LegacyTemplateGroups` hanya boleh dipromosikan setelah dibuktikan; jika
   ambigu, hentikan pemetaan itu dan minta keputusan user, jangan menyatukan,
   menggandakan atau membuang Table/Record. Simpan peta ID dan sumbernya.
3. **Shadow read/projection**: turunkan definisi Database dari graph v1 secara
   read-only; bandingkan section/tab, label, urutan, binding, tipe, jumlah/nilai
   Record, revision dan akses, termasuk konflik shared objects. Tidak ada dua
   jalur tulis atau sumber kebenaran yang saling bertentangan.
4. **Desain referensi revision lama**: record existing mempunyai FK ke workspace
   revision, bukan Database revision. Pertahankan seluruh immutable graph lama
   dan FK/decode path; tentukan pointer/translation versioned yang dapat dibuktikan
   untuk tiap `(workspace, table, old revision)`. Tidak memetakan semua record ke
   head baru atau hanya mengambil revision terkini. Cek old-schema codec dan
   operasi edit/additive; migrasi atau update record hanya dengan CAS dan bukti
   compatibility, bukan overwrite massal.
5. **Rehearsal cutover**: DDL incremental non-destruktif hanya setelah review,
   pada DB test/backup terpisah; integrity constraints, authorization,
   locking untuk schema & record, fail/rollback, idempotency, repeat-run dan
   concurrent writes perlu bukti PostgreSQL nyata. Tetapkan satu atomic boundary
   dan writer tunggal; jika tidak bisa menjamin, gunakan jendela read-only dan
   tolak writes selama cutover. Tidak ada dual-write tanpa protokol terbukti.
6. **Cutover terkontrol**: persetujuan eksplisit sebelum perubahan DB aplikasi,
   verifikasi jumlah, hash/nilai, ID, revision dan tampilan; fail closed bila
   mismatch. Pertahankan backup dan jalur pembacaan lama. Rollback teknis sebelum
   write baru harus teruji; setelah ada writes baru rollback butuh prosedur
   rekonsiliasi/forward recovery yang teruji agar tidak membuang data baru,
   bukan sekadar mengalihkan pointer ke versi lama. Jangan menghapus legacy
   sampai retensi dan pemulihan dibuktikan serta disetujui.

## 7. Tahapan implementasi dan acceptance gates

| Tahap | Hasil yang dapat digunakan | Gate sebelum lanjut |
| --- | --- | --- |
| A. Terminologi & kontrak | Istilah produk dan rancangan ini; inventaris implementasi | Review pengguna; tidak ada DDL atau klaim fitur baru |
| B. Database projection | Section/tab existing terbaca sebagai Database/Table, memakai graph v1 | Repeated templates, legacy/overlap/standalone, page ordering, IDs dan records tetap; ambigu tidak ditebak |
| C. Template authoring/preview | Definisi berversi dan pilihan Field utama/tambahan untuk tipe yang sudah ada | Resolver limits, validasi server, ID baru, rollback/idempotency, capability gate, UI/command parity |
| D. Per-Database canonical | Definisi/revisi Database logis dan dependensi graph, setelah migration design disetujui | Rehearsal, historical decode, FK, concurrency, permission, recovery dan cutover §6 |
| E. Field lifecycle | Sembunyikan view; kemudian delete dengan pemulihan dan perubahan tipe yang menolak data inkompatibel | Semua record/owners/shared binding diuji; no silent loss; native PG & conflict tests |
| F. Capability berikutnya | Tipe, relation, query, sync, import/export dan automation secara inkremental | Contract, keamanan dan bukti khusus setiap capability; lihat roadmap masing-masing |

Tiap tahap harus menghasilkan perjalanan user nyata serta tes terarah: PHP
compiler/compatibility, rendering dan Datastar, PHP native + PostgreSQL dalam
schema test, multi-session concurrency, authorization/denial, browser Chrome dan
Firefox, serta verifikasi Laragon jika menyentuh jalur aktif. Fixture dengan
stub authorizer bukan bukti authorization/RLS/HTTP. Perubahan production-facing
perlu rencana rollback dan dokumentasi batas hasil. Stage C dan D bisa dipecah
menjadi slices lebih kecil tanpa mengaktifkan capability yang belum terbukti.

## 8. Keputusan terbuka

- Apakah Table yang sama dapat secara eksplisit dirujuk beberapa Database,
  bagaimana perubahan dan permission lintas referensi bekerja?
- Bentuk penyimpanan snapshot/dependency pin dan boundary transaksi lintas
  Database/shared Field; apakah dan kapan head per Database mengganti workspace?
- Kontrak bagaimana referensi Table resolve ke canonical Data Source ID serta
  bagaimana binding schema milik Data Source dan preferensi per-Table-View
  diserialisasi, direvisi, dan divalidasi. Owner Field Binding sudah dipilih sebagai
  Data Source ID; bentuk JSON fisik, FK/constraint, dan versioning masih perlu
  review. Binding tidak membuat salinan nilai. Jika semantik berbeda per Data
  Source, Field Definition harus memiliki identitas/config eksplisit yang berbeda.
- Kebijakan lifecycle source Record dan Database saat masuk Trash, retention,
  restore permissions, serta UI untuk target yang tidak dapat diakses. Keputusan
  V1 sudah memblokir Trash target Record yang masih punya incoming edge dan
  permanent delete selama masih ada incoming/outgoing edge; tidak ada reverse
  Relation Field atau cascade implisit.
- Resolusi instance legacy yang overlapping/ambigu, termasuk urutan Page dan
  model standalone, setelah inventaris nyata; jangan mengasumsikan kepemilikan.
- Scope dan hak untuk membuat/mengedit Database, Table, template dan view;
  bagaimana extension instance berhubungan dengan Database—tanpa mengubah
  keputusan Owner-only pembuatan/penonaktifan extension.
- Default preferensi Table View saat schema binding/Field baru ditambahkan
  (misalnya visible atau hidden dan posisi awal), retensi, restore, serta UX
  konflik/conversion; JSON Schema version/validator detail.

## Rancangan lanjutan Relation dan storage

Lihat [Database dan Relation storage plan](DATABASE-RELATION-STORAGE-PLAN.md)
untuk rancangan edge lintas Database dalam satu Workspace, Lookup, Trash,
import/export, batas keamanan dan pilihan migrasi versus cleaning development.
Dokumen tersebut adalah usulan, belum menjalankan perubahan atau pembersihan DB.
