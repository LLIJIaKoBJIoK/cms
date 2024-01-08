<?php

namespace Engine\Core;

use Engine\DI\DI;

class AbstractController
{
  protected DI $di;

  public function __construct(DI $di)
  {
    $this->di = $di;
  }
}