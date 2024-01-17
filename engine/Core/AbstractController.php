<?php

namespace Engine\Core;

use Engine\DI\DI;
use Engine\Core\Http\Response;
use Engine\Helper\Common;

class AbstractController
{
  protected DI $di;

  public function __construct(DI $di)
  {
    $this->di = $di;
  }

  /**
   * @param $view
   * @param $parameters
   * @return void
   */
  function render($view, array $parameters = [])
  {
    $content = Common::replaceHTML($view, $parameters);
    $response = new Response($content);
    $response->send();
  }
}