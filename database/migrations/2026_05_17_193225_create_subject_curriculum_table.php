<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subject_curriculum', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('major_id')->constrained('majors')->onDelete('cascade');
            $table->string('grade'); // 10, 11, 12
            $table->string('report_label')->nullable(); // Label Raport
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subject_curriculum');
    }
};
