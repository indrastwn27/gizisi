<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model {
    protected $table = 'jadwals'; // Memastikan Laravel mencari tabel 'jadwals'
    protected $guarded = [];       // Membuka proteksi pengisian data
}