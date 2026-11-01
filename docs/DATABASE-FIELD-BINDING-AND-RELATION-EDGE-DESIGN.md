# Rancangan Teknis: Binding Kolom dan Edge Relasi Morph

**Status: target architecture untuk fresh database, bukan evolution dari skema lama.**
Tanggal: 2026-10-31. Melengkapi [TARGET-POSTGRESQL-SCHEMA.md](TARGET-POSTGRESQL-SCHEMA.md).

Data masih development, bukan produksi. Pendekatan yang diambil adalah **Fresh Database Architecture**: struktur database eksperimental lama tidak dianggap batasan desain. Kita bebas merancang ulang PostgreSQL schema berdasarkan Data Source, Table View, Record Identity, Field Definition, Relation Edge, dan Display Projection.

Struktur lama tetap diaudit sebagai referensi agar tidak kehilangan fitur yang relevan (Workspace, User, Membership, Extension, Session), tetapi tidak wajib mempertahankan struktur tabel lamanya. Tidak ada backward compatibility yang dipaksakan karena belum ada data riil yang perlu dipertahankan.

Semua fitur Morph (Roles, Permissions, Pages, Workspace, View, IDs, Modal Mechanism, Reorder, Layout, Pinned, dan lain-lain) memiliki tempat konfigurasi dan data tersimpan yang komprehensif di `TARGET-POSTGRESQL-SCHEMA.md`. Tidak ada fitur yang dibilang "tidak ada ruang config/data".

## 1. Intisari konsep yang disetujui

- Workspace berisi beberapa **Database logis** yang dibuat dari Template/Preset (PM, HR, CRM, ERP, dll.).
- Sama Template dapat direplikasi menjadi beberapa Database instance (misal PM × 2: Proyek RT/RW dan Proyek Konten Sosmed).
- Setiap Database instance memiliki **Table**; setiap Table memiliki **Kolom/Field**.
- Kolom dapat didefinisikan sekali dan dipakai berulang di banyak Table melalui **Pengaturan Kolom** (checklist aktif di tabel mana).
- Jika kolom adalah **linked/relation**, nilai yang tampil berasal dari **node Record sumber yang sama** (single source of truth).
- Mengubah nilai di satu tempat akan terlihat di semua tempat yang menampilkan Record sumber yang sama, asalkan kolom terkait aktif dan terhubung.
- Kolom biasa (bukan relation) memiliki nilai per Record; tidak ada otomatis-sinkron antar Record hanya karena nama kolom sama.

## 2. Objek inti dalam rancangan

| Objek | Tanggung jawab singkat |
|---|---|
| Database instance | Instance logis dari Template di Workspace. Bukan database PostgreSQL fisik baru. |
| Table View | Representasi presentasi data: konfigurasi kolom, urutan, visibilitas, filter, pengaturan tampilan. Bukan tabel fisik mandiri. |
| Data Source | Sumber data permanen (Employee, Project, Client, dst.). Satu Data Source dapat memiliki banyak Table View. |
| Field definition | Definisi kolom yang bisa digunakan ulang (nama, tipe, konfigurasi, pilihan). |
| Field binding | "Pengaturan Kolom": memasang field definition ke Table View tertentu, dengan posisi, visibilitas, dan label override. |
| Record | Baris data milik Data Source. Memiliki `record_id` immutabel dan `record_key` (bisnis identifier yang boleh berubah). |
| Relation edge | Link konkret dari Record sumber ke Record tujuan melalui field binding bertipe relation. Logical edge, bukan FK fisik tabel terpisah. |
| Lookup derivation | Membaca field pada Record tujuan melalui relation edge; read-only pada awalnya. |

### Prinsip arsitektur tambahan

1. **Pisahkan Data Identity, Relation, dan Table View.** Database/preset tidak boleh otomatis dianggap tabel fisik yang menyimpan data secara independen. Table View adalah representasi data dengan konfigurasi kolom, urutan, visibilitas, filter dan pengaturan lainnya. Satu Data Source dapat memiliki beberapa Table View. Contoh: PM - Project dapat direplikasi menjadi beberapa view dengan konfigurasi berbeda tanpa menggandakan record sumber.

2. **Gunakan immutable Record ID.** Linked Record harus menyimpan identitas permanen record tujuan (internal `record_id`), bukan hanya nilai teks atau business identifier seperti `HR-001`. Business identifier boleh berubah tanpa memutus relasi.

