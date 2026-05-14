<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajarans';

    protected $fillable = [
        'nama_matpel',
    ];

    public function gurus(): BelongsToMany
    {
        return $this->belongsToMany(
            Guru::class,
            'guru_mata_pelajaran',
            'mata_pelajaran_id',
            'guru_id'
        );
    }
}
