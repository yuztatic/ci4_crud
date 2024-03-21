<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// In application/config/routes.php
$routes->get('/students', 'StudentsController::index');
$routes->get('/students/create', 'StudentsController::createStudent');
$routes->get('/students/edit', 'StudentsController::editStudent');
$routes->get('/students/update', 'StudentsController::updateStudent');
$routes->get('/students/delete', 'StudentsController::deleteStudent');  
$routes->post('/students/store', 'StudentsController::storeStudent');




