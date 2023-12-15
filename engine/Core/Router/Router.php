<?php

namespace Engine\Core\Router;

class Router
{
  private array $routes;

  public function __construct(array $routes)
  {
    $this->routes = $routes;
  }

  public function dispatch()
  {

  }
}