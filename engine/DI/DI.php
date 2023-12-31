<?php

namespace Engine\DI;

class DI
{
  private array $container = [];

  public function add($key, $value) : void
  {
    $this->container[$key] = $value;
  }

  public function get($key)
  {
    return $this->container[$key] ?? null;
  }
}