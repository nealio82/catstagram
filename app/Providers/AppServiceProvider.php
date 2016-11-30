<?php

namespace App\Providers;

use App\Model\CurlPostTransport;
use App\Model\Contract\HttpPostTransport;
use App\Model\Contract\RemoteFileInfostore;
use App\Model\Contract\RemoteFileInfoUploader;
use App\Model\PastebinFileInfoStore;
use App\Model\PastebinFileInfoUploader;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            HttpPostTransport::class, CurlPostTransport::class
        );

        $this->app->bind(
            RemoteFileInfostore::class, function () {

            $url = env('PASTEBIN_URI');
            $key = env('PASTEBIN_KEY');

            return new PastebinFileInfoStore(new CurlPostTransport(), $key, $url);
        }
        );


        $this->app->bind(
            RemoteFileInfoUploader::class, PastebinFileInfoUploader::class
        );

        $this->app->bind(
            Filesystem::class, Storage::class
        );

    }

}
