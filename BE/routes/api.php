<?php

use App\Models\Transportasi;
use App\Models\Koasi;

Route::get('/transportasi', function () {
    return Transportasi::all();
});

Route::get('/koasi', function () {
    return Koasi::all();
});