3. **Pisahkan Relation Binding dan Display Field.** Relation Binding menentukan record mana yang terhubung. Display Field menentukan satu field dari record tujuan yang direpresentasikan pada tabel asal. Pemilihan Display Field menggunakan radio button karena hanya satu field yang dipilih dalam konfigurasi dasar. Multi-field Projection dapat dikembangkan sebagai fitur terpisah.

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
- type: text (text, integer, boolean, select, relation, lookup, ...)
- config_json: jsonb (pilihan select, target table untuk relation, dll.)
- is_system: boolean
- created_by, created_at, updated_at
```

Definisi ini **tidak menyimpan nilai Record**. Ini hanya struktur dan pengaturan kolom yang dapat dipakai ulang.

### 3.6 Field binding — inti dari "Pengaturan Kolom"

Ini adalah fitur "magic" yang Anda sebut. Satu field definition dapat dipasang ke banyak Table.

```text
morph_field_bindings
- id: UUID / stabil
- workspace_id: text
- table_id: FK → morph_tables.id
- field_definition_id: FK → morph_field_definitions.id
- is_active: boolean (checklist aktif/tidak di tabel ini)
- position: int (urutan kolom dalam tabel)
- label_override: text (label tampilan boleh beda dari definisi asli)
- is_required: boolean
- is_readonly_ui: boolean
- created_by, created_at, updated_at
unique (workspace_id, table_id, field_definition_id)
```

Contoh:

```text
Field definition: Nama (type=text)
Binding 1: table = PM RT/RW → Proyek, is_active=true, position=1
Binding 2: table = PM Sosmed → Proyek, is_active=true, position=1
Binding 3: table = HR → Karyawan, is_active=false
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
- values_json: jsonb (nilai scalar per field binding, tidak menyimpan edge relation)
- version_token: text (optimistic concurrency)
- lifecycle: active | trash | deleted
- created_at, updated_at
```

Perbedaan penting:
- `id` (record_id): UUID immutabel, digunakan sebagai identitas relasi. Tidak pernah berubah.
- `record_key`: misal `HR-001`, identifier yang dapat dibaca dan diedit user. Relasi **tidak** menyimpan `record_key` sebagai identitas utama.

Nilai relation **tidak** disimpan dalam `values_json` sebagai dua sumber kebenaran. Relation disimpan di tabel edge terpisah.

### 3.8 Checklist vs Radio — perbedaan penting dalam UI "Pengaturan Kolom"

Dalam halaman pengaturan kolom, ada **dua jenis kontrol** yang tidak boleh dicampur:

**A. Checklist — di mana kolom muncul (bisa banyak)**

Digunakan untuk menentukan di Table mana suatu field definition ditampilkan. Satu field definition boleh aktif di lebih dari satu Table.

```text
Field: Nama
Aktifkan di tabel:
[✓] PM RT/RW → Proyek
[✓] PM Konten Sosmed → Proyek
[ ] HR → Karyawan
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

Alasan radio (hanya satu):

- Relasi memerlukan **satu node target yang jelas** sebagai representasi nilai.
- Jika boleh banyak, tidak akan jelas field mana yang ditampilkan saat record ditampilkan di tabel lain.
- Konsisten dengan konsep kunci unik: satu kolom linked merujuk ke satu field tujuan pada satu record sumber.

### 3.9 Linked Record vs Display Field — pemisahan identitas record dari representasi tampilan

Untuk tipe **linked/relation**, sistem harus memisahkan dua konsep yang sering dicampur:

**1. Linked Record — identitas record sumber yang direlasikan**

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

Untuk mendukung ini, relation config menyimpan referensi ke satu field label target dan identitas record:

```text
morph_relation_config
- field_binding_id: FK → morph_field_bindings.id
- target_data_source_id: FK → morph_data_sources.id
- target_record_id: UUID  ← identitas record tujuan (immutable), misal HR-001
- display_field_id: FK → morph_field_definitions.id  ← satu saja, radio
- created_at, updated_at
```

**Catatan:** Jika nantinya dibutuhkan beberapa nilai sekaligus (misal Nama dan Departemen), itu sebaiknya menjadi fitur terpisah bernama *Multi-field Projection*, bukan mengubah radio button menjadi checkbox secara diam-diam.

### 3.10 Relation edge — link record ke record (logical edge, bukan FK fisik)

Ini menjamin konsistensi nilai saat kolom linked ditampilkan di banyak tempat. Relasi direpresentasikan sebagai logical relation edge, bukan foreign key PostgreSQL konvensional ke tabel fisik yang berbeda-beda.

```text
morph_relation_edges
- id: UUID / stabil
- workspace_id: text
- source_data_source_id: FK → morph_data_sources.id
- source_record_id: UUID  ← record_id immutabel sumber
- source_field_id: FK → morph_field_bindings.id
- target_data_source_id: FK → morph_data_sources.id
- target_record_id: UUID  ← record_id immutabel tujuan
- cardinality: single | multi
- created_at, updated_at
```

Contoh dari infografik:

```text
Source: Data Source Proyek, Record P001, Field Binding "PIC" → relation ke Data Source Karyawan
Target: Data Source Karyawan, Record HR-001 (Nama: John)

Edge: P001.PIC → HR-001 (record_id immutabel)
```

