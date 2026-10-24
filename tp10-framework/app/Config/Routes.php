<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// ============================================================
// TP10 - Parte B: modulo Disciplinas dentro del framework
// El enrutador de CI4 mapea cada URI a un metodo del controlador.
// ============================================================
$routes->get('disciplinas', 'Disciplinas::index');
$routes->get('disciplinas/nueva', 'Disciplinas::nueva');
$routes->post('disciplinas/guardar', 'Disciplinas::guardar');
$routes->get('disciplinas/editar/(:num)', 'Disciplinas::editar/$1');
$routes->post('disciplinas/actualizar/(:num)', 'Disciplinas::actualizar/$1');
$routes->get('disciplinas/borrar/(:num)', 'Disciplinas::borrar/$1');

// API REST simple: el mismo modulo expuesto como JSON
$routes->get('api/disciplinas', 'Disciplinas::api');
