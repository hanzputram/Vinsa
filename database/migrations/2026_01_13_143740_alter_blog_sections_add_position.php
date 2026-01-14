<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('blog_sections', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_sections', 'position')) {
                $table->unsignedInteger('position')->default(0)->after('blog_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blog_sections', function (Blueprint $table) {
            if (Schema::hasColumn('blog_sections', 'position')) $table->dropColumn('position');
        });
    }
};
