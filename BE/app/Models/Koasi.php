<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Koasi extends Model
{
    protected $table = 'koasi';

    protected $fillable = ['kode', 'rute'];
}