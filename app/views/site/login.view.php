<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="cabecalho">
            <img src="/public/assets/code-logo.png" alt="">
        </div>
        <form action="/login" class="formulario" method="POST">
            <label for="email" style="display: block;">digite seu e-mail</label>
            <input type="text" name="email" class="input">
            <label for="senha">Digite sua senha</label>
            <input type="password" name="senha" class="input" id="inputSenha">
            <i class="bi bi-eye" id="olho" onclick="mostrarSenha('olho', 'inputSenha')"></i>
            <p>
                <?php 
                    if(isset($_SESSION['mensagem-erro']))
                    echo $_SESSION['mensagem-erro'];
                    unset($_SESSION['mensagem-erro']);
                ?>
            </p>
            <button type="submit">Entrar</button>
        </form>
    </div>
    
</body>
<script src="/public/js/cadastro.js"></script>
</html>