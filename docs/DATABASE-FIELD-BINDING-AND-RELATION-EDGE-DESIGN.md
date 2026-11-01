# Rancangan Teknis: Binding Kolom dan Edge Relasi Morph

**Status: rancangan target untuk review; bukan persetujuan skema, DDL, atau migrasi.**
Diperbarui 2026-11-02. Melengkapi [TARGET-POSTGRESQL-SCHEMA.md](TARGET-POSTGRESQL-SCHEMA.md).

Arah desain adalah **Fresh Database Architecture**: struktur eksperimental lama tidak membatasi model target. Ini bukan izin untuk membuat, menghapus, atau mengubah skema database. Model Data Source, Table View, Record Identity, Field Definition, Relation Edge, dan Display Projection harus dikonsolidasikan serta direview sebelum DDL.

Struktur lama tetap diaudit sebagai referensi agar tidak kehilangan fitur yang relevan (Workspace, User, Membership, Extension, Session), tetapi tidak wajib mempertahankan struktur tabel lamanya. Tidak ada backward compatibility yang dipaksakan karena belum ada data riil yang perlu dipertahankan.

Semua fitur Morph (Roles, Permissions, Pages, Workspace, View, IDs, Modal Mechanism, Reorder, Layout, Pinned, dan lain-lain) memiliki tempat konfigurasi dan data tersimpan yang komprehensif di `TARGET-POSTGRESQL-SCHEMA.md`. Tidak ada fitur yang dibilang "tidak ada ruang config/data".

## 1. Intisari konsep yang disetujui

- Workspace berisi beberapa **Database logis** yang dibuat dari Template/Preset (PM, HR, CRM, ERP, dll.).
- Sama Template dapat direplikasi menjadi beberapa Database instance (misal PM × 2: Proyek RT/RW dan Proyek Konten Sosmed).
- Setiap Database instance memiliki **Table**; setiap Table memiliki **Kolom/Field**.
- Kolom dapat didefinisikan sekali dan dipakai berulang di banyak Table melalui **Pengaturan Kolom** (checklist aktif di tabel mana).
- Jika kolom adalah **linked/relation**, nilai yang tampil diproyeksikan dari **Record tujuan kanonis yang sama** (single source of truth).
- Mengubah nilai di satu tempat akan terlihat di semua tempat yang menampilkan Record sumber yang sama, asalkan kolom terkait aktif dan terhubung.
- Kolom biasa (bukan relation) memiliki nilai per Record; tidak ada otomatis-sinkron antar Record hanya karena nama kolom sama.

## 2. Objek inti dalam rancangan

| Objek | Tanggung jawab singkat |
|---|---|
| Database instance | Instance logis dari Template di Workspace. Bukan database PostgreSQL fisik baru. |
| Table View | Representasi presentasi data: konfigurasi kolom, urutan, visibilitas, filter, pengaturan tampilan. Bukan tabel fisik mandiri. |
| Data Source | Sumber data permanen (Employee, Project, Client, dst.). Satu Data Source dapat memiliki banyak Table View. |
| Field definition | Definisi kolom yang bisa digunakan ulang (nama, tipe, konfigurasi, pilihan). |
| Field binding | Mengaitkan Field Definition ke schema Table/Data Source; visibilitas, urutan, dan label tiap Table View diatur terpisah. |
| Record | Baris data milik Data Source. Memiliki `record_id` immutabel dan `record_key` (bisnis identifier yang boleh berubah). |
| Relation edge | Link konkret per source Record dan identitas Field Relation kanonis ke target Record immutable; tidak terikat ke binding presentation Table View. Logical edge, bukan FK fisik tabel terpisah. |
| Lookup derivation | Membaca field pada Record tujuan melalui relation edge; read-only pada awalnya. |

### Prinsip arsitektur tambahan

1. **Pisahkan Data Identity, Relation, dan Table View.** Database/preset tidak boleh otomatis dianggap tabel fisik yang menyimpan data secara independen. Table View adalah representasi data dengan konfigurasi kolom, urutan, visibilitas, filter dan pengaturan lainnya. Satu Data Source dapat memiliki beberapa Table View. Contoh: PM - Project dapat direplikasi menjadi beberapa view dengan konfigurasi berbeda tanpa menggandakan record sumber.

