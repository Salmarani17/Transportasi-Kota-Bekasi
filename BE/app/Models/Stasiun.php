<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stasiun extends Model
{
    protected $fillable = [
        'transportasi_id',
        'nama',
        'alamat',
        'urutan'
    ];

    public function transportasi()
    {
        return $this->belongsTo(Transportasi::class);
    }
}