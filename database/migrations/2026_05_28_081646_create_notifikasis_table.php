<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('notifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->text('isi')->nullable();
            $table->date('tanggal')->nullable();
            $table->boolean('is_read')->default(false); // Untuk status sudah dibaca atau belum
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('notifikasis'); }
};