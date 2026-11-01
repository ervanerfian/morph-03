# Standar Kerja Developer Lokal dan AI Agent

**Versi:** 1.0 · **Tanggal:** 2026-10-29  
**Tujuan:** prosedur kerja yang dapat direproduksi, ditinjau, dan dibandingkan antara
mesin developer, workspace AI agent, dan CI—tanpa mengharuskan lingkungan identik
atau mengganti arsitektur aplikasi.

Dokumen ini **mandiri dan netral terhadap stack**. Dapat disalin ke proyek Morph
Space maupun proyek lain. PHP, Node.js/npm, Vitest, Playwright, Oxlint, Oxfmt,
Docker, dan layanan CI bukan persyaratan universal. Gunakan alat yang relevan
dengan proyek; prinsip bukti dan keselamatannya tetap sama.

Kata **WAJIB** menyatakan syarat penerimaan. **SEBAIKNYA** adalah rekomendasi yang
boleh disimpangi dengan alasan terdokumentasi. Mengadopsi dokumen ini bukan bukti
bahwa runner, pengujian, atau CI yang disebut di dalamnya sudah tersedia.

## 1. Prinsip dasar

1. **Repository adalah sumber bersama**, bukan filesystem yang tersinkron otomatis.
   Perubahan lokal baru tersedia bagi pihak lain setelah dibagikan secara eksplisit.
2. **Arsitektur produksi dan tooling development berbeda.** Memasang package manager
   atau browser automation tidak mewajibkan framework frontend, bundler, container,
   atau proses build produksi baru.
3. **Klaim harus mengikuti bukti.** Membaca kode, menjalankan fixture, dan menguji
   aplikasi melalui HTTP nyata adalah tingkat bukti yang berbeda.
4. **Hasil gagal tidak boleh disulap menjadi lulus.** Known failure bukan izin
   mengabaikan kegagalan atau menurunkan assertion.
5. **AI agent bukan sumber kebenaran tunggal.** Developer harus dapat memeriksa diff,
   mengulang prosedur, dan mengevaluasi keterbatasan hasilnya.
6. **Keselamatan data lebih penting daripada kemudahan diagnosis.** Jangan meminta,
   menampilkan, menyimpan, atau mengunggah kredensial produksi sebagai bukti test.

## 2. Tiga lapisan yang harus dipisahkan

| Lapisan | Isi | Aturan |
| --- | --- | --- |
| Aplikasi | Runtime server, frontend, database, autentikasi, deployment | Perubahan hanya sesuai kebutuhan produk dan persetujuan scope. |
| Tooling | Package manager, test runner, lint, formatter, browser automation | Utamakan alat yang sudah ada; dependency dan setup harus dapat direproduksi. |
| Execution environment | OS, runtime/binary, library sistem, browser, web server, layanan eksternal | Catat konfigurasi aktual; jangan menganggap mesin lain identik. |

Contoh: aplikasi PHP + native ES Modules dapat memakai npm untuk alat developer
saja. Aplikasi Python atau Go dapat memakai tooling native-nya tanpa npm. CI
adalah lokasi eksekusi lain, bukan bukti otomatis bahwa tes lebih lengkap.

## 3. Tingkat kesetaraan lingkungan

| Tingkat | Yang disamakan/diketahui | Bukti minimum |
| --- | --- | --- |
| **Tooling parity** | Source, lockfile, definisi suite, kontrak, konfigurasi runner | Revision/dirty state, dependency terkunci, instruksi setup dan profil. |
| **Execution parity** | Tes yang sama dijalankan dengan konfigurasi yang diketahui | Report aktual dari masing-masing lingkungan, versi runtime/browser, override dan hasil. |
| **Application integration parity** | Alur relevan melalui komponen nyata | Bukti HTTP/session/SSE/database atau integrasi lain sesuai aplikasi, dengan batas mocking jelas. |

Kesetaraan tidak berarti semua binary harus identik. Bila versi berbeda, nyatakan
perbedaannya dan batas perbandingan. Untuk investigasi bug sensitif versi,
SEBAIKNYA samakan versi terlebih dahulu.

Lockfile tidak otomatis mengunci versi PHP/Python/Node, browser override, library
OS, konfigurasi web server, atau database. Browser yang dibundel tool dan browser
sistem juga dapat berbeda. Catat yang **benar-benar dipakai**, bukan hanya yang
terpasang. Runtime native, WASM, dan container tidak boleh dianggap ekuivalen tanpa
bukti. Hasil yang cocok hanya membuktikan konsistensi pada skenario yang dijalankan.

