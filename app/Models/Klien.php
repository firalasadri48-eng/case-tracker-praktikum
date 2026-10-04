<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Klien extends Model
{
    protected $table = 'kliens';

    protected $fillable = [
        'nama_panggilan',
        'usia',
        'jenis_kelamin',
        'kontak',
        'alamat',
        'tanggal_intake',
        'status',
        'catatan_umum',
    ];

    protected $casts = [
        'tanggal_intake' => 'date',
    ];

    public function asesmen(): HasOne
    {
        return $this->hasOne(Asesmen::class);
    }

    public function rencanaIntervensi(): HasMany
    {
        return $this->hasMany(RencanaIntervensi::class)->orderByDesc('tanggal_rencana');
    }

    public function rencanaTerbaru(): HasOne
    {
        return $this->hasOne(RencanaIntervensi::class)->latestOfMany('tanggal_rencana');
    }

    public function catatanSesi(): HasMany
    {
        return $this->hasMany(CatatanSesi::class)->orderByDesc('tanggal');
    }

    public function tahapanTerakhir(): ?string
    {
        return $this->catatanSesi()->first()?->tahapan;
    }
}
