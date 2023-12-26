<?php

namespace Engine\Helper;

class Common
{
  public static function getMethod()
  {
    return $_SERVER['REQUEST_METHOD'];
  }

  public static function getUrl()
  {
    $url = $_SERVER['REQUEST_URI'];

    if($position = strpos($url, '?'))
    {
      $url = substr($url, 0, $position);
    }

    return $url;
  }
}