## 4. Kontrak awal setiap proyek

Sebelum mengubah kode, developer dan agent WAJIB menyepakati:

- Tujuan produk, acceptance criteria, scope serta hal yang tidak boleh diubah.
- Arsitektur/deployment yang dipertahankan; dependency produksi vs development.
- Repository, branch kerja, pemilik perubahan, serta aturan commit/push/review.
- Apakah PR harus tetap terbuka; siapa yang berwenang merge/close/release.
- Runtime minimum dan lingkungan target yang relevan.
- Perintah setup, suite wajib/opsional, fixture, dan lokasi report.
- Kebijakan secret, data test, jaringan, penyimpanan artifact dan retensi.
- Baseline aktual: lulus/gagal/belum tersedia, bukan baseline yang diasumsikan.

Jangan mengasumsikan akses jaringan, PHP native, database, browser, atau privilege
instalasi tersedia di workspace agent. Keterbatasan harus dilaporkan, bukan ditutupi
melalui perubahan aplikasi atau dependency yang tidak relevan.

## 5. Sinkronisasi Git dan kolaborasi

### 5.1 Sebelum mengambil perubahan

1. Periksa branch aktif dan working tree: `git branch --show-current` serta
   `git status --short`.
2. Pastikan branch aktif sesuai kontrak. `git pull origin <branch>` sendiri tidak
   mengganti branch aktif dan bisa memasukkan perubahan ke branch yang salah.
3. Jika ada edit lokal, simpan sesuai kebijakan: commit yang direview atau stash
   termasuk file untracked yang diperlukan. Beri nama/deskripsi yang jelas.
4. Jangan mengunggah log autentikasi, dump database, `.env`, atau cookie. Stash
   adalah simpanan lokal, bukan backup tersanitasi; isinya bisa tetap sensitif.
5. Setelah bersih, gunakan fetch lalu pull fast-forward-only bila itu kebijakan proyek.

Contoh berikut memakai **placeholder**, bukan nama branch yang harus disalin literal:

```text
git fetch origin
git pull --ff-only origin <branch-kerja-yang-disepakati>
git status --short
```

Jika fast-forward ditolak, berhenti dan periksa divergensi. Jangan otomatis
`reset --hard`, force-push, mengganti branch, atau menghapus pekerjaan pengguna.
Penerapan stash kembali adalah tindakan terpisah yang harus disengaja; jangan
mengasumsikan stash boleh di-pop atau dihapus setelah pull.

### 5.2 Saat dua pihak menulis kode

- SEBAIKNYA bergantian pada branch bersama atau membagi ownership file/scope.
- Sebelum push, periksa apakah remote telah berubah dan integrasikan sesuai
  kebijakan; jangan menimpa commit pihak lain.
- Push hanya branch yang disepakati. PR terbuka tidak menghalangi commit tambahan;
  PR ikut diperbarui setelah push ke source branch-nya.
- Merge/close/release memerlukan kewenangan eksplisit. Jangan menganggap test
  lulus atau permintaan perbaikan sebagai persetujuan merge.
- `.gitignore` hanya menahan file yang belum dilacak; bukan penghapus file tracked,
  sanitizer log, atau pembersih histori Git.

### 5.3 Kontinuitas sesi

Sesi AI tidak dijamin tersedia selamanya. Jangan menjadikan memori chat satu-satunya
catatan keputusan. Simpan status kerja, bukti, risiko, dan langkah berikutnya dalam
dokumentasi repository. Kode yang belum dipush tidak otomatis tersedia bagi mesin
lain; stash dan artifact lokal juga tidak ikut push biasa.

## 6. Setup yang dapat direproduksi

1. Gunakan dependency manifest dan lockfile yang direview; instalasi deterministik
   sesuai ekosistem, misalnya `npm ci` bila proyek memakai npm.
2. Pin alat kritis sesuai kebijakan; hindari mengambil versi terbaru secara diam-diam
   melalui launcher yang mengunduh paket ketika dependency lokal tidak tersedia.
3. Dokumentasikan instalasi browser dan library OS secara terpisah. Instalasi paket
   test tidak selalu memasang browser executable.
4. Catat override executable/runtime. Nilai adapter berasal dari konfigurasi operator,
   bukan hardcoded path cache, username, atau identitas platform agent.