2. **Gunakan immutable Record ID.** Linked Record harus menyimpan identitas permanen record tujuan (internal `record_id`), bukan hanya nilai teks atau business identifier seperti `HR-001`. Business identifier boleh berubah tanpa memutus relasi.

3. **Pisahkan schema binding, Table View presentation, Relation edge, dan Display Field.** Schema binding menyatakan Field Definition tersedia pada Table/Data Source; Table View secara terpisah menentukan visibilitas, urutan, dan label. Relation config menentukan target Data Source serta tepat satu Display Field tujuan; setiap edge per Record menyimpan target Record yang sebenarnya. Tidak satu pun binding/presentation menjadi identitas nilai. Radio memilih Display Field, bukan Record tujuan maupun kardinalitas. Multi-field Projection dapat dikembangkan sebagai fitur terpisah.

4. **Jangan mengikat relasi pada nama atau instance Table View.** Relasi harus mengarah pada identitas Data Source dan Record. Dengan demikian, perubahan nama preset atau pembuatan duplikasi view tidak memutus relasi.

5. **Jangan mengasumsikan FK fisik PostgreSQL konvensional.** Karena user membuat field dan database secara dinamis, relasi direpresentasikan sebagai logical relation edge, bukan langsung sebagai foreign key PostgreSQL ke tabel fisik yang berbeda-beda.

## 3. Rancangan tabel (konseptual, belum DDL final)

### 3.1 Data Source — sumber data permanen

```text
morph_data_sources
- id: UUID / stabil
- workspace_id: text
- label: text (misal "Karyawan", "Proyek", "Klien")
- binding_key: text (kunci unik dalam workspace)
- lifecycle: active | trash | archived
- created_by, created_at, updated_at
```

Satu Data Source menyimpan data inti. Satu Data Source dapat ditampilkan oleh banyak Table View.

### 3.2 Table View — representasi presentasi

```text
morph_table_views
- id: UUID / stabil
- workspace_id: text
- data_source_id: FK → morph_data_sources.id
- label: text (misal "HR - Employee", "PM - Project", "PM - Project (Copy)")
- ordering: int
- is_active: boolean
- created_by, created_at, updated_at
```

Table View bukan tabel fisik mandiri. Ia adalah konfigurasi tampilan atas Data Source. Membuat salinan PM tidak otomatis menggandakan data Project; user hanya membuat variasi cara melihat dan mengelola data yang sama.

### 3.3 Database instance

```text
morph_database_instances
- id: UUID / stabil
- workspace_id: text
- template_id: text (sumber preset, boleh null untuk custom)
- label: text (misal "Proyek RT/RW", "Proyek Konten Sosmed")
- lifecycle: active | trash | archived
- head_revision: bigint (revisi definisi yang diterbitkan)
- created_by, created_at, updated_at
```

Satu Template dapat menghasilkan banyak instance. Setiap instance memiliki head revisi sendiri.

### 3.4 Table (grup kolom dalam Database instance)

```text
morph_tables
- id: UUID / stabil
- database_id: FK → morph_database_instances.id
- workspace_id: text (denormalisasi untuk kemudahan query dan isolasi)
- label: text (misal "Proyek", "Tugas", "Karyawan")
- binding_key: text (kunci unik dalam database instance)
- ordering: int
- is_active: boolean
```

Table tidak boleh dianggap milik eksklusif satu extension. Sharing harus eksplisit.

### 3.5 Field definition (definisi kolom yang bisa shared)

```text
morph_field_definitions
- id: UUID / stabil
- workspace_id: text
- label: text (misal "Nama", "PIC", "Usia", "Harga")
- type_id + type_version: identitas tipe dalam registry yang dapat diperluas
- config_json: jsonb (konfigurasi deklaratif yang divalidasi kontrak tipe)
- is_system: boolean
- created_by, created_at, updated_at
```

