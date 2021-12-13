<?php

namespace Naventum\NaventumAuth\Illuminate\Foundation\Controllers;

use Naventum\NaventumAuth\Path;
use Naventum\Framework\Illuminate\Foundation\Support\BaseController;
use Naventum\Framework\Illuminate\Support\Paths;

class Controller extends BaseController
{
    public $paths;

    public function __construct()
    {
        $this->paths = Paths::generate(Path::basePath());
    }
}
