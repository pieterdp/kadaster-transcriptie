<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\Kadasters;
use App\Controllers\Artikels;
use App\Controllers\Perceel;

/**
 * @var RouteCollection $routes
 */
$routes->get('kadasters', [Kadasters::class, 'index']);
$routes->get('kadasters/new', [Kadasters::class, 'new']);
$routes->post('kadasters', [Kadasters::class, 'create']);
$routes->get('kadasters/(:num)', [Kadasters::class, 'show']);

$routes->get('artikelen', [Artikels::class, 'index']);
$routes->get('artikelen/new', [Artikels::class, 'new']);
$routes->post('artikelen', [Artikels::class, 'create']);
$routes->get('artikelen/(:num)', [Artikels::class, 'show']);

$routes->get('artikelen/(:num)/percelen', [Perceel::class, 'index']);
$routes->get('artikelen/(:num)/percelen/new', [Perceel::class, 'new']);
$routes->post('artikelen/(:num)/percelen', [Perceel::class, 'create']);
$routes->get('artikelen/(:num)/percelen/(:num)', [Perceel::class, 'show']);


$routes->get('/', 'Home::index');
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