Definisi ini **tidak menyimpan nilai Record**. Ini menyimpan semantik dan konfigurasi kolom yang dapat dipakai ulang. Daftar tipe bukan enum tertutup: tipe hanya dijalankan bila modul tepercaya mendaftarkan kontrak/kapabilitasnya. JSON user tidak boleh membawa kode executable, nama class, SQL, atau JavaScript.

### 3.6 Field binding — inti dari "Pengaturan Kolom"

Ini adalah fitur "magic" yang Anda sebut. Keputusan pengguna: schema binding memasang Field Definition pada scope Table/Data Source, bukan pada setiap Table View. Binding schema menyatakan Field tersedia/aktif pada struktur data; Table View secara terpisah mengatur visibilitas, urutan, dan label. Mengganti/menambah view atau mengubah presentasinya tidak mengubah schema binding maupun membuat salinan nilai Record.

```text
morph_field_bindings (logical schema membership; not final DDL)
- id: UUID / stabil
- workspace_id: text
- table_id: FK → identitas Table/schema (bukan Table View)
- field_definition_id: FK → morph_field_definitions.id
- is_active: boolean (Field tersedia/aktif pada schema Table)
- is_required: boolean (validasi schema; scope final tetap direview)
- created_by, created_at, updated_at
unique (workspace_id, table_id, field_definition_id)
```

```text
Table View presentation config (logical; JSONB vs. table storage belum dipilih)
- table_view_id: FK → morph_table_views.id
- field_definition_id: Field yang sudah tersedia pada schema Table
- is_visible: boolean
- position: int (urutan di view ini)
- label_override: text (label khusus view)
```

**Keputusan pengguna:** binding adalah keanggotaan schema pada Table/Data Source, bukan Table View. Karena model fisik `morph_tables` versus `morph_data_sources` masih dikonsolidasikan dalam dokumen target, nama kolom FK final belum dipilih; namun FK schema binding tidak boleh mengarah ke `morph_table_views`. Preferensi tampilan per view (visibilitas, posisi, label) disimpan terpisah dan tidak mengubah nilai Field.

`is_required` adalah validasi schema, bukan sekadar kontrol tampilan. Jika nantinya ada flag UI read-only per view, flag itu tidak pernah menggantikan authorization server-side.

Contoh:

```text
Field definition: Nama (type=text)
Schema binding: Proyek, is_active=true
Table View PM RT/RW (Proyek): Nama visible, position=1
Table View PM Sosmed (Proyek): Nama visible, position=1
Table View HR (Karyawan): Nama is unavailable until schema-bound to Karyawan
```

### 3.7 Record (baris data) — Data Identity terpisah dari business identifier

```text
morph_records
- id: UUID / stabil (record_id, immutable, identitas permanen relasi)
- record_key: text (misal "HR-001", business identifier yang boleh berubah)
- workspace_id: text
- data_source_id: FK → morph_data_sources.id
- creator_id: text
- schema_revision: bigint (revisi definisi saat record dibuat/diupdate)
- request_id: text (idempotensi)
- values_json: jsonb (nilai scalar berdasarkan identitas Field kanonis, bukan ID binding Table View; edge Relation disimpan terpisah)
- version_token: text (optimistic concurrency)
- lifecycle: active | trash | deleted
- created_at, updated_at
```

Perbedaan penting:
- `id` (record_id): UUID immutabel, digunakan sebagai identitas relasi. Tidak pernah berubah.
- `record_key`: misal `HR-001`, identifier yang dapat dibaca dan diedit user. Relasi **tidak** menyimpan `record_key` sebagai identitas utama.

Nilai relation **tidak** disimpan dalam `values_json` sebagai dua sumber kebenaran. Relation disimpan di tabel edge terpisah.

**Keputusan identitas nilai kanonis V1 (bukan persetujuan DDL):** gunakan `field_definition_id` sebagai identitas properti kanonis. Nilai Record dikunci secara konseptual oleh `(record_id, field_definition_id)`, sehingga dua Table View untuk Record yang sama membaca nilai yang sama, sementara Record berbeda tetap memiliki nilai masing-masing. Relation edge memakai identitas sumber yang sama ditambah immutable `target_record_id`; binding Table View tidak menjadi key nilai. Field Definition yang dipakai ulang membawa semantik/config yang sama; perbedaan semantik per Data Source memerlukan identitas/config eksplisit yang berbeda.

