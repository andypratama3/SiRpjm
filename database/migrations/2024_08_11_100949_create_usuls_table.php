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
        Schema::create('usuls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lokasi');
            $table->string('volume');
            $table->text('satuan');
            $table->string('status')->default('menunggu');
            $table->string('biaya');
            $table->string('tahun_prioritas')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuls');
    }
};
