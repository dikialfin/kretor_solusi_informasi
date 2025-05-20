<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Guest::index');
$routes->post('/', 'Guest::save');
$routes->get('/admin', 'Admin::index');
$routes->post('/csv', 'Admin::downloadData');
