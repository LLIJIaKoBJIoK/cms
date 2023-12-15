<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\DI\DI;
use Engine\CMS;

try {
  $di  = new DI();

  $services = require_once __DIR__ . '/../config/services.php';
  foreach ($services as $service)
  {
    $provider = new $service($di);
    $provider->init();
  }

  $cms = new CMS($di);
  $cms->run();

} catch (ErrorException $exception) {
  echo $exception->getMessage();
}