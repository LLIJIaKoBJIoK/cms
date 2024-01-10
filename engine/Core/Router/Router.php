<?php

namespace Engine\Core\Router;

class Router
{
  private array $routes = [];
  private string $host;
  private $dispatcher;

  public function __construct($host)
  {
    $this->host = $host;
  }

  /**
   * @param $key
   * @param $pattern
   * @param $controller
   * @param $method
   * @return void
   */
  public function add($key, $pattern, $controller, string $method = 'GET')
  {
    $this->routes[$key] = [
      'pattern' => $pattern,
      'controller' => $controller,
      'method' => $method
    ];
  }

  /**
   * @param $method
   * @param $uri
   * @return DispatchedRoute|null
   */
  public function dispatch($method, $uri) : DispatchedRoute
  {
    return $this->getUrlDispatcher()->dispatch($method, $uri);
  }

  /**
   * @return UrlDispatcher
   */
  private function getUrlDispatcher() : UrlDispatcher
  {
    if($this->dispatcher == null)
    {
      $this->dispatcher = new UrlDispatcher();

      foreach ($this->routes as $route) {
        $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
      }
    }

    return $this->dispatcher;
  }
}