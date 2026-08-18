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
        Schema::table('products', function (Blueprint $table) {
            $table->index('kode', 'products_kode_index');
            $table->index('category_id', 'products_category_id_index');
            $table->index('name', 'products_name_index');
        });

        Schema::table('products_atributes', function (Blueprint $table) {
            $table->index('field_name', 'products_atributes_field_name_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('products_kode_index');
            $table->dropIndex('products_category_id_index');
            $table->dropIndex('products_name_index');
        });

        Schema::table('products_atributes', function (Blueprint $table) {
            $table->dropIndex('products_atributes_field_name_index');
        });
    }
};
