<?php

namespace App\Controller;

use Engine\Core\AbstractController;

class ProductController extends AbstractController
{
  public function index($id)
  {
    $this->render( 'layout', [
      'id' => $id,
    ]);
  }

  public function all()
  {
    echo 'ProductController - action: all';
  }

  public function test($slug, $id)
  {
    $this->render( __DIR__  . '/../Templates/layout.php', [
      'slug' => $slug,
      'id'   => $id,
    ]);
  }

}