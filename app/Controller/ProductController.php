<?php

namespace App\Controller;

use Engine\Core\AbstractController;

class ProductController extends AbstractController
{
  public function index()
  {
    echo 'ProductController - action: index';
  }

  public function all()
  {
    echo 'ProductController - action: all';
  }
}