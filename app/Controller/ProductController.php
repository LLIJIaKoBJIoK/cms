<?php

namespace App\Controller;

use Engine\Core\AbstractController;

class ProductController extends AbstractController
{
  public function index($param)
  {
    print_r('ProductController - action: index' . "<br>");
    var_dump($param['slug']);
  }

  public function all()
  {
    echo 'ProductController - action: all';
  }
}