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
      $this->router->add('contact', '/contact', 'HomeController/contact', 'GET');

      $dispatcher = $this->router->dispatch(Common::getMethod(), Common::getUrl());
      list($class, $action) = explode('/', $dispatcher->getController());
      $controller = 'App\\Controller\\' . $class;
      call_user_func_array([new $controller($this->di), $action], $dispatcher->getParameters());
      //print_r($dispatcher);
    }
}