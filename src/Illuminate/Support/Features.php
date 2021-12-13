<?php

namespace Naventum\NaventumAuth\Illuminate\Support;

use Naventum\Framework\Illuminate\Support\Config;

class Features
{
    public static function hasLogin()
    {
        return static::config()->features->login;
    }

    public static function hasRegister()
    {
        return static::config()->features->register;
    }

    private static function config()
    {
        return Config::make('naventum-auth', __DIR__ . '/../../config/')->config();
    }
}
