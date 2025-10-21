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
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = "32999999999";
        $cpf = "111.111.111-11";
        $rg = $_POST['rg'];
        $descricao = "descrição teste";

        $regexNome = "/^[A-Za-zÀ-ÿ\s]+$/";
        $regexEmail = "/^[\w\.-]+@[\w\.-]+\.\w{2,}$/";
        $regexRG_final = "/(?:^\d{1,2}\.?\d{3}\.?\d{3}-[\dXx]$|^\d{1,2}\.?\d{3}\.?\d{3}$)/";

        if(!preg_match($regexNome, $nome)) die("Nome inválido!");
        if(!preg_match($regexEmail, $email)) die("Email inválido!");
        if(!preg_match($regexRG_final, $rg)) die("RG inválido!");

        $senhaCriptografada = password_hash($_POST['senha'], PASSWORD_BCRYPT);

        $parametros = [
            'nome' => $nome,
            'data_nascimento' => $_POST['data_nascimento'],
            'email' => $email,
            'telefone' => $telefone,
            'cpf' => $cpf,
            'rg' => $rg,
            'descricao' => $descricao,
            'senha' => $senhaCriptografada,
        ];
        
        App::get('database')->insert('usuarios', $parametros);
        
        header('Location: /cadastro?sucesso=1');
    }

}