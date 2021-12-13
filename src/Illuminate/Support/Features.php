<?php

namespace Naventum\NaventumAuth\Illuminate\Support;

use Naventum\Framework\Illuminate\Support\Config;

class Features
{
    const LOGIN = 'login';

    const REGISTER = 'register';

    public static function login()
    {
        return static::config()->features->{static::LOGIN};
    }

    public static function register()
    {
        return static::config()->features->{static::REGISTER};
    }

    private static function config()
    {
        return Config::make('naventum-auth', __DIR__ . '/../../config/')->config();
    }
}
