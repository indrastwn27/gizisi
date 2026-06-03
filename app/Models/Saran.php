<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model {
    protected $fillable = [
    'pengguna_id', 'nama_ortu', 'pesan',
    'rating', 'sentimen', 'skor_sentimen', 'posyandu'
];
}