<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('waktu')->nullable();
            $table->string('posyandu')->nullable(); // ← tambah
            $table->string('wilayah')->nullable();  // ← tambah
            $table->string('lokasi')->nullable();
            $table->string('petugas')->nullable();
            $table->text('keterangan')->nullable();
            $table->boolean('published')->default(0); // ← tambah
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('jadwals'); }
};