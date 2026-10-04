<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisi extends Model
{
    protected $table = 'supervisis';

    public const JENIS = [
        'Supervisi I' => 'Supervisi I',
        'Supervisi II' => 'Supervisi II',
        'Supervisi III' => 'Supervisi III',
    ];

    protected $fillable = [
        'tanggal',
        'jenis',
        'topik',
        'hasil_diskusi',
        'tindak_lanjut',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
