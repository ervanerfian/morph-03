# Kebijakan Datastar-first & Native Web Platform

Status: arahan pengguna yang berlaku sejak 2026-10-29 untuk observasi, desain,
implementasi, review, dan pengujian. Dokumen ini adalah rujukan utama; pengingat
pada Markdown lain menunjuk ke sini agar aturan tidak berkembang berbeda-beda.

## 1. Prioritas arsitektur

1. **PHP adalah otoritas** untuk autentikasi, permission, scope workspace,
   validasi, transaksi, dan render konten. Gate permission tetap dilakukan
   sebelum membaca atau merender data terlindungi; pertahankan kontrak 401/403.
2. **Datastar-first** untuk reaktivitas deklaratif, signals, binding, event UI,
   request server (`@get`/`@post`), serta patch elements/signals melalui SSE.
   Evaluasi kemampuan Datastar sebelum menulis orkestrasi JS sendiri. Gunakan
   API yang benar-benar tersedia pada versi yang dipin, bukan asumsi dari versi
   dokumentasi yang lebih baru.
3. **Native browser APIs melengkapi, bukan menggantikan Datastar.** Sebelum
   membuat abstraksi baru atau menambah dependency, cari kemampuan platform
   yang sesuai di MDN dan tinjau Modern Web Guidance. Pilih berdasarkan masalah,
   dukungan browser target, keamanan, lifecycle, aksesibilitas, dan biaya rawat.
4. JS terbatas pada experience dan adapter platform yang tipis. Jangan membuat
   store reaktif kedua, renderer HTML transaksi di klien, fetch JSON manual
   sebagai pengganti alur Datastar, atau fallback legacy. Feature detection
   tidak berarti izin menghidupkan kembali arsitektur lama.
5. Tetap native ESM/no-build, modular, idempoten, dan mengikuti kontrak
   runtime/lifecycle/island yang ada. Tidak perlu mengadopsi API hanya karena baru.

## 2. Sinkronisasi lintas tab: contoh keputusan yang wajib dievaluasi

Ketika login/logout, pergantian workspace, atau data berubah pada suatu tab,
evaluasi `BroadcastChannel` untuk memberi tahu tab lain pada cakupan origin dan
storage partition yang diizinkan browser. Pesan adalah **notifikasi invalidasi**,
bukan state autentikasi atau bukti permission yang boleh dipercaya.

Kontrak desain sebelum implementasi:

- Satu adapter runtime memiliki channel, listener, dan cleanup; jangan satu
  channel baru pada setiap patch DOM. `close()` channel dan lepaskan listener
  ketika owner berhenti. Pasang ulang tepat sekali bila lifecycle memerlukannya.
- Tentukan schema pesan: versi protokol, tipe allowlist, ID pesan, ID pengirim,
  scope workspace bila relevan, timestamp, dan identitas resource minimal.
  Validasi bentuk dan scope sebelum menindaklanjuti; abaikan pesan sendiri,
  duplikat, versi yang tidak dikenal, dan pesan di luar scope.
- Jangan kirim password, cookie, token, session identifier, data pribadi, atau
  record sensitif. Jangan menyalin HTML patch atau seluruh signals antar-tab.
  Tab dengan origin sama bukan batas keamanan terhadap XSS.
- Tab penerima memvalidasi ulang session/permission dan meminta konten otoritatif
  melalui jalur Datastar/PHP. Jangan mengubah hak akses berdasarkan payload pesan.
  Kebijakan pergantian workspace harus jelas: tab lain diinvalidasi atau ikut
  pindah? Jangan memaksakan pilihan itu tanpa keputusan produk.
- Cegah echo loop: menerima notifikasi tidak memicu broadcast identik lagi.
  Burst perubahan perlu dikoaleskan; notifikasi bukan antrean durable atau
  jaminan delivery. Tab baru atau tab yang kembali aktif perlu rekonsiliasi.
- `storage` event dapat dievaluasi sebagai mekanisme alternatif yang **eksplisit**,
  bukan transport paralel otomatis. Event tersebut tidak dikirim ke window
  penulis; hindari menyimpan kredensial dan state otoritatif dalam localStorage.
  Tentukan perilaku bila API/storage tidak tersedia atau ditolak.
