<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asesmen extends Model
{
    protected $table = 'asesmens';

    protected $fillable = [
        'klien_id',
        'masalah',
        'riwayat_masalah',
        'bpss_biologis',
        'bpss_kebutuhan_dasar',
        'bpss_psikologis',
        'bpss_sosial_budaya',
        'bpss_spiritual',
        'dukungan_keluarga',
        'dukungan_keagamaan',
        'dukungan_lingkungan',
        'potensi_kekuatan',
        'potensi_kekurangan',
        'kesimpulan',
    ];

    public function klien(): BelongsTo
    {
        return $this->belongsTo(Klien::class);
    }
}
