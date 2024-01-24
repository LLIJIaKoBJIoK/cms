<?php

namespace Engine\Core;

use Engine\DI\DI;
use Engine\Core\Template\View;

class AbstractController
{
  protected DI $di;
  protected View $view;

  public function __construct(DI $di)
  {
    $this->di = $di;
  }

  protected function renderView()
  {

  }

  protected function render(string $template, array $parameters = [])
  {

  }
}