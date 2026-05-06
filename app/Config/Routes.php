<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cliente', 'Cliente::index');
$routes->get('/cliente', 'Cliente::index');
$routes->get('/cliente/cadastrar', 'Cliente::cadastrar');
$routes->post('cliente/salvar', 'Cliente::salvar');
$routes->get('cliente/login', 'Cliente::login');
$routes->post('cliente/autenticar', 'Cliente::autenticar');
$routes->get('cliente/logout', 'Cliente::logout');

$routes->get('cliente', 'Cliente::index');
$routes->get('cliente/cadastrar', 'Cliente::cadastrar');

$routes->get('doador', 'Doador::index');
$routes->get('doador/cadastrar', 'Doador::cadastrar');
$routes->post('doador/salvar', 'Doador::salvar');

$routes->get('doador/roupas/cadastrar', 'Doador::cadastrarRoupa');
$routes->post('doador/roupas/salvar', 'Doador::salvarRoupa');