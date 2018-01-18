<?php

namespace App\Providers;

use App\Console\Commands\JWTGenerateCommand;
use Tymon\JWTAuth\Providers\JWTAuthServiceProvider as BaseJWTAuthServiceProvider;

/**
 * Fix tymon/jwt-auth jwt:generate.
 *
 * @package App\Console\Commands
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-18-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
class JWTAuthServiceProvider extends BaseJWTAuthServiceProvider
{
    /**
     * Register the Artisan command.
     */
    protected function registerJWTCommand()
    {
        $this->app->singleton('tymon.jwt.generate', function () {
            return new JWTGenerateCommand();
        });
    }
}
