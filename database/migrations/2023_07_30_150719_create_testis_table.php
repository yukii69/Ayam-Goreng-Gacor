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
        Schema::create('testi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_testi');
            $table->text('deskripsi');
            $table->integer('status');
            $table->text('gambar_testi');
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
        Schema::dropIfExists('testi');
    }
};
