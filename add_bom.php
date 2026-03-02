<?php
$files = [
    __DIR__ . '/pages/ar/settings_ar.php',
    __DIR__ . '/pages/ar/profile_ar.php',
    __DIR__ . '/pages/ar/bookings_ar.php',
    __DIR__ . '/pages/ar/home arabic.php',
    __DIR__ . '/pages/ar/about arabic.php',
    __DIR__ . '/pages/ar/package arabic.php',
    __DIR__ . '/pages/ar/book arabic.php',
    __DIR__ . '/pages/ar/gallery arabic.php',
    __DIR__ . '/sidebar_ar.php',
    __DIR__ . '/login_ar.php',
    __DIR__ . '/register_ar.php'
];

foreach ($files as $f) {
    if (file_exists($f)) {
        $content = file_get_contents($f);
        // Check if starts with BOM
        if (strncmp($content, "\xEF\xBB\xBF", 3) !== 0) {
            file_put_contents($f, "\xEF\xBB\xBF" . $content);
            echo "Added BOM to " . basename($f) . "\n";
        }
        else {
            echo "BOM already exists in " . basename($f) . "\n";
        }
    }
}
echo "Done\n";
?>
