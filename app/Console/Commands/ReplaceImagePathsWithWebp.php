<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ReplaceImagePathsWithWebp extends Command
{
    protected $signature = 'app:auto-replace-webp 
        {--table= : Nama tabel}
        {--column=image : Nama kolom path gambar}
        {--base=storage : Base folder di public/ (contoh: storage atau images)}
        {--dry : Preview tanpa update}';

    protected $description = 'Auto replace path gambar di DB ke .webp jika file webp tersedia';

    public function handle()
    {
        $table = $this->option('table');
        $column = $this->option('column');
        $base = trim($this->option('base'), '/');
        $dry = (bool) $this->option('dry');

        if (!$table) {
            $this->error("Wajib isi --table. Contoh: --table=products");
            return Command::FAILURE;
        }

        if (!Schema::hasTable($table)) {
            $this->error("Tabel tidak ditemukan: {$table}");
            return Command::FAILURE;
        }

        $this->info("Table  : {$table}");
        $this->info("Column : {$column}");
        $this->info("Base   : public/{$base}/");
        $this->info("Mode   : " . ($dry ? "DRY RUN (tanpa update)" : "UPDATE DB"));

        $rows = DB::table($table)
            ->select('id', $column)
            ->whereNotNull($column)
            ->get();

        $updated = 0;
        $skipped = 0;

        foreach ($rows as $row) {
            $val = $row->{$column};

            if (!$val) { $skipped++; continue; }

            // Jika sudah webp, skip
            if (preg_match('/\.webp$/i', $val)) {
                $skipped++;
                continue;
            }

            // Support val dengan atau tanpa "storage/"
            $relative = ltrim($val, '/');
            $relative = preg_replace('#^'.$base.'/+#i', '', $relative); // buang base kalau sudah ada

            // convert hanya jpg/jpeg/png
            if (!preg_match('/\.(jpg|jpeg|png)$/i', $relative)) {
                $skipped++;
                continue;
            }

            $webpRelative = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $relative);

            // File check: public/{base}/{webpRelative}
            $webpFullPath = public_path($base . '/' . $webpRelative);

            if (!file_exists($webpFullPath)) {
                $skipped++;
                continue;
            }

            if ($dry) {
                $this->line("Would update ID {$row->id}: {$val} -> {$webpRelative}");
                $updated++;
                continue;
            }

            DB::table($table)
                ->where('id', $row->id)
                ->update([$column => $webpRelative]);

            $updated++;
            $this->line("✔ Updated ID {$row->id}");
        }

        $this->newLine();
        $this->info("Done!");
        $this->info("Updated : {$updated}");
        $this->info("Skipped : {$skipped}");

        return Command::SUCCESS;
    }
}
