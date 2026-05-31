<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
    Schema::create('sarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pengguna_id')->nullable();
        $table->string('nama_ortu')->nullable();
        $table->text('pesan');
        $table->integer('rating'); // 1-5
        $table->string('posyandu')->nullable();
        $table->string('sentimen')->nullable(); // positif/negatif/netral
        $table->float('skor_sentimen')->nullable(); // 0-1
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarans');
    }
};
