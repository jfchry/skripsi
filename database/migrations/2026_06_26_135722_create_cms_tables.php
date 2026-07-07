<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. TABEL CONTENT_PAGES
        Schema::create('content_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('slug', 100)->unique();
            $table->string('title', 150);
            $table->string('type', 50)->default('page'); // 🌟 SELESAI: Ditambahkan kolom 'type' untuk membedakan guide/page
            $table->text('body');
            $table->string('image_url', 255)->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });

        // 2. TABEL DESTINATIONS
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->text('location_description');
            $table->string('image', 255)->nullable(); // 🌟 SELESAI: Ditambahkan kolom 'image' sebagai backup/multi-key adaptif
            $table->string('image_url', 255)->nullable();
            $table->timestamps();
        });

        // 3. TABEL VILLA_SERVICES
        Schema::create('villa_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name', 150);
            $table->text('description');
            $table->integer('price');
            $table->string('icon_url', 255)->nullable();
            $table->timestamps();
        });

        // 4. TABEL GALLERIES
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->enum('parent_type', ['content_page', 'destination', 'villa_service']);
            $table->integer('parent_id');
            $table->string('file_path', 255);
            $table->string('caption', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        // 5. TABEL INQUIRIES
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_name', 100);
            $table->string('email', 100);
            $table->string('phone_number', 20);
            $table->string('service_requested', 150)->nullable();
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('villa_services');
        Schema::dropIfExists('destinations');
        Schema::dropIfExists('content_pages');
    }
};