5. Pisahkan core aplikasi dari adapter lingkungan pengujian.
6. Verifikasi setup bersih di lingkungan target sebelum mengklaim dukungan lintas OS.

Untuk runner berbasis Node, contoh praktik portable adalah `process.execPath`,
array argumen, cwd eksplisit, dan `shell:false`. Ekosistem lain memakai padanan
aman. Hindari ketergantungan shell tertentu, konkatenasi command dari input, dan
quoting yang rusak pada path berspasi. Timeout, status child, dan cleanup harus
jelas. Timeout proses induk tidak otomatis menjamin semua descendant dibersihkan.

## 7. Tingkat bukti pengujian

| Label | Yang benar-benar dibuktikan | Batas klaim |
| --- | --- | --- |
| Review/source-contract | Struktur/source atau pola tertentu | Tidak membuktikan perilaku pengguna. Review manual bukan test yang dieksekusi. |
| Unit | Aturan/fungsi terisolasi | Tidak otomatis membuktikan integrasi. |
| Fixture-integration | Beberapa komponen dengan dependency/data terkontrol | Session in-process bukan cookie HTTP nyata. |
| Browser-fixture | DOM/browser aktual dengan markup/transport/data sebagian fixture | Browser automation bukan otomatis aplikasi E2E. |
| HTTP-integration | Server HTTP, request/response dan cookie jar aktual | Sebut driver/mocking yang masih tersisa. |
| Browser-E2E | Browser ke aplikasi HTTP nyata untuk alur yang disebutkan | Jangan mock endpoint yang justru hendak dibuktikan. |
| Database-integration | Database/driver/role/transaksi nyata | Driver JSON atau in-memory bukan bukti PostgreSQL/RLS. |

Sebut label per skenario bila satu suite mencampur level bukti. Nama alat tidak
menentukan levelnya: Playwright dapat menjalankan fixture maupun E2E; test runner
unit juga dapat mengorkestrasi integrasi. Empat script bukan empat assertion.
Viewport mobile bukan perangkat fisik; Chromium bukan bukti Firefox/WebKit.

## 8. Profil, kelengkapan, dan exit code

Setiap profil WAJIB mendeklarasikan suite wajib sebelum eksekusi. Contoh profil
adalah `unit`, `fixture`, `browser`, `http`, `database`, dan `full`; nama serta isi
profil mengikuti kebutuhan proyek, bukan wajib menyalin daftar ini.

- Profil subset hanya boleh PASS untuk scope-nya sendiri.
- `full` adalah seluruh scope wajib yang disepakati, bukan "semua yang kebetulan
  bisa dijalankan pada mesin ini".
- Suite wajib yang belum tersedia tetap tercatat, tidak hilang dari inventaris.
- Proyek tanpa database boleh menyatakan database tidak berlaku melalui keputusan
  scope terdokumentasi, bukan menghilangkannya diam-diam setelah test gagal.

| Status | Arti |
| --- | --- |
| `PASS` | Pemeriksaan dijalankan dan syarat lulus terpenuhi. |
| `FAIL` | Assertion, child process, timeout eksekusi, atau validasi hasil gagal. |
| `BLOCKED` | Prasyarat tidak tersedia; pemeriksaan belum dapat dijalankan. |
| `SKIP` | Sengaja tidak dijalankan; cantumkan alasan dan apakah scope wajib. |
| `NOT_IMPLEMENTED` | Suite yang diwajibkan kontrak belum diimplementasikan. |

**Gate tidak boleh PASS bila suite wajib FAIL/BLOCKED/SKIP/NOT_IMPLEMENTED.** Skip
suite opsional yang disepakati tidak harus menggagalkan gate, tetapi tetap dicatat.

Contoh konvensi runner: exit **0** semua kewajiban PASS; **1** ada FAIL; **2**
incomplete tanpa FAIL. Ini contoh, bukan standar exit universal semua tool.
Normalisasikan status tanpa membuang actual exit/signal child. Exit null karena
suite tidak berjalan harus dibedakan dari exit probe prasyarat yang gagal.

Jangan menutupi exit dengan pipe, pencetak log, atau command berikutnya. Tangkap
`$LASTEXITCODE` segera pada PowerShell atau `$?` pada POSIX. Beberapa wrapper dapat
mengeluarkan fatal tetapi exit 0; gunakan protokol hasil/marker yang tervalidasi,
bukan sekadar mencari kata PASS di output arbitrer. Pending/todo harus tercatat;
tidak ada assertion yang dijalankan bukan bukti lulus.

