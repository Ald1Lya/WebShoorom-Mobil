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
       Schema::create('katalogs', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->bigInteger('harga');
            $table->integer('tahun');
            $table->enum('transmisi', ['Manual', 'Otomatik']);
            $table->enum('bahan_bakar', ['Bensin', 'Solar', 'Listrik']);
            $table->integer('kilometer');
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['tersedia', 'terjual'])->default('tersedia');
            $table->string('foto_utama')->nullable();
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->foreignId('merek_id')->constrained('mereks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalogs');
    }
};
