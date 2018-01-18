<?php
namespace Picshare\Application\Providers;

use Illuminate\Support\ServiceProvider;
use Picshare\Application\Interfaces\Persistence\IPicturesRepository;
use Picshare\Application\Interfaces\Services\IPictureService;
use Picshare\Application\Services\PictureService;
use Picshare\Persistence\Pictures\EloquentPicturesRepository;

/**
 * Class PicshareServiceProvider
 * 
 * @package Picshare\Application\Providers
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-18-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
class PicshareServiceProvider extends ServiceProvider
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
        $this->app->singleton(IPicturesRepository::class, EloquentPicturesRepository::class);
        $this->app->singleton(IPictureService::class, PictureService::class);
    }
}
