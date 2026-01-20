<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ConvertImagesToWebp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:convert-images-to-webp 
                            {--path=storage : Folder target di dalam public/}
                            {--quality=80 : Kualitas WebP (1-100)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert JPG, JPEG, PNG images to WebP recursively';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $relativePath = $this->option('path');
        $quality = (int) $this->option('quality');

        $targetPath = public_path($relativePath);

        if (!File::exists($targetPath)) {
            $this->error("Folder tidak ditemukan: {$targetPath}");
            return Command::FAILURE;
        }

        $manager = new ImageManager(new Driver());

        $this->info("Scanning folder: {$targetPath}");
        $this->info("Quality WebP: {$quality}");

        $files = File::allFiles($targetPath);

        $converted = 0;
        $skipped = 0;

        foreach ($files as $file) {
            $ext = strtolower($file->getExtension());

            if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
                continue;
            }

            $webpPath = preg_replace(
                '/\.(jpg|jpeg|png)$/i',
                '.webp',
                $file->getPathname()
            );

            if (file_exists($webpPath)) {
                $skipped++;
                continue;
            }

            try {
                $manager
                    ->read($file->getPathname())
                    ->toWebp($quality)
                    ->save($webpPath);

                $converted++;
                $this->line("✔ Converted: " . $file->getFilename());

            } catch (\Throwable $e) {
                $this->error("✖ Failed: {$file->getFilename()} | {$e->getMessage()}");
            }
        }

        $this->newLine();
        $this->info("Done!");
        $this->info("Converted : {$converted}");
        $this->info("Skipped   : {$skipped}");

        return Command::SUCCESS;
    }
}
