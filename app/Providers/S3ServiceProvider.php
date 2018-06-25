<?php

namespace App\Providers;

use Storage;
use Illuminate\Support\ServiceProvider;

use Aws\S3\S3Client;
use League\Flysystem\Filesystem;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

class S3ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('s3', function ($app, $config) {
            $client = new S3Client([
              'credentials' => [
                  'key'    => $config['key'],
                  'secret' => $config['secret']
              ],
              'region' => $config['region'],
              'version' => 'latest|version',
            ]);

            return new Filesystem(new AwsS3Adapter($client, $config['bucket']));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
