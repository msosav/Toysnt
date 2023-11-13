<?php

namespace App\Providers;

use App\Interfaces\ImageStorage;
use App\Util\ImageLocalStorage;
use App\Util\ImageGCPStorage;
use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImageStorage :: class, function ($app, $params) {
            $storage = $params['storage'];
            if ($storage == 'local') {
            return new ImageLocalstorage();
            } elseif ($storage == 'gcp') {
            return new ImageGCPStorage();}
        });
    }
}
