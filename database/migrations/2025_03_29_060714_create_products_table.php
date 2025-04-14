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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('stock')->nullable();
            $table->string('kode');
            $table->string('image');
            $table->unsignedBigInteger('category_id')->nullable(); // Relasi ke categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            // Tambahan kolom untuk spesifikasi
            $table->string('u_c_series')->nullable(); // Kolom untuk cable tray
            $table->string('push_button_type')->nullable(); // Kolom untuk push button
            $table->string('selector_switch_type')->nullable(); // Kolom untuk selector switch
            $table->string('pilot_lamp_type')->nullable(); // Kolom untuk pilot lamp

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
