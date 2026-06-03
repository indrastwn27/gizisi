<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('pengukurans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_anak'); // 
            $table->date('tanggal')->nullable();
            $table->float('bb')->nullable();
            $table->float('tb')->nullable();
            $table->float('lk')->nullable();
            $table->float('lla')->nullable();
            $table->string('zscore_bbu')->nullable();
            $table->string('zscore_tbu')->nullable();
            $table->string('status')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('pengukurans'); }
};