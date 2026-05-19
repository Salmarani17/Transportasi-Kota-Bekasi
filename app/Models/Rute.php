<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transportasi;

class Rute extends Model
{
    protected $table = 'rute';

    protected $fillable = [
        'transportasi_id',
        'asal',
        'tujuan',
    ];

    public function transportasi()
    {
        return $this->belongsTo(Transportasi::class);
    }
}