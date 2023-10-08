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
        Schema::create('datanasabah', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 25);
            $table->string('nama_belakang', 50);
            $table->string('email', 50);
            $table->text('alamat');
            $table->string('telepon', 15);
            $table->string('avatar', 55)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datanasabah');
    }
};
