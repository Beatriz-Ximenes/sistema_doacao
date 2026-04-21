<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cliente', 'Cliente::index');
$routes->get('/cliente', 'Cliente::index');
$routes->get('/cliente/cadastrar', 'Cliente::cadastrar');
    
