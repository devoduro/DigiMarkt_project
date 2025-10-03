<?php
/**
 * Manual Storage Link Alternative
 * This script creates a manual link between storage/app/public and public/storage
 * Run this script whenever you need to sync storage files
 */

$storageSource = __DIR__ . '/storage/app/public';
$publicTarget = __DIR__ . '/public/storage';

function copyDirectory($source, $destination) {
    if (!is_dir($source)) {
        return false;
    }
    
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }
    
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    
    foreach ($iterator as $item) {
        $target = $destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName();
        
        if ($item->isDir()) {
            if (!is_dir($target)) {
                mkdir($target, 0755, true);
            }
        } else {
            $targetDir = dirname($target);
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            copy($item, $target);
        }
    }
    
    return true;
}

echo "Starting manual storage link...\n";

if (copyDirectory($storageSource, $publicTarget)) {
    echo "✓ Storage files successfully copied to public/storage\n";
    echo "✓ Gallery files are now accessible via /storage/ URLs\n";
} else {
    echo "✗ Failed to copy storage files\n";
}

echo "Done!\n";
?>
