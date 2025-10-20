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
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $descricao = $_POST['descricao'];

        $regexNome = "/^[A-Za-zÀ-ÿ\s]+$/";
        $regexEmail = "/^[\w\.-]+@[\w\.-]+\.\w{2,}$/";
        $regexTelefone = "/^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/";
        $regexCPF = "/^\d{3}\.\d{3}\.\d{3}-\d{2}$/";
        $regexRG = "/^\d{1,2}\.?\d{3}\.?\d{3}-?\d{1}$/";

        if(!preg_match($regexNome, $nome)) die("Nome inválido!");
        if(!preg_match($regexEmail, $email)) die("Email inválido!");
        if(!preg_match($regexTelefone, $telefone)) die("Telefone inválido!");
        if(!preg_match($regexCPF, $cpf)) die("CPF inválido!");
        if(!preg_match($regexRG, $rg)) die("RG inválido!");

        $parametros = [
            'nome' => $nome,
            'data_nascimento' => $_POST['data_nascimento'],
            'email' => $email,
            'telefone' => $telefone,
            'cpf' => $cpf,
            'rg' => $rg,
            'descricao' => $descricao,
            'senha' => $_POST['senha'],
        ];
        
        App::get('database')->insert('usuarios', $parametros);
        
        header('Location: /cadastro?sucesso=1');
    }
}