<?php
$path = 'c:\Users\Public\Documents\vinsa\resources\views\new.blade.php';
$content = file_get_contents($path);

// The pattern to match
$searchCb = '/([ \t]*)<img src="\{\{ asset\(\'storage\/\' \. \$productItem->image\) \}\}" alt="\{\{ \$productItem->name( \?\? \'\'|) \}\}"\s*class="(.*?)">/sm';

$content = preg_replace_callback($searchCb, function($matches) {
    $indent = $matches[1];
    $alt = "{{ \$productItem->name" . $matches[2] . " }}";
    $class= $matches[3];
    return $indent . '<img src="{{ asset(\'storage/\' . $productItem->image) }}"' . "\n" .
           $indent . '     srcset="{{ asset(\'storage/\' . $productItem->image) }}?w=300 300w,' . "\n" .
           $indent . '             {{ asset(\'storage/\' . $productItem->image) }}?w=600 600w,' . "\n" .
           $indent . '             {{ asset(\'storage/\' . $productItem->image) }} 1000w"' . "\n" .
           $indent . '     sizes="(max-width: 640px) 300px, (max-width: 1024px) 600px, 1000px"' . "\n" .
           $indent . '     loading="lazy"' . "\n" .
           $indent . '     alt="' . $alt . '"' . "\n" .
           $indent . '     class="' . $class . '">';
}, $content);

file_put_contents($path, $content);
echo "Replaced in new.blade.php\n";
