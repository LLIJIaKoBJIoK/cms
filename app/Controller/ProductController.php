<?php

namespace App\Controller;

use Engine\Core\AbstractController;

class ProductController extends AbstractController
{
  public function index($id)
  {
    print_r('ProductController - action: index' . "<br>");
    print_r($id);
  }

  public function all()
  {
    echo 'ProductController - action: all';
  }

  public function test($slug, $id)
  {
    echo 'ProductController - action: test';
    print_r($slug . "-" . $id);
  }

}