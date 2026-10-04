<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RencanaIntervensi extends Model
{
    protected $table = 'rencana_intervensis';

    protected $fillable = [
        'klien_id',
        'tujuan_smart',
        'teori_model',
        'metode_pendekatan',
        'skala_prioritas',
        'tanggal_rencana',
    ];

    protected $casts = [
        'tanggal_rencana' => 'date',
    ];

    public function klien(): BelongsTo
    {
        return $this->belongsTo(Klien::class);
    }
}