## 9. Baseline gagal dan perubahan assertion

1. Jalankan baseline sebelum mengubah irisan yang relevan.
2. Beri ID kegagalan stabil; catat kontrak produk, owner implementasi aktif,
   penyebab yang diketahui, gap bukti, dan usulan tindakan.
3. Pisahkan bug aplikasi, assertion mekanisme lama, masalah environment, dan
   penyebab yang belum diketahui. Jangan menebak klasifikasi demi gate hijau.
4. Perbaiki perilaku yang masih diperlukan. Untuk assertion lama, tulis pengganti
   yang menjalankan owner aktif dan membuktikan kebutuhan produk.
5. Uji negative case: pengganti harus dapat gagal ketika perilaku relevan rusak,
   tanpa meninggalkan mutasi pada working tree.
6. Baru pensiunkan assertion lama setelah review, dengan alasan dan tautan bukti.
7. Jalankan kembali tes terfokus **dan** suite penuh yang relevan.

Mapping known failure hanya untuk diagnosis, bukan allowlist kelulusan. Fingerprint
nama/path dapat berubah ketika test diubah; review mapping tersebut. Nol kegagalan
baru tidak berarti baseline sudah selesai, perilaku identik, atau coverage lengkap.
Jangan menghidupkan renderer/state duplikat hanya untuk memuaskan regex lama.

## 10. Laporan aman dan dapat dibandingkan

Report WAJIB memuat, sejauh relevan:

- Schema version, run ID, timestamp/durasi, profil dan inventaris scope wajib.
- Revision/branch/dirty state; jelaskan perubahan yang ikut diuji bila dirty.
  Dirty boolean saja bukan snapshot yang dapat direproduksi; simpan patch aman
  atau referensi perubahan yang direview jika dibutuhkan untuk reproduksi.
- Hash lockfile, versi runtime/tool/browser aktual, OS/arsitektur dan label runtime.
- Command atau template reproduksi aman, cwd logis dan nama override yang digunakan.
  Jika path disamarkan, jelaskan cara operator memulihkan konfigurasinya secara lokal.
- Status per suite, actual exit/signal, reason code, jumlah **beserta unitnya**,
  label bukti, mocking, dan keterbatasan.
- Referensi baseline, kegagalan dikenal/baru yang belum diklasifikasi, serta
  kelengkapan gate. Jangan menjumlah checks, tests, dan scripts sebagai satu metrik.

**Jangan persistensikan** password, token, cookie/session ID, Authorization,
`.env`, DSN ber-password, data pribadi/tenant, dump auth/BOOT, atau raw assertion
source yang memuat data sensitif. Utamakan field allowlist dan ID kegagalan, bukan
menyimpan output penuh lalu mencoba menghapus secret dengan regex.

Raw report sementara harus berizin terbatas dan dibersihkan pada finally. Hard
kill/crash dapat menyisakannya: dokumentasikan cleanup dan retensi. Artifact aman
juga punya retensi; jangan otomatis commit/push log. Report bukan security sandbox:
child mungkin mewarisi environment dan akses jaringan. Jangan menyediakan secret
produksi untuk kode PR/dependency yang tidak dipercaya.

### Cara membandingkan dua run

Periksa berurutan: source/dirty patch → hash lockfile → profil/inventaris → versi
dan override → label bukti/mocking → hasil/ID kegagalan. Hasil sama dengan source
atau scope berbeda bukan perbandingan setara. Nyatakan "belum diverifikasi" bila
hanya menerima laporan pihak lain, bukan menjalankannya sendiri.

## 11. Keamanan integrasi dan UI diagnostik

- Gunakan data sementara/database test terpisah, akun minimum privilege, dan cleanup
  di finally. Jangan seed, purge, reset, atau menguji destruktif pada data produksi.
- Permission ditentukan server, bukan header debug, query parameter, badge UI,
  flag browser, atau kelulusan test sebelumnya.
- Jangan menyediakan endpoint publik yang mengeksekusi shell/test runner atau
  membuka artifact filesystem arbitrer. Bila report viewer diperlukan, gunakan
  artifact tersanitasi, kontrol akses, provenance dan status kedaluwarsa yang jelas.
- Pisahkan diagnostik runtime dari hasil test developer. Snapshot harus diberi
  waktu/konteks render; jangan menampilkan loading permanen atau tombol mati.
