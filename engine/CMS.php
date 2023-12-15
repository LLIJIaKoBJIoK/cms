<?php

namespace Engine;

use Engine\DI\DI;

class CMS
{
    private DI $di;
    private $router;

    public function __construct(DI $di)
    {
      $this->di = $di;
      $this->router = $this->di->get('router');
    }

    public function run() : void
    {
      print_r($this->router);
    }
}