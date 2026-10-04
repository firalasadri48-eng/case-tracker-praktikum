# Case Tracker Praktikum I

Aplikasi pencatatan pendampingan/kasus (casework) untuk mahasiswa Program Studi
Kesejahteraan Sosial — Praktikum I. Dibangun dengan Laravel 13 + SQLite.

## Fitur

- **Dashboard** — ringkasan klien aktif, sesi bulan ini, progress jam praktikum (target 206 jam), tahapan terakhir tiap klien, sesi terbaru
- **Klien** — CRUD data klien (nama panggilan/inisial, usia, kontak, tanggal intake, status)
- **Asesmen** — form asesmen per klien: masalah & riwayat, keberfungsian BPSS (biologis, kebutuhan dasar, psikologis, sosial-budaya-lingkungan, spiritualitas), sistem dukungan sosial, potensi kekuatan/kekurangan, kesimpulan
- **Rencana Intervensi** — tujuan SMART, teori/model, metode & pendekatan, skala prioritas (bisa banyak versi)
- **Catatan Sesi / Jurnal** — per klien, per tahapan (engagement → assessment → planning → intervention → monitoring → evaluasi → terminasi), lengkap dengan tindak lanjut & durasi
- **Supervisi** — catatan Supervisi I/II/III
- **Log Hour** — pencatatan jam kegiatan praktikum

## Cara menjalankan (lokal)

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed   # seed = 2 klien contoh + data dummy
php artisan serve             # http://localhost:8000
```

Butuh PHP 8.2+ dan ekstensi: mbstring, xml, curl, zip, sqlite3.

## Catatan

- Single-user, tanpa login (v1).
- Data seed bertanda "(contoh)" — hapus/ganti dengan data asli sebelum dipakai.
- Untuk deploy production (hosting/VPS), atur `APP_ENV=production`, `APP_DEBUG=false`, dan generate `APP_KEY` baru.
