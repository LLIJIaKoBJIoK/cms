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

  private array $patterns = [
    '{id}'  => '([0-9]+)',
  ];

  /**
   * @param $key
   * @param $pattern
   * @return void
   */
  public function addPattern($key, $pattern)
  {
    $this->pattern[$key] = $pattern;
  }

  /**
   * @param $method
   * @return array|mixed
   */
  private function routes($method) : array
  {
    return $this->routes[$method] ?? [];
  }

  /**
   * @param $method
   * @param $pattern
   * @param $controller
   * @return void
   */
  public function register($method, $pattern, $controller)
  {
    $convert = $this->replacePattern($pattern);
    $this->routes[$method][$convert] = $controller;
  }

  /**
   * @param $pattern
   * @return array|mixed|string|string[]|void
   */
  private function replacePattern($pattern)
  {
    foreach ($this->patterns as $key => $value)
    {
      if(strpos($pattern, $key))
      {
        return str_replace($key, $this->patterns[$key], $pattern);
      }

      return $pattern;
    }
  }

  /**
   * @param $method
   * @param $uri
   * @return DispatchedRoute|null
   */
  public function dispatch($method, $uri)
  {
    $routes = $this->routes($method);

    if(array_key_exists($uri, $routes))
    {
      return new DispatchedRoute($routes[$uri]);
    }

    return $this->doDispatch($method, $uri);
  }

  /**
   * @param $method
   * @param $uri
   * @return DispatchedRoute|void
   */
  private function doDispatch($method, $uri)
  {
    foreach ($this->routes($method) as $route => $controller) {
      $pattern = '#^' . $route . '$#';

      if (preg_match($pattern, $uri, $parameters))
      {
        return new DispatchedRoute($controller, $parameters);
      }
    }
  }
}