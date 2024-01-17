<?php

namespace Engine\Services\Router;

use Engine\Services\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
  private string $serviceName = 'router';

  /**
   * @return void
   */
  public function init()
  {
    $service = new Router('localhost');
    $this->di->add($this->serviceName, $service);
  }
}