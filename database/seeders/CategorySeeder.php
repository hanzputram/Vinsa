<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Push Button',
            'Illuminated Push Button',
            'Emergency Push Button',
            'Illuminated Selector Switch',
            'Selector Switch',
            'Pilot Lamp',
            'Box Panel',
            'Cable Ties',
            'Cable Tray',
            'Accessories',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
