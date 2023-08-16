<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('promo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('diskon_promo');
            $table->string('judul_promo');
            $table->text('deskripsi');
            $table->integer('status');
            $table->text('gambar_promo');
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
        Schema::dropIfExists('promo');
    }
};
