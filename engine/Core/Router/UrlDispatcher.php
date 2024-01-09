<?php

namespace Engine\Core\Router;

class UrlDispatcher
{
  private array $methods =[
    'GET',
    'POST'
  ];

  private array $routes = [
    'GET'  => [],
    'POST' => []
  ];

  private array $pattern = [
    'int' => '[0-9]+',
    'str' => '[a-zA-Z\.\-_%]+',
  ];

  public function addPattern($key, $pattern)
  {
    $this->pattern[$key] = $pattern;
  }

  private function routes($method)
  {
    return $this->routes[$method] ?? [];
  }

  public function register($method, $pattern, $controller)
  {
    $this->routes[$method][$pattern] = $controller;
  }

  public function dispatch($method, $uri)
  {
    $routes = $this->routes($method);

    if(array_key_exists($uri, $routes))
    {
      return new DispatchedRoute($routes[$uri]);
    }

    return $this->doDispatch($method, $uri);
  }

  private function doDispatch($method, $uri)
  {
    foreach ($this->routes($method) as $route => $controller) {
      $pattern = '#^' . $route . '$#s';
      print_r($pattern);

      if (preg_match($pattern, $uri, $parameters))
      {
        return new DispatchedRoute($controller, $parameters);
      }
    }
  }
}