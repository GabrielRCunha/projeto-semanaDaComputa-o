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

    let valid = true;

    if(senha.value != confirma.value){
        erro.style.display = "flex";
        valid = false;
    }

    if(!valid) return;

    form.submit();
        
}