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

  public static function replaceHTML($view, $parameters = [])
  {
    if ($parameters == null)
    {
      return $view;
    }

    $html = file_get_contents($view);

    foreach ($parameters as $key => $value)
    {
      $key = '{' . $key . '}';
      $html = str_replace($key, $value, $html);
    }

    return $html;
  }
}