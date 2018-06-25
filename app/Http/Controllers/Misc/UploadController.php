<?php

namespace App\Http\Controllers\Misc;

use Illuminate\Http\Request;
use App\Utils\ImageManipulator;
use App\Http\Requests\Upload\UploadRequest;
use App\Http\Requests\Upload\UploadRichTextImageRequest;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /**
     * Upload a file in a temp folder
     *
     * @param UploadRequest $request
     * @return \Illuminate\Http\Response
     */
    public function toTemp(UploadRequest $request)
    {
        $url = $request->file('file')->store('temp');
        return substr($url, strrpos($url, '/') + 1);
    }

    /**
     * Upload and compress a rich text image
     *
     * @param UploadRichTextImageRequest $request
     * @return string image path
     */
    public function richTextImage(UploadRichTextImageRequest $request)
    {
        $url = $request->file('file')->store('temp');

        $imageManipulator = new ImageManipulator();
        
        $imageManipulator->setCompressionFactor(70);
        $imageManipulator->setMaxWidth(800);
        $imageManipulator->setStoragePath('/rich_text');

        return $imageManipulator->save(storage_path('app/' . $url));
    }
}
