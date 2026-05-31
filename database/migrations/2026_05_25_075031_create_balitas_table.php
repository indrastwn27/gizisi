<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('balitas', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->nullable();
            $table->string('nama')->nullable();
           $table->date('tgl_lahir')->nullable(); // Ubah dari tglLahir
    $table->string('jenis_kelamin')->nullable(); // Ubah dari jenisKelamin
    $table->string('nama_ibu')->nullable(); // Ubah dari nama_ibu
    $table->string('nik_ibu')->nullable(); // Ubah dari nikIbu
    $table->string('no_hp')->nullable(); // Ubah dari noHP (karena di error balitas terdeteksi mencari no_hp)
            $table->text('alamat')->nullable();
            $table->string('wilayah')->nullable();
            $table->string('posyandu')->nullable();
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('balitas'); }
};