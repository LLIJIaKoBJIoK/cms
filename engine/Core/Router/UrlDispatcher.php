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
    'id'  => '[0-9]+',
    'int' => '[0-9]+',
    'str' => '[a-zA-Z\.\-_%]+',
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
    $convert = $this->convertPattern($pattern);
    $this->routes[$method][$convert] = $controller;
  }

  private function convertPattern($pattern)
  {
    if(strpos($pattern, '{') === false)
    {
      return $pattern;
    }
    return preg_replace_callback('(\w+)', [$this, 'replacePattern'], $pattern);
  }

  private function replacePattern($matches)
  {
    print_r($matches);
    //return strtr($matches[1], [$matches[1], $this->pattern]);
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
      $pattern = '#^' . $route . '$#s';

      if (preg_match($pattern, $uri, $parameters))
      {
        return new DispatchedRoute($controller, $parameters);
      }
    }
  }
}