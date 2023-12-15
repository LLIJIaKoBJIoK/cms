<?php

namespace Engine;

use Engine\DI\DI;

class CMS
{
    public DI $di;

    public function __construct(DI $di)
    {
      $this->di = $di;
    }

    public function run()
    {
      print_r($this->di);
      echo 'RUN!';
    }
}