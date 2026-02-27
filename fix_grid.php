<?php
$file = 'c:\\Users\\Public\\Documents\\vinsa\\resources\\views\\new.blade.php';
$content = file_get_contents($file);

// 1. Replace the flex row container with grid
$content = preg_replace(
    '/<div class="flex flex-col md:flex-row gap-4 (mb-10|mt-4)">/',
    '<div class="grid grid-cols-1 md:grid-cols-2 gap-4 $1">',
    $content
);

// 2. Replace left column classes
$content = preg_replace(
    '/<div\s+class="w-full md:w-1\/2 md:border-r-\[1\.5px\] md:border-white\/10 text-white bg-white\/5 backdrop-blur-md p-6 rounded-\[2rem\] border border-white\/10">/',
    '<div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">',
    $content
);

// 3. Replace right column classes
$content = preg_replace(
    '/<div\s+class="w-full md:w-1\/2 md:pl-\[13\.5px\] text-white bg-white\/5 backdrop-blur-md p-6 rounded-\[2rem\] border border-white\/10">/',
    '<div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">',
    $content
);

// 4. Replace Box Panel right column class which has mr-6
$content = preg_replace(
    '/<div\s+class="w-full md:w-\[calc\(50%-1rem\)\] md:pl-\[13\.5px\] mr-6 text-white bg-white\/5 backdrop-blur-md p-6 rounded-\[2rem\] border border-white\/10">/',
    '<div class="w-full text-white bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/10">',
    $content
);

file_put_contents($file, $content);
echo "Done\n";
