<?php

namespace Engine\Core\Template;

class Template
{
  protected string $template;
  protected array $parameters;

  public function __construct() {}

  public function loadTemplate(string $template, array $parameters)
  {
    $this->template = $template;
    $this->parameters = $parameters;

    $templatePath = TEMPLATE_DIR . $this->template. '.php';

    if(!file_exists($templatePath))
    {
      return printf("Template '%s' not fount in %s", $template, TEMPLATE_DIR);
    }

    return $this->render();
  }

  public function render()
  {
    ob_start();
    extract($this->parameters);
    include $this->template;
    echo ob_end_clean();
  }
}