Keputusan ini mengasumsikan satu Field Definition membawa semantik/config yang sama di semua tempat ia dipasang. Jika satu Data Source perlu konfigurasi semantik berbeda, buat identitas/config Field yang eksplisit dan berbeda—jangan menjadikannya nilai berbeda hanya karena Table View binding berbeda. Scope produk Field Binding sudah dipilih schema-level pada Table/Data Source, bukan Table View; pemetaan identitas fisik Table versus Data Source dan seluruh key/constraint tetap perlu review sebelum DDL.

### 3.8 Checklist vs Radio — perbedaan penting dalam UI "Pengaturan Kolom"

Dalam halaman pengaturan kolom, ada **dua jenis kontrol** yang tidak boleh dicampur:

**A. Checklist — di schema Table/Data Source mana Field tersedia (bisa banyak)**

Checklist ini menetapkan keanggotaan schema, bukan visibilitas kolom per Table View. Satu Field Definition boleh terikat pada beberapa Data Source/Table hanya jika semantik/config-nya sama; perbedaan semantik memerlukan identitas/config eksplisit yang berbeda. Table View yang membaca Data Source tersebut mengatur visibilitas, urutan, dan label secara terpisah.

```text
Field: Nama
Schema binding:
[✓] Proyek
[ ] Karyawan

Table View PM RT/RW (Proyek): Nama visible, position=1
Table View PM Konten Sosmed (Proyek): Nama hidden
```

**B. Radio — pilih satu field target untuk relation (hanya satu)**

Digunakan saat tipe field adalah **linked/relation**. Setelah memilih tabel tujuan (misal HR - Employee), pengguna harus memilih **satu field saja** yang akan menjadi label/tampilan dari relasi tersebut.

```text
Field: PIC | Tipe: Linked Record
Tabel tujuan: HR - Employee

Pilih satu field sebagai label:
[○] Nama
[○] Departemen
[○] Usia
[●] Nama ← dipilih satu
```

Radio memilih **Field yang diproyeksikan** dari tiap target Record, bukan Record tujuan dan bukan kardinalitas relasi. Untuk V1, setiap pasangan source Record + Relation Field boleh memiliki paling banyak satu target Record; keputusan single-target ini terpisah dari radio Display Field. Target yang sama boleh direferensikan oleh banyak source Record, jadi target tidak otomatis unik secara global.

### 3.9 Linked Record vs Display Field — pemisahan identitas record dari representasi tampilan

Untuk tipe **linked/relation**, sistem harus memisahkan dua konsep yang sering dicampur:

**1. Linked Record — identitas Record tujuan yang direlasikan**

Sistem menyimpan identitas record tujuan yang sesungguhnya (misal `HR-001` melalui `record_id` immutabel), bukan hanya nilainya yang ditampilkan. Relasi selalu mengarah ke record yang sama.

**2. Display Field — satu kolom yang nilainya ditampilkan**

Pengguna memilih **satu field** dari tabel tujuan yang nilainya akan ditampilkan di tabel asal (misal `Nama`). Ini adalah representasi visual, bukan identitas relasi.

Contoh konfigurasi kolom `PIC`:

```text
NAMA KOLOM
PIC

TIPE KOLOM
Linked Record

LINKED KE TABEL
HR - Employee

Pilih satu kolom sumber yang akan ditampilkan (radio):
[○] NIK
[●] Nama   ← display field
[○] Departemen
[○] Usia

RELASI DISIMPAN SEBAGAI
PIC → Data Source Karyawan → record_id HR-001  ← identitas record, tidak hanya "Nama"

TAMPILAN DI PM - PROJECT
PIC → HR - Employee → Nama
```

**Penting:**

