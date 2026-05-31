<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
    Schema::table('balitas', function (Blueprint $table) {
        $table->string('nama_ayah')->nullable()->after('nama_ibu');
        $table->string('pekerjaan_ibu')->nullable()->after('nama_ayah');
        $table->string('pekerjaan_ayah')->nullable()->after('pekerjaan_ibu');
    });
}
public function down() {
    Schema::table('balitas', function (Blueprint $table) {
        $table->dropColumn(['nama_ayah','pekerjaan_ibu','pekerjaan_ayah']);
    });
}
};
