<?php

namespace Tests\Unit\Model\Traits;

use Image;
use App\Page;
use Tests\TestCase;
use App\Model\HasImages;
use Tests\Unit\Model\TestModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HasImageTest extends TestCase
{
    private $object;

    public function setUp()
    {
        parent::setUp();

        $this->object = new TestModelHasImage([
            'title' => 'Test',
            'body' => 'Lorem ipsum',
            'picture' => null
        ]);
    }

    public function test_upload_image()
    {
        $image = $this->uploadAnImage();
        $this->assertNotNull($image);
    }

    public function test_upload_has_good_width()
    {
        $this->uploadAnImage();
        $img = $this->getImageFileFromPublicUrl($this->object->picture);
        $this->assertEquals($img->getWidth(), 300);
    }

    public function test_upload_has_good_path()
    {
        $this->uploadAnImage();
        $this->assertTrue(str_is('*/storage/test/*', $this->object->picture));
    }

    public function test_is_jpg()
    {
        $this->uploadAnImage();
        $this->assertTrue(str_is('*.jpg', $this->object->picture));
        $img = $this->getImageFileFromPublicUrl($this->object->picture);
        $this->assertEquals($img->mime(), 'image/jpeg');
    }

    public function test_upload_from_temp()
    {
        $content = file_get_contents('http://via.placeholder.com/350x150');
        $path = storage_path('app/temp/test.jpg');
        Storage::put('temp/test.jpg', $content);

        $this->object->uploadImageFromTemp('picture', 'test.jpg');

        $img = $this->getImageFileFromPublicUrl($this->object->picture);
        $this->assertEquals($img->mime(), 'image/jpeg');
        $this->assertEquals($img->getWidth(), 300);
        $this->assertTrue(str_is('*/storage/test/*', $this->object->picture));
    }

    public function test_upload_from_temp_with_missing_filename()
    {
        $this->object->uploadImageFromTemp('picture', null);
        $this->assertNull($this->object->picture);
    }

    /**
     * Upload an image to the model using 
     * uploadImage method from HasImages
     *
     * @return string File data
     */
    private function uploadAnImage()
    {
        $content = file_get_contents('http://via.placeholder.com/350x150');
        $path = storage_path('app/test.jpg');
        Storage::put('test.jpg', $content);
        $this->object->uploadImage('picture', $path);
        return $this->getImageFileFromPublicUrl($this->object->picture);
    }

    /**
     * Get Image from a public url
     *
     * @param string $url
     * @return Image
     */
    private function getImageFileFromPublicUrl(string $url)
    {
        $path = str_replace(config('app.url') . '/storage', '', $url);
        $file = Storage::disk('public')->get($path);
        return Image::make($file);
    }
}

class TestModelHasImage extends TestModel
{
    use HasImages;
    
    protected $imageMaxWidth = 300;
    protected $imageStoragePath = 'test';
}
