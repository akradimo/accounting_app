<?php

require_once __DIR__ . '/../app/core/Database.php';

$migrationFiles = glob(__DIR__ . '/../migrations/*.php');
sort($migrationFiles); // اجرای migration‌ها به ترتیب زمانی

foreach ($migrationFiles as $file) {
    echo "در حال اجرای migration: " . basename($file) . "\n";
    require_once $file;
    echo "اتمام اجرای migration: " . basename($file) . "\n\n";
}

echo "همه migration‌ها با موفقیت اجرا شدند.\n";