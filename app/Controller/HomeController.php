<?php

namespace App\Controller;

use Engine\Core\AbstractController;

class HomeController extends AbstractController
{
  public function index()
  {
    echo 'HomeController - action: index';
  }

  public function contact()
  {
    echo 'HomeController - action: contact';
  }
}