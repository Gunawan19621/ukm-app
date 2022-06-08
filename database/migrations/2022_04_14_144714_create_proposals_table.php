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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proposal')->unique();
            $table->string('tgl_proposal')->nullable();
            $table->mediumText('keterangan');
            $table->boolean('status')->default(false);
            $table->mediumText('komentar')->nullable();
            $table->string('file')->nullable();
            $table->foreignId('kegiatan_id');
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
        Schema::dropIfExists('proposals');
    }
};