- Feature detection dan matriks browser mendahului implementasi. Pada browser
  tanpa transport lintas tab yang dipilih, nyatakan batas kemampuan dan tetap
  lakukan validasi server; jangan membuat legacy transactional fallback.

Bagian ini adalah kebijakan desain, **bukan pernyataan bahwa adapter lintas tab
sudah diimplementasikan**.

## 3. Checklist API platform saat observasi

Berikut kandidat evaluasi, bukan daftar fitur yang wajib ditambahkan:

| Kebutuhan | Kandidat native | Batas kepemilikan |
| --- | --- | --- |
| Notifikasi lintas tab | BroadcastChannel, storage event | Invalidasi; PHP tetap otoritas |
| Rekonsiliasi setelah kembali aktif | visibilitychange, pageshow/pagehide | Pertimbangkan bfcache dan cleanup |
| Pembatalan pekerjaan | AbortController, AbortSignal | Tidak menduplikasi request lifecycle Datastar |
| Pengamatan elemen | ResizeObserver, IntersectionObserver, MutationObserver | Pakai hanya sesuai kebutuhan; disconnect saat cleanup |
| Navigasi dan URL | URL, URLSearchParams, History API | Tetap satu router dan canonical order |
| Fokus dan modal | dialog, inert, focus management | Pertahankan aksesibilitas dan standar komponen |
| Animasi dan preferensi pengguna | View Transitions, Web Animations, matchMedia | Feature detect, reduced motion, bukan renderer baru |
| Diagnosis | Performance API, PerformanceObserver | Log terbatas, tanpa payload sensitif |

## 4. Gerbang review dan pengujian

Setiap perubahan yang relevan mencatat:

- Masalah yang diselesaikan; kemampuan Datastar yang diperiksa lebih dahulu.
- Alternatif native yang dievaluasi dan alasan memilih/menolaknya.
- Versi Datastar, browser target, dukungan API, dan tanggal pemeriksaan sumber.
- Owner lifecycle, setup idempoten, teardown, pembatalan, dan perilaku bfcache.
- Batas keamanan, permission awal, kontrak server, dan redaksi data debug.
- Bukti tes: patch SSE, navigasi, guest 401/403, serta mobile/keyboard bila relevan.

Untuk lintas tab, uji minimal dua tab: perubahan lokal dan notifikasi penerima,
pesan duplikat/tidak valid, workspace berbeda, logout/session kedaluwarsa,
burst perubahan, tab dibuka belakangan, tab tidur/kembali aktif, channel cleanup,
serta API tidak tersedia. Jangan menyatakan lulus hanya dari satu tab.

Debug perlu membedakan deklarasi HTML, signals runtime, dan event aktual.
Jika adapter lintas tab dibuat, tampilkan status kemampuan/transport, tipe pesan,
jumlah invalidasi, dan hasil rekonsiliasi dengan buffer terbatas; jangan log
payload rahasia. Catat pengujian yang belum dijalankan secara jujur.

## 5. Referensi dan pemantauan

Rujukan yang diminta pengguna:

- https://data-star.dev/guide
- https://data-star.dev/reference
- https://data-star.dev/examples
- https://data-star.dev/how_tos
- https://developer.mozilla.org/en-US/docs/Web/API
- https://developer.mozilla.org/en-US/docs/Web/API/Broadcast_Channel_API
- https://developer.mozilla.org/en-US/docs/Web/API/BroadcastChannel
- https://developer.chrome.com/docs/modern-web-guidance

Pada setiap observasi/perubahan terkait, tinjau halaman yang relevan dan cocokkan
dengan versi runtime serta browser target. Rekam URL, tanggal, temuan, dampak,
keputusan, dan bukti tes pada catatan kerja. Tidak ada klaim pemantauan otomatis
atau bahwa seluruh katalog API harus ditinjau pada setiap tugas.

Status sumber pada pencatatan 2026-10-29: URL disimpan dari arahan pengguna.
Konten situs-situs tersebut belum ditinjau langsung pada perubahan dokumentasi
ini karena allowlist jaringan sandbox tidak mencakup host tersebut. Kebijakan
ini tidak boleh dibaca sebagai audit kesesuaian terhadap dokumentasi terbaru.
