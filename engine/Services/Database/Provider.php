<?php

namespace Engine\Services\Database;

use Engine\Services\AbstractProvider;
use Engine\Core\Database\Connection;

class Provider extends AbstractProvider
{
  public string $serviceName = 'db';

  public function init(): void
  {
    $db = new Connection();
    $this->di->add($this->serviceName, $db);
  }
}