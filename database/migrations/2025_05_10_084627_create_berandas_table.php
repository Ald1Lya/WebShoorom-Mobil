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
        Schema::create('berandas', function (Blueprint $table) {
            $table->id();
        
            $table->string('judul1')->nullable();
            $table->text('deskripsi1')->nullable();
            $table->string('gambar1')->nullable();
            $table->string('judul2')->nullable();
            $table->text('deskripsi2')->nullable();
            $table->string('gambar2')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->text('google_maps')->nullable();
            $table->string('nomor')->nullable();
            $table->string('judulsec3')->nullable();
            $table->string('gambarsec3')->nullable();
            $table->string('gambarsec4')->nullable();
            $table->string('gambarsec5')->nullable();
            $table->string('gambarsec6')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berandas');
    }
};
