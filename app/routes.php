<?php

namespace App\Controllers;
use App\Controllers\CadastroController;
use App\Controllers\LoginController;
use App\Core\Router;

$router->get('login', 'LoginController@exibirLogin');
$router->post('login', 'LoginController@executaLogin');
$router->post('logout', 'LoginController@executaLogout');

$router->get('cadastro', 'CadastroController@exibirCadastro');
$router->post('cadastro', 'CadastroController@executaCadastro');