- Relasi tetap mengarah ke record `HR-001` (via `record_id`), meski display field diganti dari `Nama` menjadi `Departemen`.
- Jika nama karyawan `HR-001` berubah dari `John` menjadi `John Doe`, semua tampilan yang menggunakan display field `Nama` ikut berubah.
- Jangan menyimpan hanya nilai `Nama` sebagai relasi. Tanpa identitas record, perubahan nama akan memutus relasi atau membuat data tidak konsisten.
- Jika `record_key` berubah (misal `HR-001` menjadi `HR-002`), relasi tetap utuh karena menyimpan `record_id` immutabel.

Konfigurasi Relation hanya menyimpan aturan skema yang berlaku lintas nilai Record. Ia tidak menyimpan target Record tertentu:

```text
morph_relation_config (model konseptual; bentuk penyimpanan belum dipilih)
- field_definition_id: FK/kunci ke identitas Field kanonis (bukan binding Table View)
- target_data_source_id: FK → morph_data_sources.id
- display_field_id: FK → identitas Field kanonis dalam Data Source tujuan (tepat satu; radio)
- cardinality_policy: `single` (V1; maksimal satu target per source Record/Field)
- created_at, updated_at
```

`cardinality_policy` menyatakan kontrak logis; contoh JSON `cardinality` dan model tabel ter-normalisasi adalah alternatif representasi, bukan dua sumber writable. Batas penyimpanan final belum dipilih.

`target_record_id` **tidak boleh berada di config Relation**: target Record berbeda untuk setiap nilai Record sumber dan hanya disimpan dalam Relation edge. Mengubah `display_field_id` hanya mengganti proyeksi; mengedit nilai target memperbarui tampilan proyeksi saat dibaca.

**Catatan:** Jika nantinya dibutuhkan beberapa nilai sekaligus (misal Nama dan Departemen), itu sebaiknya menjadi fitur terpisah bernama *Multi-field Projection*, bukan mengubah radio button menjadi checkbox secara diam-diam. Checklist schema binding menentukan di Data Source/Table mana Field tersedia; visibilitas, urutan, dan label di tiap Table View adalah preferensi presentation terpisah.

### 3.10 Relation edge — nilai link per Record (logical edge, bukan FK fisik)

Setiap edge mewakili nilai konkret dari Field Relation pada satu source Record ke satu target Record. Edge bukan konfigurasi tipe dan bukan konfigurasi tampilan. Bentuk relasional berikut adalah ilustrasi; constraint PostgreSQL final belum disetujui.

```text
morph_relation_edges
- id: UUID / stabil
- workspace_id: text
- source_data_source_id: FK → morph_data_sources.id
- source_record_id: UUID  ← record_id immutabel sumber
- source_field_id: `field_definition_id` kanonis untuk Field Relation (bukan ID binding view)
- target_data_source_id: FK → morph_data_sources.id (harus cocok dengan config Relation)
- target_record_id: UUID  ← record_id immutabel tujuan
- created_at, updated_at
```

Kardinalitas bukan properti setiap edge. Kontrak V1 `single` mengizinkan nol atau satu target per `(source_data_source_id, source_record_id, field_definition_id)` dan harus divalidasi secara atomik saat write; target Record yang sama boleh dipakai oleh pasangan source lain. V1 tidak membuat reverse Relation Field atau backlink UI; incoming edges tetap harus dihitung untuk integritas dan lifecycle. Bentuk constraint/transaksi PostgreSQL final belum disetujui. Multi-target dan posisi urutan merupakan ekstensi masa depan, bukan bagian dari V1.

Contoh dari infografik:

```text
Source: Data Source Proyek, Record P001, Field Relation "PIC" → Data Source Karyawan
Target: Data Source Karyawan, Record HR-001 (Nama: John)

Edge: P001.PIC → HR-001 (record_id immutabel)
```

Jika `HR-001` diubah namanya menjadi `John Doe`, setiap view yang mengizinkan dan menampilkan Relation itu memproyeksikan nilai terbaru dari target; tidak ada nama salinan yang tersimpan pada edge.

### 3.11 Lookup definition (opsional, lanjutan)

```text
morph_lookup_definitions
- id: UUID / stabil
- workspace_id: text
- source_data_source_id: FK → morph_data_sources.id
- source_field_id: `field_definition_id` kanonis sumber (bukan binding Table View)
- path: text (misal "PIC → Departemen")
- target_data_source_id: FK → morph_data_sources.id
- target_field_id: FK → morph_field_definitions.id
- label: text
```

