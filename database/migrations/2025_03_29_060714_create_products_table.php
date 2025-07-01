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

            // HANYA kolom kategori ID tanpa foreign key
            $table->unsignedBigInteger('category_id')->nullable(); // Tanpa foreign key

            // Spesifikasi
            $table->string('u_c_series')->nullable();
            $table->string('push_button_type')->nullable();
            $table->string('selector_switch_type')->nullable();
            $table->string('pilot_lamp_type')->nullable();

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
