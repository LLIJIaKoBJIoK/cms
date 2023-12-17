<?php

namespace Engine\Core\Router;

class Router
{
  private array $routes;

  public function __construct(array $routes)
  {
    $this->routes = $routes;
  }

  public function dispatch($uri)
  {
    if(array_key_exists($uri, $this->routes))
    {
      $route = $this->routes[$uri];
      call_user_func_array(array($route['controller'], $route['action']), array());
    }
  }
}