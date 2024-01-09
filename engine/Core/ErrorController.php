<?php

namespace Engine\Core;

class ErrorController extends AbstractController
{
  public function page404()
  {
    echo 'Error 404. Page not found';
  }
}