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
        Schema::create('approval_requests', function (Blueprint $table) {
            $table->id();
            $table->string('model_type'); // Menyimpan nama Model (Contoh: 'App\Models\Destination')
            $table->unsignedBigInteger('model_id')->nullable(); // ID data asli (Kosong jika data baru/Create)
            $table->string('action_type'); // Tipe aksi: 'create', 'update', atau 'delete'
            $table->json('payload'); // 🌟 SAKTI: Kolom teks untuk menampung seluruh data input form dalam format JSON
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ID Admin yang mengajukan
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status persetujuan
            $table->text('notes_from_owner')->nullable(); // Kolom catatan/komentar dari owner jika ditolak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_requests');
    }
};