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

## Deploy gratis (Render + Neon)

Arsitektur: web service gratis di Render (Docker) + database Postgres gratis di Neon.

### 1. Database (Neon)
1. Daftar di [neon.tech](https://neon.tech) (gratis).
2. Buat project baru, catat: **Host**, **Database**, **User**, **Password** (port 5432).

### 2. Web service (Render)
1. Daftar di [render.com](https://render.com) (gratis).
2. Dashboard → **New +** → **Blueprint** → hubungkan repo GitHub ini.
3. Render membaca `render.yaml` otomatis. Isi env var yang bertanda `sync: false`:
   - `APP_URL`: `https://<nama-service-kamu>.onrender.com` (lihat di dashboard setelah dibuat)
   - `APP_KEY`: jalankan lokal `php artisan key:generate --show`, salin hasilnya (diawali `base64:`)
   - `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`: dari Neon
4. Deploy. Saat container start, aplikasi otomatis `migrate --force`, jadi tabel langsung jadi.

### Catatan paket gratis
- Render free: service "tidur" setelah 15 menit tidak dipakai, bangun otomatis saat dibuka (butuh ±30 detik).
- Jangan pakai SQLite di production — filesystem Render free tidak persisten, data SQLite akan hilang saat restart. Selalu pakai Postgres (Neon/Supabase).
