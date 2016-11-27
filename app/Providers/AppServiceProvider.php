<?php

namespace App\Providers;

use App\Model\CurlPostTransport;
use App\Model\Infrastructure\HttpPostTransport;
use App\Model\Infrastructure\RemoteFileInfostore;
use App\Model\Infrastructure\RemoteFileInfoUploader;
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
            RemoteFileInfostore::class, PastebinFileInfoStore::class
        );

        $this->app->bind(
            RemoteFileInfoUploader::class, PastebinFileInfoUploader::class
        );

        $this->app->bind(
            Filesystem::class, Storage::class
        );

    }
}
