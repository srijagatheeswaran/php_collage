<?php
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('index', 'Home::index');
$routes->get('admin', 'Admin::index');
$routes->get('students', 'Student::index');
$routes->get('adddept', 'Admin::add');
$routes->get('addstu', 'Student::add');
