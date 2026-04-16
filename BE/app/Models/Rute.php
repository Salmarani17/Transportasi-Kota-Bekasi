<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Rute extends Model
{
    protected $table = 'rute';

    protected $fillable = [
        'transportasi_id',
        'asal',
        'tujuan'
    ];
}
