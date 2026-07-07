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
        Schema::table('inquiries', function (Blueprint $table) {
            // 🌟 1. Mengubah kolom email menjadi nullable jika sebelumnya wajib diisi
            $table->string('email')->nullable()->change();

            // 🌟 2. Karena kolom 'phone' terdeteksi belum ada, kita tambahkan sebagai kolom baru yang nullable
            $table->string('phone')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->string('email')->nullable(false)->change();

            // Menghapus kembali kolom phone jika dilakukan rollback
            $table->dropColumn('phone');
        });
    }
};
