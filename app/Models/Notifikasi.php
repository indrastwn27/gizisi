<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model {
    protected $table = 'notifikasis'; // Memastikan Laravel mencari tabel 'notifikasis'
    protected $guarded = [];          // Membuka proteksi pengisian data
}