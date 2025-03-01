<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\Kadasters;
use App\Controllers\Artikels;

/**
 * @var RouteCollection $routes
 */
$routes->get('kadasters', [Kadasters::class, 'index']);
$routes->get('kadasters/new', [Kadasters::class, 'new']);
$routes->post('kadasters', [Kadasters::class, 'create']);
$routes->get('kadasters/(:segment)', [Kadasters::class, 'show']);

$routes->get('artikelen', [Artikels::class, 'index']);
$routes->get('artikelen/new', [Artikels::class, 'new']);
$routes->post('artikelen', [Artikels::class, 'create']);
$routes->get('artikelen/(:segment)', [Artikels::class, 'show']);


$routes->get('/', 'Home::index');
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

