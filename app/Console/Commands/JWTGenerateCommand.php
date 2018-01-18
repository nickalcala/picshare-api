<?php

namespace App\Console\Commands;

use Tymon\JWTAuth\Commands\JWTGenerateCommand as BaseJWTGenerateCommand;

/**
 * Fix tymon/jwt-auth jwt:generate.
 * 
 * @package App\Console\Commands
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-18-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
class JWTGenerateCommand extends BaseJWTGenerateCommand
{
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->fire();
    }
}