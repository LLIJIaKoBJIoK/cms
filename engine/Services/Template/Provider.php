<?php

namespace Engine\Services\Template;

use Engine\Core\Template\View;
use Engine\Services\AbstractProvider;

class Provider extends AbstractProvider
{
  private string $serviceName = 'view';

  public function init()
  {
    $service = new View();
    $this->di->add($this->serviceName, $service);
  }
}