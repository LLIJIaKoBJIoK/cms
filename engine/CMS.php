<?php

namespace Engine;

use Engine\DI\DI;
use Engine\Helper\Common;
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
      $this->router->add('home', '/', 'HomeController/index', 'GET');
      $this->router->add('contact', '/contact', 'ContactController', 'GET');

      $dispatcher = $this->router->dispatch(Common::getMethod(), Common::getUrl());
      print_r($dispatcher);

    }
}