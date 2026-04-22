<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    protected $table = 'transportasis';

    protected $fillable = [
        'nama',
        'jenis',
        'jam_mulai',
        'jam_selesai',
        'gambar'
    ];

    public function stasiun()
    {
        return $this->hasMany(Stasiun::class);
    }

   public function rute()
{
    return $this->hasMany(Rute::class);
}
}

