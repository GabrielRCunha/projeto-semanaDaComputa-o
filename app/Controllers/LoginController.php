<?php 

namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController {
    public function exibirLogin(){
        session_start();

        if(isset($_SESSION['id'])){
            header('Location: /cadastro');
        }

        return view('site/login');
    }

    public function executalogin(){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = App::get(key: 'database')->verificaLogin($email, $senha);

        if($usuario != false){
            session_start();
            $_SESSION['id'] = $usuario->id;
            $_SESSION['usuario'] = $usuario;
            header('Location: /cadastro');
        }
        else {
            session_start();
            $_SESSION['mesnagem-erro'] = "Email e/ou senha incorretos";
            header('Location: /login');
        }
    }

    public function executaLogout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: /login');
    }
}