<?php

namespace Engine;

use Engine\DI\DI;
use Engine\Core\Router\Router;

class CMS
{
    private DI $di;
    private Router $router;

    public function __construct(DI $di)
    {
      $this->di = $di;
      $this->router = $this->di->get('router');
    }

    public function run() : void
    {
      $this->router->dispatch($_SERVER['REQUEST_URI']);
    }
}