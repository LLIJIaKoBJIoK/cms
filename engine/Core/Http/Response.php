<?php

namespace Engine\Core\Http;

class Response
{
  protected string $content;

  /**
   * @param $content
   */
  public function __construct($content)
  {
    $this->content = $content;
  }

  /**
   * @param $content
   * @return $this
   */
  public function setContent($content) : Response
  {
    $this->content = $content;

    return $this;
  }

  /**
   * @return void
   */
  public function send()
  {
    echo $this->content;
  }

}