<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan')->unique();
            $table->string('slug');
            $table->dateTime('tgl_kegiatan')->nullable();
            $table->mediumText('deskripsi');
            $table->string('file')->nullable();
            $table->foreignId('ukm_id');
            $table->string('status')->default(false);
            $table->mediumText('komentar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatans');
    }
};