Jika `HR-001` diubah nama menjadi `John Doe`, semua tabel yang punya edge ke `HR-001` melalui field binding "Nama" akan menampilkan `John Doe`.

### 3.11 Lookup definition (opsional, lanjutan)

```text
morph_lookup_definitions
- id: UUID / stabil
- workspace_id: text
- source_data_source_id: FK → morph_data_sources.id
- source_field_id: FK → morph_field_bindings.id
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

Desain tidak boleh mengunci sistem hanya pada satu pola relasi. Model data harus mendukung, setidaknya secara konseptual:

| Kardinalitas | Contoh |
|---|---|
| One-to-One | Satu karyawan memiliki satu profil |
| Many-to-One | Banyak proyek memiliki satu PIC |
| One-to-Many | Satu klien memiliki banyak proyek |
| Many-to-Many | Banyak karyawan terlibat dalam banyak proyek |

Ini tidak berarti semua harus diimplementasikan secara bersamaan, namun model data tidak boleh menghalangi pengembangan tersebut di masa depan.

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
Field definition: Nama
Binding 1: PM RT/RW → Proyek → kolom A (aktif)
Binding 2: PM Sosmed → Proyek → kolom A (aktif)

Record R1 (John) muncul di kedua tab karena keduanya menampilkan Record sumber yang sama
melalui relation edge ke record_id immutabel.
```

Jika `John` → `James`, keduanya menampilkan `James`. Record lain (Budi, Andi) tidak berubah karena mereka Record yang berbeda.

## 7. Keamanan dan otorisasi

- Membuat/edit relation edge membutuhkan izin pada Record sumber **dan** kemampuan menemukan/mereferensikan Record tujuan.
- Membaca nilai melalui lookup memeriksa izin pada Record tujuan **dan** field tujuan, bukan hanya sumber.
- Relation tidak otomatis memberi hak melihat record tujuan. Akses tetap mengikuti kebijakan creator, View/Comment, dan scope resource.
- Error, autocomplete, sorting, filter, dan export tidak boleh bocorkan keberadaan atau nilai record yang tersembunyi.
- Owner tidak punya bypass otomatis atas hak View/Comment yang dikonfigurasi creator.

## 8. Penghapusan, Trash, dan dampak edge

- Record masuk Trash dulu; edge tetap tersimpan tetapi tampilan ditangani (kosong/placeholder/tergantung kebijakan).
- Permanent delete Record memeriksa incoming/outgoing edges. Jika masih digunakan, tolak atau minta resolusi eksplisit (detach, ganti target, atau hapus edge bersamaan). Jangan cascade-delete tanpa konfirmasi.
- Database instance masuk Trash: semua Table dan Record dalamnya tidak aktif, edge tetap untuk audit.
- Kebijakan exact (detach vs null vs blokir) untuk target yang dihapus permanen masih perlu diputuskan sebelum implementasi.

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

1. Apakah satu Record boleh muncul secara fisik di banyak Table, atau hanya ditampilkan melalui edge/lookup dari satu canonical table?
2. Default cardinality relation: single-target atau multi-target?
3. Apa yang terjadi pada edge jika target Record di-Trash atau dihapus permanen?
4. Berapa lama masa penyimpanan Trash Database/Record?
5. Siapa yang boleh restore/delete permanen Database instance?

## 11. Acceptance gates (belum diimplementasi)

- Field definition dapat di-bind ke banyak Table; mencantumkan/menghapus centang tidak memutus nilai Record yang sudah ada.
- Relation edge mencegah target yang tidak ada, salah Workspace, atau salah Table.
- Edit Record sumber terlihat di semua tempat yang menampilkannya melalui field yang aktif.
- Kolom biasa tidak sinkron antar Record meski nama kolom sama.
- record_key dapat berubah tanpa memutus relasi (relasi pakai record_id immutabel).
- Auth test: tidak ada implicit Owner bypass; target record tersembunyi tidak bocorkan lewat autocomplete/error.
- Real PostgreSQL: concurrent create/relink/delete, rollback tidak setengah jalan, logical edge tidak meninggalkan edge yatim.

## 12. Langkah berikutnya yang disarankan

1. **Audit database terlebih dahulu.** Inventarisasi seluruh tabel, kolom, index, constraint dan data yang sudah ada di PostgreSQL Laragon (`morph_db`). Jangan melakukan DROP, TRUNCATE, reset database, atau migrasi destruktif.
2. Petakan skema aktual ke model konseptual yang baru (Data Source, Table View, Record, Relation Edge).
3. Identifikasi data yang berpotensi terdampak dan dokumentasikan strategi kompatibilitas serta rollback.
4. Buat migration versioned di fixture/database terisolasi sebelum menyentuh database aktual.
5. Implementasi slice kecil: field binding → record → relation edge → UI Pengaturan Kolom.
6. Setelah itu baru lanjut Trash, restore, dan export/import.

Belum ada SQL, migrasi, atau pembersihan yang dijalankan.
