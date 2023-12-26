<?php

namespace Engine\Services\Router;

use Engine\Services\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
  public string $serviceName = 'router';

  public function init(): void
  {
    $router = new Router('localhost');
    $this->di->add($this->serviceName, $router);
  }
}