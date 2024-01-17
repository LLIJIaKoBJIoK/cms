<?php

namespace Engine\Core\Router;

class UrlDispatcher
{

  private array $routes = [
    'GET'  => [],
    'POST' => []
  ];

  private array $patterns = [
    '{id}'    => '(?<id>[0-9]+)',
    '{slug}'  => '(?<slug>[a-z0-9_-]+)',
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
    $convert = $this->findPattern($pattern);
    $this->routes[$method][$convert] = $controller;
  }

  /**
   * @param $pattern
   * @return array|mixed|string|string[]|null
   */
  private function findPattern($pattern)
  {
    if(strpos($pattern, '{') === false)
    {
      return $pattern;
    }
    return preg_replace_callback('/\{(\w+)}/', [$this, 'replacePattern'], $pattern);
  }

  /**
   * @param $matches
   * @return mixed|string|null
   */
  private function replacePattern($matches)
  {
    foreach ($matches as $key)
    {
      if (array_key_exists($key, $this->patterns))
      {
        return $this->patterns[$key];
      }
    }

    return null;
  }

  /**
   * @param $param
   * @return mixed
   */
  private function clearParameters($param)
  {
    foreach ($param as $key => $value)
    {
      if(!is_int($key) or $key == 0)
      {
        unset($param[$key]);
      }
    }

    return $param;
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
        return new DispatchedRoute($controller, $this->clearParameters($parameters));
      }
    }
  }
}