Lookup read-only awalnya. Nilai dibaca dari Record tujuan, tidak disalin secara diam-diam.

## 4. Pengamanan Desain Sebelum Implementasi

Keempat hal berikut harus dipastikan sebelum implementasi DDL atau migration:

### 4.1 Integritas Logical Relation Edge

Walaupun menggunakan logical relation dan bukan foreign key fisik antartabel, integritas relasi tetap harus dipastikan:

- `source_record_id` benar-benar berasal dari `source_data_source_id` yang sesuai.
- `target_record_id` benar-benar milik `target_data_source_id`.
- Kedua record berada dalam workspace yang sama jika relasi dibatasi per workspace.
- Penghapusan record harus memiliki kebijakan yang jelas: restrict, cascade, atau soft delete. Tidak boleh ada edge yang menunjuk ke record yang sudah dihapus tanpa resolusi eksplisit.

### 4.2 Kardinalitas Relasi

**Kontrak V1:** satu source Record pada satu Relation Field memiliki nol atau satu target. Beberapa source Record boleh menunjuk ke target yang sama, sehingga pola many-to-one tersedia. V1 tidak menetapkan keunikan target lintas source Record, jadi ini bukan jaminan one-to-one. One-to-many dan many-to-many membutuhkan multi-target per source dan merupakan kemampuan masa depan; penyimpanan V1 tidak boleh menambahkan ordinal atau mengasumsikan bahwa kemampuan itu sudah aktif.

| Pola | Status V1 | Catatan |
|---|---|---|
| Many-to-One | Didukung secara semantik | Banyak source dapat menunjuk target yang sama; maksimal satu target pada setiap source Record/Field. |
| One-to-One | Tidak dijamin | Memerlukan constraint unik lintas source yang belum diputuskan. |
| One-to-Many | Masa depan | Memerlukan lebih dari satu target pada satu source Record/Field. |
| Many-to-Many | Masa depan | Memerlukan multi-target per source dan aturan tambahan. |

### 4.3 Display Field Independence

Perubahan Display Field tidak boleh mengubah atau membuat ulang identitas relasi. Display Field hanya menentukan representasi nilai dari record yang sudah terhubung.

Contoh:

```text
PM.Project.PIC
    └── Relation → HR.Employee.HR-001 (record_id immutabel)
                         │
                         ├── Display: Nama
                         ├── Display: Departemen
                         └── Display: Usia
```

Jika Display Field diganti dari `Nama` menjadi `Departemen`, yang berubah hanya representasi datanya. Identitas relasi tetap sama (`HR-001`).

### 4.4 Audit Deliverables Sebelum DDL

Sebelum membuat DDL atau migration, harus menghasilkan dokumen berikut:

1. **Database Inventory** — inventarisasi seluruh tabel, kolom, index, constraint, dan data yang sudah ada di PostgreSQL.
2. **Existing Schema Map** — pemetaan skema aktual terhadap struktur yang ada.
3. **Existing Data Model** — dokumentasi model data yang sudah digunakan.
4. **Proposed V1 Mapping** — pemetaan skema eksisting ke model konseptual baru (Data Source, Table View, Record, Relation Edge).
5. **Migration Impact Analysis** — identifikasi data yang berpotensi terdampak oleh perubahan.
6. **Migration & Rollback Strategy** — strategi kompatibilitas dan pemulihan jika sesuatu gagal.

**Perhatian:** Jangan melakukan perubahan terhadap database produksi atau database Laragon yang sudah ada selama tahap audit. Verifikasi nama database aktual dari konfigurasi aplikasi dan PostgreSQL, bukan diasumsikan (misal `morph-db` vs `morph_db`).

## 5. Alur konsistensi nilai (single source of truth)

```text
Pengguna edit Record HR-001 Nama = John → James
    │
    ▼
Periksa izin edit pada Record HR-001 dan field Nama
    │
    ▼
Update morph_records (record_id HR-001) values_json
    │
    ▼
Semua relation edge yang target_record_id = HR-001
    otomatis menampilkan James saat dibaca dari PM RT/RW atau PM Sosmed
```

