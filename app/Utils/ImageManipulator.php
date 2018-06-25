<?php

namespace App\Utils;

use Image;
use Storage;
use Intervention\Image\Image as ImageFile;

/*
 |--------------------------------------------------------------------------
 | ImageManipulator
 |--------------------------------------------------------------------------
 |
 | This is a wrapper around Intervention\Image package
 | Images are loaded in /storate/app/{$this->storagePath}
 | Images are compressed by a factor of {$this->compressionFactor}
 | Images are resize to fit in {$this->maxWidth}
 |
 */

class ImageManipulator {

    protected $storagePath = '';
    protected $compressionFactor = 70;
    protected $maxWidth = 200;

    /**
     * Set the storagePath
     * 
     * @param int $storagePath
     * @return $storagePath
     */
    public function setStoragePath(string $storagePath)
    {
        return $this->storagePath = $this->cleanStoragePath($storagePath);
    }

    /**
     * Set the compressionFactor
     * 
     * @param int $compressionFactor
     * @return $compressionFactor
     */
    public function setCompressionFactor(int $compressionFactor)
    {
        return $this->compressionFactor = $compressionFactor;
    }

    /**
     * Set the maxWidth
     * 
     * @param int $maxWidth
     * @return $maxWidth
     */
    public function setMaxWidth(int $maxWidth)
    {
        return $this->maxWidth = $maxWidth;
    }
    
    /**
     * Upload and manipulate an image from full path
     * 
     * @param string $path Full path of the uploaded file
     * @return $path Final path of the Image
     */
    public function save(string $path)
    {
        if (! file_exists($path)) {
            return null;
        }

        $img = Image::make($path);

        $img = $this->resize($img);

        $img = $this->forceJpg($img);

        return $this->storeImage($img);
    }

    /**
     * Resize the image according to imageMaxWith
     * 
     * @param ImageFile $img
     * @return ImageFile $img
     */
    private function resize(ImageFile $img)
    {
        return $img->resize($this->maxWidth, null, function ($constraint) {
            $constraint->aspectRatio();
        });
    }

    /**
     * Force image conversion to jpg
     * 
     * @param ImageFile $img
     * @return ImageFile $img
     */
    private function forceJpg(ImageFile $img)
    {
        $jpg = Image::canvas($img->width(), $img->height(), '#ffffff');
        return $jpg->insert($img);
    }

    /**
     * Store an image
     * 
     * @param ImageFile $img
     * @return ImageFile $img
     */
    private function storeImage(ImageFile $img)
    {
        $root = config('filesystems.disks.public.root');

        $root = $root . $this->storagePath;

        // Creates directory if it doesn't exist
        if (! is_dir($root)) {
            mkdir($root);
        }

        $filename = uniqid() . '.jpg';

        $img->save($root . $filename, $this->compressionFactor);

        return config('filesystems.disks.public.url') . $this->storagePath . $filename;
    }

    /**
     * Add slashes before and after storagePath
     *
     * @param string $storagePath
     * @return string cleaned storage path
     */
    private function cleanStoragePath(string $storagePath)
    {
        if ($storagePath === '') {
            return '/';
        }

        // Remove / before $this->storagePath
        if ($storagePath[0] !== '/') {
            $storagePath = '/' . $storagePath;
        }

        // Add / after $this->storagePath
        if (substr($storagePath, -1) !== '/') {
            $storagePath = $storagePath . '/';
        }

        return $storagePath;
    }
}
