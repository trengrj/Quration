<?php
use Cake\Routing\Router;

Router::plugin('Places', function ($routes) {
    $routes->extensions(['json']);

    $routes->fallbacks();

    $routes->prefix('admin', function ($routes) {
        $routes->fallbacks();
    });
});
