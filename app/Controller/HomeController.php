<?php

namespace App\Controller;

use Engine\Core\AbstractController;

class HomeController extends AbstractController
{
  public function index()
  {
    echo $this->render('HomeController Template', ['param1' => 'Value']);
  }

  public function contact()
  {
    echo 'HomeController - action: contact';
  }
}