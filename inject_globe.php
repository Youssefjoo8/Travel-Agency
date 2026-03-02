<?php
$dir_en = __DIR__ . '/pages/en';
$dir_ar = __DIR__ . '/pages/ar';

$en_files = glob($dir_en . '/*.php');
$ar_files = glob($dir_ar . '/*.php');

$dynamic_en = '<?php
      $pg = basename($_SERVER["PHP_SELF"]);
      $map = [
          "home.php" => "home arabic.php",
          "about.php" => "about arabic.php",
          "package.php" => "package arabic.php",
          "book.php" => "book arabic.php",
          "gallery.php" => "gallery arabic.php",
          "my_bookings.php" => "bookings_ar.php",
          "settings.php" => "settings_ar.php",
          "profile.php" => "profile_ar.php"
      ];
      $ar_dest = isset($map[$pg]) ? $map[$pg] : "home arabic.php";
      ?>
      <a href="../ar/<?php echo $ar_dest; ?>" class="fas fa-globe"></a>';

$dynamic_ar = '<?php
      $pg = basename($_SERVER["PHP_SELF"]);
      $map = [
          "home arabic.php" => "home.php",
          "about arabic.php" => "about.php",
          "package arabic.php" => "package.php",
          "book arabic.php" => "book.php",
          "gallery arabic.php" => "gallery.php",
          "bookings_ar.php" => "my_bookings.php",
          "my_bookings_arabic.php" => "my_bookings.php",
          "settings_ar.php" => "settings.php",
          "profile_ar.php" => "profile.php"
      ];
      $en_dest = isset($map[$pg]) ? $map[$pg] : "home.php";
      ?>
      <a href="../en/<?php echo $en_dest; ?>" class="fas fa-globe"></a>';

foreach ($en_files as $file) {
    if (is_file($file)) {
        $content = file_get_contents($file);
        $content = preg_replace('/<a href="\.\.\/ar\/[^"]+" class="fas fa-globe"><\/a>/i', $dynamic_en, $content);
        file_put_contents($file, $content);
    }
}

foreach ($ar_files as $file) {
    if (is_file($file)) {
        $content = file_get_contents($file);
        $content = preg_replace('/<a href="\.\.\/en\/[^"]+" class="fas fa-globe"><\/a>/i', $dynamic_ar, $content);
        file_put_contents($file, $content);
    }
}
echo "Done";
?>
