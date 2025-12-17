<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Customers
$routes->resource('customers', ['controller' => 'CustomersController']);
// $routes->get('customers', 'CustomersController::index');

// Projects
$routes->resource('projects', ['controller' => 'ProjectsController']);

// Tasks
$routes->resource('tasks', ['controller' => 'TasksController']);

// Página de inicio
// $routes->get('/', 'Home::index');
$routes->get('/', 'Home::index');