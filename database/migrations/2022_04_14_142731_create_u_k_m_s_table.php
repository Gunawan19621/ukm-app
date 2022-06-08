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
        Schema::create('u_k_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ukm')->unique();
            $table->string('slug');
            $table->dateTime('tgl_berdiri')->nullable();
            $table->mediumText('deskripsi');
            $table->string('logo')->nullable();
            $table->string('file')->nullable();
            $table->string('status')->default(true);
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
        Schema::dropIfExists('u_k_m_s');
    }
};
