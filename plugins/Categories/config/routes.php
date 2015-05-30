<?php
use Cake\Routing\Router;

Router::plugin('Categories', function ($routes) {
    $routes->extensions(['json']);

    $routes->fallbacks();

    $routes->prefix('admin', function ($routes) {
        $routes->fallbacks();
    });
});
