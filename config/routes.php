<?php

return [
  '/'             => ['controller' => App\Controller\HomeController::class, 'action' => 'index'],
  '/product/all'  => ['controller' => App\Controller\ProductController::class, 'action' => 'index'],
  '/product/item' => ['controller' => App\Controller\ProductController::class, 'action' => 'item'],
];