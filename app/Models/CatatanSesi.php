<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CatatanSesi extends Model
{
    protected $table = 'catatan_sesis';

    public const TAHAPAN = [
        'engagement' => 'Engagement',
        'assessment' => 'Assessment',
        'planning' => 'Planning Intervention',
        'intervention' => 'Intervention',
        'monitoring' => 'Monitoring & Evaluasi',
        'evaluasi' => 'Evaluasi',
        'terminasi' => 'Terminasi',
    ];

    protected $fillable = [
        'klien_id',
        'tanggal',
        'tahapan',
        'judul',
        'catatan',
        'tindak_lanjut',
        'durasi_menit',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function klien(): BelongsTo
    {
        return $this->belongsTo(Klien::class);
    }

    public function labelTahapan(): string
    {
        return self::TAHAPAN[$this->tahapan] ?? $this->tahapan;
    }
}
