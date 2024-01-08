<?php

namespace App\Controller;

use Engine\Core\AbstractController;
use Engine\DI\DI;

class HomeController extends AbstractController
{
  public function __construct(DI $di)
  {
    parent::__construct($di);
  }

  public function index()
  {
    echo 'HomeController - action: index';
  }

  public function contact()
  {
    echo 'HomeController - action: contact';
  }
}