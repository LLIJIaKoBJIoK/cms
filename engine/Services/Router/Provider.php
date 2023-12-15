<?php

namespace Engine\Services\Router;

use Engine\Services\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
  public string $serviceName = 'router';

  public function init(): void
  {
    $routes = require_once __DIR__ . '/../../../config/routes.php';

    $router = new Router($routes);
    $this->di->add($this->serviceName, $router);
  }
}