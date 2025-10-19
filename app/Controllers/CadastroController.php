<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class CadastroController
{

    public function exibirCadastro()
    {
        return view('site/cadastro');
    }

    public function executaCadastro()
    {
        $parametros = [
            'nome' => $_POST['nome'],
            'data_nascimento' => $_POST['data_nascimento'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
            'cpf' => $_POST['cpf'],
            'rg' => $_POST['rg'],
            'descricao' => $_POST['descricao'],
            'senha' => $_POST['senha'],
        ];
        
        App::get('database')->insert('usuarios', $parametros);
        
        header('Location: /cadastro?sucesso=1');
    }
}