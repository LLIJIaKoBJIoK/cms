<?php

namespace Engine\Core;

use Engine\DI\DI;
use Engine\Core\Template\Template;

class AbstractController
{
  protected DI $di;
  protected Template $template;

  public function __construct(DI $di)
  {
    $this->di = $di;
    $this->di->get('template');
  }

  function render(string $template, array $parameters = [])
  {
    $this->template = new Template();
    $this->template->loadTemplate($template, $parameters);
  }
}