Aturan penting:

1. **Nama kolom sama ≠ data sama.** Hanya jika ada relation edge yang eksplisit, nilai akan sinkron.
2. **Record yang sama muncul di banyak tempat** melalui edge, bukan duplikasi baris.
3. **Edit nilai** dilakukan pada Record sumber. Mengubah pilihan relation (misal PIC dari John ke Budi) mengubah edge, bukan data John atau Budi.
4. **Field biasa (bukan relation)** tidak ikut sinkron. Setiap Record punya nilai sendiri di `values_json`.
5. **record_key boleh berubah** tanpa memutus relasi, karena relasi menyimpan `record_id` immutabel.

## 6. Contoh skenario dari infografik

### Skenario 1: PIC dan Client adalah linked record

```text
PM - Project (RT/RW)
Row P001: PIC = John (edge ke record_id HR-001), Client = Acme Corp (edge ke record_id CRM-C001)

Data Source Karyawan
Row HR-001: Nama = John, Departemen = IT, Usia = 28

Data Source Klien
Row CRM-C001: Nama Client = Acme Corp, Industri = Technology, Kota = Jakarta
```

Jika `John` diubah menjadi `John Doe` di Data Source Karyawan:
- Tampilan di PM - Project (RT/RW) dan PM - Project (Konten Sosmed) yang sama-sama edge ke `HR-001` akan menunjukkan `John Doe`.

### Skenario 2: Kolom Nama dipakai di dua Table View PM yang berbeda

```text
Field Definition: Nama
Schema binding: Data Source Proyek (aktif)
Table View PM RT/RW (Proyek): Nama visible, position=1
Table View PM Sosmed (Proyek): Nama visible, position=2

Record R1 (John) muncul di kedua view karena keduanya membaca Record yang sama dari
Data Source Proyek; Table View tidak membuat salinan nilai.
```

Jika `John` → `James`, keduanya menampilkan `James`. Record lain (Budi, Andi) tidak berubah karena mereka Record yang berbeda.

## 7. Keamanan dan otorisasi

- Membuat/edit relation edge membutuhkan izin pada Record sumber **dan** kemampuan menemukan/mereferensikan Record tujuan.
- Membaca nilai melalui lookup memeriksa izin pada Record tujuan **dan** field tujuan, bukan hanya sumber.
- Relation tidak otomatis memberi hak melihat record tujuan. Akses tetap mengikuti kebijakan creator, View/Comment, dan scope resource.
- Error, autocomplete, sorting, filter, dan export tidak boleh bocorkan keberadaan atau nilai record yang tersembunyi.
- Owner tidak punya bypass otomatis atas hak View/Comment yang dikonfigurasi creator.

## 8. Penghapusan, Trash, dan dampak edge

- Target Record yang masih memiliki incoming Relation edge tidak boleh dipindahkan ke Trash. Pengguna harus secara eksplisit melepas atau mengganti semua incoming link terlebih dahulu; pemeriksaan dan perubahan lifecycle harus atomik. Relation baru juga tidak boleh memilih target yang sudah di-Trash.
- Permanent delete Record diblokir selama masih ada incoming atau outgoing edge. Pengguna harus menyelesaikan link secara eksplisit sebelum penghapusan; tidak ada cascade otomatis ke source Record maupun edge.
- Aturan di atas menetapkan lifecycle target Record dan permanent delete. Kebijakan untuk source Record yang memiliki outgoing edge saat di-Trash, serta dampak Trash pada seluruh Database yang berisi target linked, masih perlu diputuskan.
- Database instance masuk Trash adalah lifecycle terpisah; jangan menyimpulkan bahwa Record di dalamnya boleh di-Trash bila ada incoming link. Restore harus memeriksa izin dan konflik tanpa membuka izin baru.

## 9. Pengaturan Kolom ("magic") dalam UI

Halaman pengaturan field harus menampilkan:

