# Dump 4-char murni — ws_* -> a1B2/b2C3/c3D4/d4E5/e5F6

Real DB sekarang 4-char (sesuai permintaan).
File di `data/collections/*.json` sudah 4-char semua (workspaces, workspace_members, extension_instances, workspace_extensions).

Jika Postgres kamu (HeidiSQL) masih `ws_*` lama:
1. `git pull origin arena/68a7eb6c-morph-01`
2. `php tools/migrate-ws-4char-nopriv.php`  (nopriv, handle slug duplicate)
3. Refresh HeidiSQL F5 di `workspaces`, `workspace_members`, `workspace_extensions`, `extension_instances`, `morph_rows`

Atau jalankan SQL langsung:
```
psql -U morph_app -d morph -f dump/fix-workspaces-4char.sql
```

PR tetap `pr_open` — tidak di-merge.

<!-- datastar-native-web-policy:2026-10-29 -->
## Arahan lintas dokumentasi: Datastar & Native Web Platform

Dalam observasi dan development, prioritaskan kemampuan utama **Datastar** untuk
reaktivitas dan SSE; manfaatkan **API native browser** yang sesuai (termasuk
BroadcastChannel/storage event untuk notifikasi lintas tab) tanpa membuat state
atau renderer tandingan. **PHP tetap otoritas data, transaksi, dan permission.**
Evaluasi lifecycle/cleanup, keamanan, dukungan browser, aksesibilitas, dan bukti
tes dengan merujuk MDN Web APIs serta Chrome Modern Web Guidance.

Pedoman wajib: [Datastar-first & Native Web Platform](../docs/DATASTAR-NATIVE-WEB-GUIDANCE.md).
Catatan ini menetapkan kebijakan kerja; bukan klaim bahwa semua API telah
diimplementasikan atau bahwa catatan historis di dokumen ini telah diuji ulang.
