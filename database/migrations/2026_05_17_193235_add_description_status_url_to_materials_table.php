<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->text('description')->nullable()->after('title');
            $table->string('status')->default('published')->after('file_type'); // draft | published
            $table->string('file_url')->nullable()->after('file_path'); // untuk tipe Link
        });
    }

    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropColumn(['description', 'status', 'file_url']);
        });
    }
};
