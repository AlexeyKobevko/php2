<?php

namespace App\Classes;

use App\Traits\SingletonTrait;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Templater
{
    use SingletonTrait;

    public $loader;
    public $twig;

    protected function __construct()
    {
        $this->loader = new FilesystemLoader(TPL_DIR);
        $this->twig = new Environment($this->loader);
    }
}