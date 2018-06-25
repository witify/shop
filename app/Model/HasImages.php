<?php

namespace App\Model;

use Image;
use Storage;
use App\Utils\ImageManipulator;
use Intervention\Image\Image as ImageFile;

/*
 |--------------------------------------------------------------------------
 | HasImage Trait
 |--------------------------------------------------------------------------
 |
 | This trait allows fast image upload an manipulation.
 | Images are loaded in /storate/app/{$this->imageStoragePath}
 | Images are compressed by a factor of {$this->imageCompressionFactor}
 | Images are resize to fit in {$this->imageMaxWidth}
 |
 */

trait HasImages {

    protected $_imageStoragePath = '/';
    protected $_imageCompressionFactor = 70;
    protected $_imageMaxWidth = 200;

    /**
     * Get an image's storage path
     *
     * @return int
     */
    private function getImageStoragePath()
    {
        return $this->getIfExists('imageStoragePath');
    }

    /**
     * Get an image's compression factor
     *
     * @return int
     */
    private function getImageCompressionFactor()
    {
        return $this->getIfExists('imageCompressionFactor');
    }

    /**
     * Get an image's max width
     *
     * @return int
     */
    private function getImageMaxWidth()
    {
        return $this->getIfExists('imageMaxWidth');
    }

    /**
     * Get an object attribute if it exists
     *
     * @param string $attribute
     * @return mixed
     */
    private function getIfExists(string $attribute)
    {
        if (property_exists($this, $attribute)) {
            return $this->$attribute;
        }
        return $this->{'_' . $attribute};
    }

    /**
     * Upload and manipulate an image from filename in temp folder
     * 
     * @param string $attribute Name of the attribute containing the image
     * @param string $filename Name of the uploaded file
     * @return $this
     */
    public function uploadImageFromTemp(string $attribute, $filename)
    {       
        if ($filename === null) {
            return $this;
        }

        $path = storage_path('app/temp/' . $filename);
        return $this->uploadImage($attribute, $path);
    }
    
    /**
     * Upload and manipulate an image from full path
     * 
     * @param string $attribute Name of the attribute containing the image
     * @param string $filename Full path of the uploaded file
     * @return $this
     */
    public function uploadImage(string $attribute, string $path)
    {
        $imageManipulator = new ImageManipulator();

        $imageManipulator->setCompressionFactor($this->getImageCompressionFactor());
        $imageManipulator->setMaxWidth($this->getImageMaxWidth());
        $imageManipulator->setStoragePath($this->getImageStoragePath());

        $url = $imageManipulator->save($path);
        
        if ($url !== null) {
            $this->$attribute = $url;
        }
    }
}
