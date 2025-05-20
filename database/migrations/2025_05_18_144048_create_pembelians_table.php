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
        Schema::create('pembelians', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('katalog_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama');                    // Nama pembeli
            $table->string('email');                   // Email pembeli
            $table->string('no_telepon');              // Nomor telepon pembeli
            $table->text('alamat');                     // Alamat pembeli
            $table->string('metode_pembayaran')->default('Transfer Bank'); // Metode pembayaran
            $table->string('nomor_order')->unique();   // Nomor order, unique agar tidak duplikat
            $table->timestamp('tanggal_pembelian');
            $table->timestamps();

            // foreign keys harus dideklarasi setelah kolom dibuat
            $table->foreign('katalog_id')->references('id')->on('katalogs')->onDelete('cascade');
           $table->foreign('user_id')->references('id')->on('user_logins')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
