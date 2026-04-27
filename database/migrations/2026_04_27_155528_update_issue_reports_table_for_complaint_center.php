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
        Schema::table('issue_reports', function (Blueprint $table) {
            $table->string('tracking_code')->nullable()->unique()->after('id');
            $table->string('type')->default('general')->after('tracking_code'); // service, facility, general, academic
            $table->text('admin_feedback')->nullable()->after('description');
            $table->timestamp('handled_at')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('issue_reports', function (Blueprint $table) {
            $table->dropColumn(['tracking_code', 'type', 'admin_feedback', 'handled_at']);
        });
    }
};
