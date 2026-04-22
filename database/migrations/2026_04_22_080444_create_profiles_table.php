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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('section')->unique(); // tentang_sekolah, visi_misi, kepala_sekolah
            $table->string('title')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->json('additional_data')->nullable(); // For map data, mission lists, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
