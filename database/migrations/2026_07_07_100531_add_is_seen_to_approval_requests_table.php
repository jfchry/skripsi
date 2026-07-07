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
    Schema::table('approval_requests', function (\Illuminate\Database\Schema\Blueprint $table) {
        // Menambahkan kolom penanda baca dengan nilai default false (belum dibaca)
        $table->boolean('is_seen')->default(false)->after('status');
    });
}

public function down(): void
{
    Schema::table('approval_requests', function (\Illuminate\Database\Schema\Blueprint $table) {
        $table->dropColumn('is_seen');
    });
}
};
