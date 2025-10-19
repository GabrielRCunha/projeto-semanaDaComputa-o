<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <form action="" method="post" class="formulario" id="form">
            <div class="caixaInput">
                <div class="containerInput">
                    <input type="text" name="name" id="" class="input" required>
                    <div class="labelLine">Digite seu nome</div>
                </div>
                <div class="containerInput">
                    <input type="email" name="email" class="input" required>
                    <div class="labelLine">Digite seu email</div>
                </div>
            </div>
            <div class="caixaInput">
                <div class="containerInputs">
                    <input type="date" class="input">
                </div>
                <div class="containerInputs">
                    <input type="text" class="input" required>
                    <div class="labelLine">Insira a descrição</div>
                </div>
                <div class="containerInputs">
                    <input type="text" class="input" required>
                    <div class="labelLine">Insira seu cpf</div>
                </div>
            </div>
            <div class="caixaInput">
                <div class="containerInput">
                    <input type="text" class="input" required>
                    <div class="labelLine">Digite seu telefone</div>
                </div>
                <div class="containerInput">
                    <input type="text" class="input" required>
                    <div class="labelLine">Digite seu RG</div>
                </div>
            </div>
            <div class="caixaInputVertical">
                <div class="containerVertical">
                    <input type="password" class="inputV" id="inputSenha" placeholder="Digite sua senha" required>
                    <i class="bi bi-eye" id="olhoSenha" onclick="mostrarSenha('olhoSenha', 'inputSenha')"></i>
                </div>
                <div class="containerVertical">
                    <div class="containerInput vertical">
                    <input type="password" class="inputV" id="inputConfirma" placeholder="Confirme sua senha" required>
                    <i class="bi bi-eye" id="olhoConfirma" onclick="mostrarSenha('olhoConfirma', 'inputConfirma')"></i>
                </div>
                </div>
            </div>
            <div class="botaoSubmit">
                <span id="erroSenha" >A SENHA E SUA CONFIRMAÇÃO DEVEM SER IGUAIS</span>
                <button type="submit" onclick="senhaIgual('form', 'inputSenha', 'inputConfirma', 'erroSenha', event)" > CONFIRMAR</button>
            </div>
        </form>
    </div>
</body>
<script src="/public/js/index.js"></script>
</html>