```text
Field: Nama | Tipe: Text
Aktifkan di tabel:
[✓] PM RT/RW → Proyek (posisi 1)
[✓] PM Konten Sosmed → Proyek (posisi 1)
[ ] HR → Karyawan
[ ] CRM → Klien
```

Jika tipe relation:

```text
Field: PIC | Tipe: Linked Record
Target Tabel: HR → Karyawan
Label pilihan: Nama
```

Perubahan nama/pengaturan field definition harus dilakukan hati-hati jika binding sudah aktif di banyak tabel. Perubahan tipe harus ditolak jika ada nilai record yang tidak kompatibel.

## 10. Pertanyaan produk tersisa

1. Apakah satu Record boleh muncul secara fisik di banyak Table, atau hanya ditampilkan melalui edge/lookup dari satu canonical Data Source?
2. Bagaimana lifecycle source Record dengan outgoing edges saat di-Trash, dan bagaimana Trash/restore Database menangani Records yang menjadi target Relation?
3. Berapa lama masa penyimpanan Trash Database/Record?
4. Siapa yang boleh restore atau menghapus permanen Record/Database?
5. Bagaimana UI menampilkan target yang tidak dapat diakses tanpa membocorkan keberadaan atau nilainya?

Keputusan binding adalah schema-level pada Table/Data Source; Table View hanya mengatur visibilitas, urutan, dan label. Field Definition yang dipakai ulang memiliki semantik/config yang sama dan nilai V1 dikunci oleh `field_definition_id`. Jika semantik/config berbeda per Data Source, gunakan identitas/config eksplisit yang berbeda; jangan mengubah arti sebuah Field hanya melalui Table View.

## 11. Acceptance gates (belum diimplementasi)

- Field Definition dapat di-bind pada schema Table/Data Source; perubahan visibilitas, urutan, atau label per Table View tidak mengubah schema binding maupun nilai Record. Melepas binding schema yang masih memiliki nilai memerlukan kebijakan eksplisit, bukan penghapusan diam-diam.
- Relation edge mencegah target yang tidak ada, salah Workspace, atau salah Table.
- Edit Record sumber terlihat di semua tempat yang menampilkannya melalui field yang aktif.
- Kolom biasa tidak sinkron antar Record meski nama kolom sama.
- record_key dapat berubah tanpa memutus relasi (relasi pakai record_id immutabel).
- Auth test: tidak ada implicit Owner bypass; target record tersembunyi tidak bocorkan lewat autocomplete/error.
- Real PostgreSQL: target dengan incoming edge tidak boleh di-Trash; permanent delete ditolak selama masih ada incoming/outgoing edge; tidak ada cascade implisit. Uji concurrent create/relink/lifecycle, rollback, dan pastikan tidak ada edge yatim.

## 12. Langkah berikutnya yang disarankan

1. Konsolidasikan identitas Field/Record, nilai Field (`field_definition_id`), schema binding Table/Data Source, Table View presentation, Relation config (`single`), edge, serta lifecycle yang masih terbuka; selesaikan pertanyaan tersisa §10 sebelum merancang DDL.
2. **Audit database hanya setelah identitas target dan cakupan read-only disetujui.** Konfigurasi Windows yang tercatat di `LOCAL-DEVELOPMENT.md` adalah PostgreSQL 18 pada `127.0.0.1:5433`, database `morph_03`; jangan menebak database/port, jangan menyentuh `morph-01`, dan jangan menjalankan audit/DDL dari sandbox ini terhadap database lokal developer.
3. Setelah ada persetujuan audit, inventarisasikan tabel, kolom, index, constraint, dan data; petakan ke model Data Source, Table View, Record, Field, dan Relation Edge tanpa DROP/TRUNCATE/reset.
4. Dokumentasikan impact, strategi kompatibilitas, recovery, dan rollback; rehearse pada database/fixture terisolasi.
5. Implementasikan slice kecil hanya setelah kontrak dan least-privilege plan untuk role runtime `morph03_app` direview; jangan gunakan `morph03_admin` di PHP. Uji integritas edge, akses target, concurrency dan rollback di PostgreSQL nyata.

Belum ada SQL, migrasi, audit database, atau pembersihan yang dijalankan dalam pekerjaan ini.
