<?php

namespace App\Services;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class StorageSyncService
{
    /**
     * Sync a specific file from storage to public
     */
    public static function syncFile($relativePath)
    {
        $sourcePath = storage_path('app/public/' . $relativePath);
        $targetPath = public_path('storage/' . $relativePath);
        
        if (!file_exists($sourcePath)) {
            return false;
        }
        
        $targetDir = dirname($targetPath);
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        
        return copy($sourcePath, $targetPath);
    }
    
    /**
     * Delete a file from public storage
     */
    public static function deleteFile($relativePath)
    {
        $targetPath = public_path('storage/' . $relativePath);
        
        if (file_exists($targetPath)) {
            return unlink($targetPath);
        }
        
        return true;
    }
    
    /**
     * Sync entire storage directory to public
     */
    public static function syncAll()
    {
        $storageSource = storage_path('app/public');
        $publicTarget = public_path('storage');
        
        return self::copyDirectory($storageSource, $publicTarget);
    }
    
    private static function copyDirectory($source, $destination)
    {
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
}
