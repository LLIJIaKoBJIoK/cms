<?php

namespace App\Controller;

use Engine\Core\AbstractController;

class ProductController extends AbstractController
{
  public function index($id)
  {
    print_r('ProductController - action: index' . "<br>");
    print_r("id: " . $id);
  }

  public function all()
  {
    echo 'ProductController - action: all';
  }
}