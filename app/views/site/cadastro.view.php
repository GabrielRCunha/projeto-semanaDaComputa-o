<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header('Location: /login');
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Curso Semana Computação</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <main class="container">
        <div class="apresentacao">
            <img src="" alt="Logo code">
            <h2>Bem-vindo! Faça seu cadastro em nosso sistema</h2>
            <img src="" alt="Macacode">
        </div>
        <form id="form" class="formulario" action="/cadastro" method="POST" enctype="multipart/form-data">   
                <div class="titulo">
                    <h3>Cadastro</h3>
                </div>

                <div class="linhaInput">
                    <div class="containerInput">
                        <input type="text" name="nome" id="" class="input" required>
                        <label class="labelLine">Digite seu nome</label>
                    </div>
                    <div class="containerInput">
                        <input type="date" name="data_nascimento" class="input" required>
                    </div>
                </div>

                <div class="linhaInput">
                    <div class="containerInput">
                        <input type="email" name="email" class="input" required>
                        <label class="labelLine">Digite seu email</label>
                    </div>
                    <div class="containerInput">
                        <input type="text" name="telefone" class="input" required>
                        <label class="labelLine">Digite seu telefone</div>
                    </div>
                </div>

                <div class="linhaInput">
                    <div class="containerInput">
                        <input type="text" name="cpf" class="input" required>
                        <label class="labelLine">Insira seu cpf</label>
                    </div>
                    
                    <div class="containerInput">
                        <input type="text" name="rg" class="input" required>
                        <label class="labelLine">Digite seu RG</label>
                    </div>
                </div>

                <div class="linhaInput wideInput">
                    <div class="containerInput wideInput">
                        <textarea  id="textarea" name="descricao" required></textarea>
                        <label class="labelLine">Insira a descrição</label>
                    </div>
                </div>

                <div class="linhaInput">
                    <div class="containerInput">
                        <input type="password" name="senha" class="inputSenha" id="inputSenha" required>
                        <label class="labelLine">Digite sua senha</label>
                        <i class="bi bi-eye" id="olhoSenha" onclick="mostrarSenha('olhoSenha', 'inputSenha')"></i>
                    </div>
                    <div class="containerInput">
                        <input type="password" class="inputSenha" id="inputConfirma" required>
                        <label class="labelLine">Confirme sua senha</label>
                        <i class="bi bi-eye" id="olhoConfirma" onclick="mostrarSenha('olhoConfirma', 'inputConfirma')"></i>
                    </div>
                </div>

                <div class="linhaBotao">
                    <span id="erroSenha" >A SENHA E SUA CONFIRMAÇÃO DEVEM SER IGUAIS</span>
                    <button type="submit" onclick="senhaIgual('form', 'inputSenha', 'inputConfirma', 'erroSenha', event)" > CONFIRMAR</button>
                </div>
        </form>
    </main>
</body>
<script src="/public/js/cadastro.js"></script>
</html>