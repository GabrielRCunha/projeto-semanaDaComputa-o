function mostrarSenha(idOlho, idSenha){
    const olho = document.getElementById(idOlho);
    const input = document.getElementById(idSenha);

    if(input.type === "text"){
        input.setAttribute("type", "password");
        olho.classList.replace("bi-eye-slash", "bi-eye")
    } else{
        input.setAttribute("type", "text");
        olho.classList.replace("bi-eye", "bi-eye-slash")
    }
}

function senhaIgual(idForm, idSenha, idConfirma, idErro, event){
    event.preventDefault();

    const senha = document.getElementById(idSenha);
    const confirma = document.getElementById(idConfirma);
    const erro = document.getElementById(idErro);
    const form = document.getElementById(idForm);

    const camposValidos = validarCampos('erroSenha');
    if(!camposValidos) return; 

    if(senha.value.trim() === "" || confirma.value.trim() === ""){
        erro.style.display = "flex";
        erro.textContent = "Os campos de senha não podem ficar vazios!";
        return;
    } else if(senha.value !== confirma.value){
        erro.style.display = "flex";
        erro.textContent = "A senha e sua confirmação devem ser iguais!";
        return;
    } else {
        erro.style.display = "none";
    }

    form.submit();
}

function validarCampos(idErro){
    const erro = document.getElementById(idErro);

    const nome = document.getElementsByName('nome')[0].value.trim();
    const dataNasc = document.getElementsByName('data_nascimento')[0].value.trim();
    const email = document.getElementsByName('email')[0].value.trim();
    const telefone = document.getElementsByName('telefone')[0].value.trim();
    const cpf = document.getElementsByName('cpf')[0].value.trim();
    const rg = document.getElementsByName('rg')[0].value.trim();

    const regexNome = /^[A-Za-zÀ-ÿ\s]+$/;
    const regexEmail = /^[\w\.-]+@[\w\.-]+\.\w{2,}$/;
    const regexTelefone = /^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/;
    const regexCPF = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;
    const regexRG = /^\d{1,2}\.?\d{3}\.?\d{3}-?\d{1}$/;

    if(!regexNome.test(nome)){
        erro.style.display = "flex";
        erro.textContent = "Nome inválido! Use apenas letras e espaços.";
        return false;
    }

    if(dataNasc === ""){
        erro.style.display = "flex";
        erro.textContent = "A data de nascimento não pode ficar vazia!";
        return false;
    }

    if(!regexEmail.test(email)){
        erro.style.display = "flex";
        erro.textContent = "Email inválido!";
        return false;
    }

    if(!regexTelefone.test(telefone)){
        erro.style.display = "flex";
        erro.textContent = "Telefone inválido! Formato esperado: (11) 91234-5678 ou 11912345678";
        return false;
    }

    if(!regexCPF.test(cpf)){
        erro.style.display = "flex";
        erro.textContent = "CPF inválido! Formato esperado: 000.000.000-00";
        return false;
    }

    if(!regexRG.test(rg)){
        erro.style.display = "flex";
        erro.textContent = "RG inválido! Formato esperado: 12.345.678-93";
        return false;
    }

    erro.style.display = "none";
    return true;
}