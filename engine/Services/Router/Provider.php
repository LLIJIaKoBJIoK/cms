<?php

namespace Engine\Services\Router;

use Engine\Services\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
  public string $serviceName = 'router';

  /**
   * @return void
   */
  public function init()
  {
    $router = new Router('localhost');
    $this->di->add($this->serviceName, $router);
  }
}