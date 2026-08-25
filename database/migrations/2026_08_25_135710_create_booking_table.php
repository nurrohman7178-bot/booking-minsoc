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
        Schema::create('booking', function (Blueprint $table) {
            $table->id('id_booking');

            $table->foreignId('id_pelanggan')
                ->constrained('pelanggan', 'id_pelanggan')
                ->cascadeOnDelete();

            $table->foreignId('id_jadwal')
                ->constrained('jadwal', 'id_jadwal')
                ->cascadeOnDelete();

            $table->enum('status', ['menunggu', 'dikonfirmasi', 'ditolak', 'selesai', 'dibatalkan'])
                ->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
