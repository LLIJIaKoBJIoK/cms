<?php

namespace Engine\Core;

use Engine\DI\DI;

class AbstractController
{
  protected DI $di;

  public function __construct(DI $di)
  {
    $this->di = $di;
  }

  protected function renderView(string $template, array $parameters = []) : string
  {
    return $this->di->get('view')->render($template, $parameters);
  }

  protected function render(string $template, array $parameters = []): string
  {
    return $this->renderView($template, $parameters);
  }
}