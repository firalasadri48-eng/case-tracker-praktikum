<?php

namespace Database\Seeders;

use App\Models\Asesmen;
use App\Models\CatatanSesi;
use App\Models\Klien;
use App\Models\LogHour;
use App\Models\RencanaIntervensi;
use App\Models\Supervisi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Data contoh (dummy) untuk pengembangan. BUKAN data klien asli.
     */
    public function run(): void
    {
        // ---------- Klien 1 ----------
        $klien1 = Klien::create([
            'nama_panggilan' => 'Tn. A (contoh)',
            'usia' => 45,
            'jenis_kelamin' => 'Laki-laki',
            'kontak' => '0812-0000-0001',
            'alamat' => 'Jl. Contoh No. 1, Jakarta (alamat contoh)',
            'tanggal_intake' => '2026-10-14',
            'status' => 'aktif',
            'catatan_umum' => 'Klien contoh untuk uji aplikasi. Dirujuk tetangga karena kesulitan ekonomi pasca PHK.',
        ]);

        Asesmen::create([
            'klien_id' => $klien1->id,
            'masalah' => 'Klien kehilangan pekerjaan sejak 3 bulan lalu sehingga kesulitan memenuhi kebutuhan dasar keluarga (contoh).',
            'riwayat_masalah' => 'Bekerja sebagai buruh harian lepas selama 10 tahun; kontrak tidak diperpanjang (contoh).',
            'bpss_biologis' => 'Kondisi fisik cukup baik, sesekali mengeluh pusing karena kurang istirahat (contoh).',
            'bpss_kebutuhan_dasar' => 'Pendapatan tidak menentu; makan 2x sehari, menunggak kontrakan 1 bulan (contoh).',
            'bpss_psikologis' => 'Merasa cemas dan malu karena belum bisa menafkahi keluarga (contoh).',
            'bpss_sosial_budaya' => 'Hubungan dengan tetangga baik; jarang ikut kegiatan RT karena sibuk mencari kerja (contoh).',
            'bpss_spiritual' => 'Rutin beribadah; merasa lebih tenang setelah berdoa (contoh).',
            'dukungan_keluarga' => 'Istri mendukung dan ikut membantu dengan berjualan kecil-kecilan (contoh).',
            'dukungan_keagamaan' => 'Pengurus masjid pernah memberikan bantuan sembako (contoh).',
            'dukungan_lingkungan' => 'Ada program padat karya di kelurahan yang bisa diakses (contoh).',
            'potensi_kekuatan' => 'Memiliki keterampilan pertukangan dan kemauan kerja tinggi (contoh).',
            'potensi_kekurangan' => 'Belum memiliki jaringan pemberi kerja tetap; literasi digital rendah (contoh).',
            'kesimpulan' => 'Masalah utama bersifat ekonomi-sosial; klien memiliki motivasi dan dukungan keluarga yang baik sehingga prospek intervensi positif (contoh).',
        ]);

        RencanaIntervensi::create([
            'klien_id' => $klien1->id,
            'tujuan_smart' => 'Dalam 2 bulan, klien memperoleh pekerjaan tetap/berkala dengan penghasilan minimal Rp2.000.000/bulan (contoh).',
            'teori_model' => 'Model task-centered (contoh)',
            'metode_pendekatan' => 'Konseling individual, broker (menghubungkan ke program padat karya kelurahan), edukasi pengelolaan keuangan keluarga (contoh).',
            'skala_prioritas' => 'Prioritas 1: pemenuhan kebutuhan dasar; Prioritas 2: pekerjaan tetap (contoh)',
            'tanggal_rencana' => '2026-10-28',
        ]);

        CatatanSesi::create([
            'klien_id' => $klien1->id,
            'tanggal' => '2026-10-14',
            'tahapan' => 'engagement',
            'judul' => 'Perkenalan dan kontrak kerja (contoh)',
            'catatan' => 'Melakukan perkenalan dengan klien di rumahnya. Membangun rapport dan menyepakati kontrak kerja pendampingan (contoh).',
            'tindak_lanjut' => 'Jadwalkan kunjungan asesmen mendalam pekan depan (contoh).',
            'durasi_menit' => 60,
        ]);
        CatatanSesi::create([
            'klien_id' => $klien1->id,
            'tanggal' => '2026-10-21',
            'tahapan' => 'assessment',
            'judul' => 'Asesmen keberfungsian BPSS (contoh)',
            'catatan' => 'Menggali masalah, riwayat, keberfungsian BPSS, dan sistem dukungan klien melalui wawancara mendalam (contoh).',
            'tindak_lanjut' => 'Susun rencana intervensi dan diskusikan dengan supervisor (contoh).',
            'durasi_menit' => 90,
        ]);
        CatatanSesi::create([
            'klien_id' => $klien1->id,
            'tanggal' => '2026-11-04',
            'tahapan' => 'intervention',
            'judul' => 'Pendampingan pendaftaran padat karya (contoh)',
            'catatan' => 'Mendampingi klien mendaftar program padat karya kelurahan dan berlatih wawancara kerja sederhana (contoh).',
            'tindak_lanjut' => 'Pantau hasil seleksi program minggu depan (contoh).',
            'durasi_menit' => 120,
        ]);

        // ---------- Klien 2 ----------
        $klien2 = Klien::create([
            'nama_panggilan' => 'Ny. B (contoh)',
            'usia' => 32,
            'jenis_kelamin' => 'Perempuan',
            'kontak' => '0812-0000-0002',
            'alamat' => 'Jl. Contoh No. 2, Jakarta (alamat contoh)',
            'tanggal_intake' => '2026-10-16',
            'status' => 'aktif',
            'catatan_umum' => 'Klien contoh untuk uji aplikasi. Ibu tunggal dengan dua anak, membutuhkan dukungan pengasuhan.',
        ]);

        Asesmen::create([
            'klien_id' => $klien2->id,
            'masalah' => 'Klien kesulitan membagi waktu antara bekerja dan mengasuh dua anak usia sekolah (contoh).',
            'riwayat_masalah' => 'Menjadi orang tua tunggal sejak 2 tahun lalu (contoh).',
            'bpss_biologis' => 'Sehat; kelelahan karena kurang tidur (contoh).',
            'bpss_kebutuhan_dasar' => 'Bekerja sebagai asisten rumah tangga; penghasilan pas-pasan (contoh).',
            'bpss_psikologis' => 'Merasa bersalah karena kurang waktu untuk anak (contoh).',
            'bpss_sosial_budaya' => 'Aktif di arisan RT; tetangga sesekali membantu menjaga anak (contoh).',
            'bpss_spiritual' => 'Mengikuti pengajian mingguan (contoh).',
            'dukungan_keluarga' => 'Orang tua tinggal di kampung halaman; dukungan terbatas via telepon (contoh).',
            'dukungan_keagamaan' => 'Majelis taklim memberikan dukungan moral (contoh).',
            'dukungan_lingkungan' => 'Ada PAUD/TPA di dekat rumah dengan biaya terjangkau (contoh).',
            'potensi_kekuatan' => 'Disiplin, memiliki keterampilan memasak yang bisa dikembangkan (contoh).',
            'potensi_kekurangan' => 'Keterbatasan waktu dan akses informasi program bantuan (contoh).',
            'kesimpulan' => 'Perlu penguatan sistem dukungan pengasuhan dan peningkatan penghasilan melalui keterampilan (contoh).',
        ]);

        RencanaIntervensi::create([
            'klien_id' => $klien2->id,
            'tujuan_smart' => 'Dalam 3 bulan, anak klien terdaftar di TPA dan klien mengikuti 1 pelatihan keterampilan memasak (contoh).',
            'teori_model' => 'Teori sistem dan pendekatan berbasis kekuatan (contoh)',
            'metode_pendekatan' => 'Broker (TPA dan pelatihan), konseling suportif, edukasi pola asuh (contoh).',
            'skala_prioritas' => 'Prioritas 1: pengasuhan anak; Prioritas 2: peningkatan keterampilan (contoh)',
            'tanggal_rencana' => '2026-10-30',
        ]);

        CatatanSesi::create([
            'klien_id' => $klien2->id,
            'tanggal' => '2026-10-16',
            'tahapan' => 'engagement',
            'judul' => 'Kunjungan awal dan kontrak kerja (contoh)',
            'catatan' => 'Perkenalan, membangun kepercayaan, dan menyepakati jadwal pendampingan (contoh).',
            'tindak_lanjut' => 'Lakukan asesmen pada kunjungan berikutnya (contoh).',
            'durasi_menit' => 60,
        ]);
        CatatanSesi::create([
            'klien_id' => $klien2->id,
            'tanggal' => '2026-10-23',
            'tahapan' => 'assessment',
            'judul' => 'Asesmen kebutuhan pengasuhan (contoh)',
            'catatan' => 'Menggali pola pengasuhan saat ini dan kebutuhan dukungan klien (contoh).',
            'tindak_lanjut' => 'Survei TPA di sekitar tempat tinggal klien (contoh).',
            'durasi_menit' => 75,
        ]);

        // ---------- Supervisi ----------
        Supervisi::create([
            'tanggal' => '2026-10-08',
            'jenis' => 'Supervisi I',
            'topik' => 'Arahan awal Praktikum I (contoh)',
            'hasil_diskusi' => 'Supervisor menjelaskan tahapan casework dan etika pendampingan klien (contoh).',
            'tindak_lanjut' => 'Mulai tahap engagement dengan klien potensial (contoh).',
        ]);
        Supervisi::create([
            'tanggal' => '2026-11-05',
            'jenis' => 'Supervisi II',
            'topik' => 'Diskusi rencana intervensi (contoh)',
            'hasil_diskusi' => 'Membahas hasil asesmen kedua klien dan menyepakati rencana intervensi (contoh).',
            'tindak_lanjut' => 'Laksanakan intervensi sesuai rencana dan catat progresnya (contoh).',
        ]);

        // ---------- Log Hour ----------
        $logs = [
            ['2026-10-03', 'Sosialisasi Praktikum I', null, 2.0, 'Sosialisasi pelaksanaan dan penempatan kelompok (contoh).'],
            ['2026-10-08', 'Supervisi I dengan supervisor kampus', null, 4.0, 'Arahan mengenai Praktikum I (contoh).'],
            ['2026-10-10', 'Pembekalan casework', null, 8.0, 'Pembekalan materi casework (contoh).'],
            ['2026-10-14', 'Engagement klien Tn. A', 'engagement', 4.0, 'Perkenalan, kontrak kerja, dan observasi awal (contoh).'],
            ['2026-10-16', 'Engagement klien Ny. B', 'engagement', 4.0, 'Perkenalan dan kontrak kerja (contoh).'],
            ['2026-10-21', 'Asesmen klien Tn. A', 'assessment', 6.0, 'Wawancara mendalam BPSS (contoh).'],
            ['2026-10-23', 'Asesmen klien Ny. B', 'assessment', 6.0, 'Wawancara kebutuhan pengasuhan (contoh).'],
            ['2026-10-28', 'Penyusunan rencana intervensi', 'planning', 4.0, 'Menyusun rencana untuk kedua klien (contoh).'],
            ['2026-11-04', 'Intervensi: pendampingan padat karya', 'intervention', 8.0, 'Pendampingan pendaftaran program (contoh).'],
            ['2026-11-05', 'Supervisi II', null, 4.0, 'Diskusi progres dan rencana intervensi (contoh).'],
        ];

        foreach ($logs as [$tanggal, $kegiatan, $tahapan, $durasi, $keterangan]) {
            LogHour::create([
                'tanggal' => $tanggal,
                'kegiatan' => $kegiatan,
                'tahapan' => $tahapan,
                'durasi_jam' => $durasi,
                'keterangan' => $keterangan,
            ]);
        }
    }
}
