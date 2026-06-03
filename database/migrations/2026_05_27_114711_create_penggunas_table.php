<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('role')->nullable();
            $table->string('nama')->nullable();
            $table->string('nip')->nullable();
            $table->string('nik')->nullable();
            $table->string('noHP')->nullable(); 
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('penggunas'); }
};