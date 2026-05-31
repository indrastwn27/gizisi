<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('kategori')->nullable();
            $table->string('penulis')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('foto')->nullable();
            $table->string('videoUrl')->nullable();
            $table->text('isi')->nullable();
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('artikels'); }
};