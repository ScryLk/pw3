<?php

use CodeIgniter\Router\RouteCollection;


//metodo -> url -> Controller -> Função
$routes->get('/', 'HomeController::index');

//CRIAR UMA PÁGINA SOBRE/CONTATO 
//CRIAR A ROTA

$routes->get('/sobre', 'HomeController::sobre');
$routes->get('/contato', 'HomeController::contato');
$routes->post('cotato/enviar', 'Home::submitContact');

$routes->post('/contato/submit', 'HomeController::submitContact');
