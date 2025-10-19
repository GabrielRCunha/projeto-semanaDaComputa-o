<?php

namespace App\Controllers;
use App\Controllers\CadastroController;
use App\Core\Router;

$router->get('cadastro', 'CadastroController@exibirCadastro');
$router->post('cadastro', 'CadastroController@executaCadastro');