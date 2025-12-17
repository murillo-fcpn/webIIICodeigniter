<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Customers
// $routes->resource('customers', ['controller' => 'CustomersController']);

// Projects
// $routes->resource('projects', ['controller' => 'ProjectsController']);

// Tasks
// $routes->resource('tasks', ['controller' => 'TasksController']);

// Página de inicio
// $routes->get('/', 'Home::index');