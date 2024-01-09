<?php

namespace Engine;

use Engine\DI\DI;
use Engine\Core\Router\DispatchedRoute;
use Engine\Core\Router\Router;
use Engine\Helper\Common;

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
    try{
      $this->router->add('home', '/', 'HomeController/index', 'GET');
      $this->router->add('contact', '/contact', 'HomeController/contact', 'GET');

      $dispatcher = $this->router->dispatch(Common::getMethod(), Common::getUrl());
      $routeNamespace = 'App\\Controller\\';

      if ($dispatcher == null)
        {
          $routeNamespace = 'Engine\\Core\\';
          $dispatcher = new DispatchedRoute('ErrorController/page404');
        }

        list($class, $action) = explode('/', $dispatcher->getController());
        $controller = $routeNamespace . $class;
        call_user_func_array([new $controller($this->di), $action], $dispatcher->getParameters());
        //print_r($dispatcher);
      } catch (\ErrorException $exception)
      {
        echo $exception->getMessage();
      }
    }
}