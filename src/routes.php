<?php
use core\Router;

$router = new Router();

$router->get('/', 'RMOController@index');
$router->post('/', 'RMOController@controle');

$router->get('/api', 'ApiController@apiBase');

$router->get('/sair/{id}', 'RMOController@sair');

$router->post('/inserir', 'RMOController@inserir');

$router->post('/remover/{id}', 'RMOController@remover');

$router->get('/botao', 'RMOController@pontoEletronico');

$router->get('/pontoEletronicoOn', 'RMOController@pontoEletronicoAction');

$router->post('/ativo/{id}', 'RMOController@ativo');

$router->post('/aus/{id}', 'RMOController@aus');

$router->post('/rmo_finalizar', 'RegistrosController@registrar');
$router->post('/rmo_resetar', 'RegistrosController@resetar');

$router->get('/rmo_painel', 'PainelController@index');

