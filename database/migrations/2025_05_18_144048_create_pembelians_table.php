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
            $table->string('nama');                    
            $table->string('email');                  
            $table->string('no_telepon');             
            $table->text('alamat');                     
            $table->string('metode_pembayaran')->default('Transfer Bank'); 
            $table->string('nomor_order')->unique();   
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
