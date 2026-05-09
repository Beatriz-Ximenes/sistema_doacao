<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cliente', 'Cliente::index');
$routes->get('cliente/cadastrar', 'Cliente::cadastrar');
$routes->post('cliente/salvar', 'Cliente::salvar');
$routes->get('cliente/login', 'Cliente::login');
$routes->post('cliente/autenticar', 'Cliente::autenticar');
$routes->get('cliente/logout', 'Cliente::logout');

$routes->get('cliente', 'Cliente::index');

$routes->get('doador', 'Doador::index');
$routes->get('doador/cadastrar', 'Doador::cadastrar');
$routes->post('doador/salvar', 'Doador::salvar');

$routes->get('doador/roupas/cadastrar', 'Doador::cadastrarRoupa');
$routes->post('doador/roupas/salvar', 'Doador::salvarRoupa');

$routes->get('doador/login', 'Doador::login');
$routes->post('doador/autenticar', 'Doador::autenticar');
$routes->get('doador/logout', 'Doador::logout');

$routes->get('doador', 'Doador::index');

$routes->get('doador', 'Doador::index');
$routes->get('doador/interessados', 'Doador::interessados');


$routes->get('doador/roupa', 'Doador::roupas');
$routes->get('doador/roupa/cadastrar', 'Doador::cadastrarRoupa');
$routes->post('doador/roupa/salvar', 'Doador::salvarRoupa');
$routes->get('doador/roupa/excluir/(:num)', 'Doador::excluirRoupa/$1');

$routes->get('cliente/catalogo', 'Cliente::catalogo');

$routes->get('cliente/detalhes/(:num)', 'Cliente::detalhes/$1');    

$routes->post('cliente/interesse/(:num)', 'Cliente::interesse/$1');

$routes->get('doador/verificar/(:num)', 'Doador::verificar/$1');
$routes->get('cliente/verificar/(:num)', 'Cliente::verificar/$1');


$routes->post('doador/reenviar', 'Doador::reenviarCodigo');

$routes->post('doador/confirmar', 'Doador::confirmar'); 

$routes->post('doador/doar/(:num)', 'Doador::marcarDoado/$1');