- Jangan tampilkan session ID, cookie, header, atau dump user untuk "membantu debug".
  Endpoint debug default tertutup; akses diagnostik tambahan memerlukan desain
  eksplisit, otorisasi dan payload minimum, bukan hanya menyembunyikan panel.
- Untuk auth multitab: perubahan shared cookie bukan bukti sesi lama dibatalkan.
  Uji ulang cookie lama yang ditangkap sebelum logout secara terpisah dari
  notifikasi UI, channel hilang, tab beku, history/bfcache dan respons/SSE stale.
- Jika memakai PostgreSQL RLS, uji lintas tenant dengan role non-superuser dan
  non-bypass, policy aktif serta transaksi/context yang representatif. Gunakan
  padanan kontrol keamanan nyata untuk database lain.

## 12. Siklus kerja satu perubahan

```text
Sepakati scope dan kontrak
  → Periksa branch, working tree, lingkungan dan izin
  → Sinkronkan tanpa menimpa pekerjaan
  → Jalankan baseline relevan
  → Ubah satu irisan kecil
  → Jalankan tes terfokus + suite penuh relevan
  → Periksa diff, cleanup, artifact dan secret
  → Laporkan bukti serta keterbatasan
  → Commit/push sesuai kewenangan
  → Review; merge/release hanya dengan persetujuan
```

Jika prasyarat tidak tersedia, laporkan BLOCKED dan langkah reproduksi untuk
operator. Jangan mengklaim telah menjalankan tes local pengguna. Jangan mengganti
semua dependency/data nyata dengan mock lalu tetap mengklaim E2E.

## 13. Definition of Done dan handoff

Sebuah irisan selesai ketika:

- [ ] Acceptance criteria terpenuhi, diff terbatas dan arsitektur terjaga.
- [ ] Baseline serta hasil setelah perubahan dicatat dengan tingkat bukti yang tepat.
- [ ] Regresi relevan diuji; kegagalan baru diklasifikasi, bukan disembunyikan.
- [ ] Setup, konfigurasi dan command dapat diulang oleh pihak lain.
- [ ] Log/fixture/secrets aman; data pengguna dan stash tidak ditimpa/dihapus.
- [ ] Report menyatakan suite yang tidak tersedia dan lingkungan yang belum diuji.
- [ ] Dokumentasi keputusan dan langkah berikutnya diperbarui.
- [ ] Commit/push/PR mengikuti kewenangan; tidak ada merge/release tanpa izin.

**Irisan selesai tidak selalu berarti proyek siap rilis.** Jika baseline atau gate
wajib masih gagal/incomplete, sebutkan dengan jelas. Penerimaan pengecualian risiko
adalah keputusan pemilik proyek terpisah, bukan alasan mengubah report menjadi PASS.

### Template catatan handoff

```text
Tujuan dan scope:
Arsitektur/deployment yang dipertahankan:
Repository / branch / revision / dirty state:
Perubahan yang dibuat dan yang sengaja tidak dibuat:
Lingkungan aktual dan perbedaannya dari target:
Setup / profil / command reproduksi:
Hasil per suite + unit + exit + tingkat bukti:
Baseline dikenal / kegagalan baru / suite tidak tersedia:
Bukti yang belum tersedia dan risiko:
Lokasi report aman / kebijakan retensi:
Status commit, push, PR dan izin merge:
Langkah berikutnya:
```

## 14. Mengadopsi standar ini di proyek baru

1. Salin dokumen ini dan tentukan owner serta versi kebijakan proyek.
2. Isi kontrak awal dan pilih tool sesuai stack; jangan memasang tool hanya karena
   disebut sebagai contoh di dokumen ini.
3. Inventaris perintah/test yang sudah ada dan audit baseline aktual.
4. Jika perlu, buat runner tipis terlebih dahulu; jangan langsung merombak framework.
5. Uji setup dan report pada mesin developer serta workspace agent secara terpisah.
6. Perluas integrasi nyata menurut risiko produk, kemudian terapkan CI gate yang
   menjalankan kontrak sama dengan status unavailable yang tetap eksplisit.

**Ukuran keberhasilan:** bukan banyaknya tool atau badge hijau, melainkan perubahan
yang dapat dijelaskan, diperiksa ulang, dibandingkan, dan diterima tanpa
menyembunyikan kegagalan maupun merusak pekerjaan/data pengguna.
