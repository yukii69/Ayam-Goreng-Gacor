<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_gambar');
            $table->integer('status');
            $table->text('gambar_galery');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galery');
    }
};
