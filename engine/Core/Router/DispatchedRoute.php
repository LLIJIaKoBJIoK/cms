<?php

namespace Engine\Core\Router;

class DispatchedRoute
{
  private string $controller;
  private array $parameters;

  public function __construct($controller, $parameters = [])
  {
    $this->controller = $controller;
    $this->parameters = $parameters;
  }

  /**
   * @return string
   */
  public function getController(): string
  {
    return $this->controller;
  }

  /**
   * @return array
   */
  public function getParameters(): array
  {
    return $this->parameters;
  }
}