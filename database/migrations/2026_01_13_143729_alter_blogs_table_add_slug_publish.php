<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'slug')) {
                $table->string('slug')->unique()->after('title');
            }
            if (!Schema::hasColumn('blogs', 'content')) {
                $table->longText('content')->nullable()->after('slug'); // konten utama TinyMCE
            }
            if (!Schema::hasColumn('blogs', 'is_published')) {
                $table->boolean('is_published')->default(false)->after('image');
            }
            if (!Schema::hasColumn('blogs', 'published_at')) {
                $table->timestamp('published_at')->nullable()->after('is_published');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (Schema::hasColumn('blogs', 'slug')) $table->dropColumn('slug');
            if (Schema::hasColumn('blogs', 'content')) $table->dropColumn('content');
            if (Schema::hasColumn('blogs', 'is_published')) $table->dropColumn('is_published');
            if (Schema::hasColumn('blogs', 'published_at')) $table->dropColumn('published_at');
        });
    }
};
