<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guru extends Model
{
    protected $table = 'gurus';

    protected $fillable = [
        'nama_guru',
        'email',
        'alamat',
        'foto',
    ];

    public function mataPelajarans(): BelongsToMany
    {
        return $this->belongsToMany(
            MataPelajaran::class,
            'guru_mata_pelajaran',
            'guru_id',
            'mata_pelajaran_id'
        );
    }
}
