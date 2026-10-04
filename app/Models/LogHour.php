<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogHour extends Model
{
    protected $table = 'log_hours';

    public const TARGET_JAM = 206;

    protected $fillable = [
        'tanggal',
        'kegiatan',
        'tahapan',
        'durasi_jam',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'durasi_jam' => 'decimal:2',
    ];
}
