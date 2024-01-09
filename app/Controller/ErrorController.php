<?php

namespace App\Controller;

use Engine\Core\AbstractController;

class ErrorController extends AbstractController
{
  public function page404()
  {
    echo 'Error 404. Page not found';
  }
}