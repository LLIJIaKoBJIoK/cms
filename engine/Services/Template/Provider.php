<?php

namespace Engine\Services\Template;

use Engine\Core\Template\Template;
use Engine\Services\AbstractProvider;

class Provider extends AbstractProvider
{
  private string $serviceName = 'template';

  public function init()
  {
    $service = new Template();
    $this->di->add($this->serviceName, $service);
  }
}