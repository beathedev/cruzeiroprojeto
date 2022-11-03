//arquivo funcoes_cpf.js
// validador CPF
function verificarCPF(c){
    var i;
    s = c;
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    var v = false;
 
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(10-i);
    }
    if (d1 == 0){
        const validadoElemento = document.getElementById('cpfResposta');
        validadoElemento.classList.add('alert');
        validadoElemento.classList.add('alert-danger');
        validadoElemento.innerText = 'CPF inválido!';
        validadoElemento.setAttribute('role', 'alert')
        v = true;
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
        const validadoElemento = document.getElementById('cpfResposta');
        validadoElemento.classList.add('alert');
        validadoElemento.classList.add('alert-danger');
        validadoElemento.innerText = 'CPF inválido!';
        validadoElemento.setAttribute('role', 'alert')
        v = true;
        return false;
    }
 
    d1 *= 2;
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){
        const validadoElemento = document.getElementById('cpfResposta');
        validadoElemento.classList.add('alert');
        validadoElemento.classList.add('alert-danger');
        validadoElemento.innerText = 'CPF inválido!';
        validadoElemento.setAttribute('role', 'alert')
        v = true;
        return false;
    }
    if (!v) {
     
        const validadoElemento = document.getElementById('cpfResposta');
        validadoElemento.classList.remove('alert-danger');
        validadoElemento.classList.add('alert');
        validadoElemento.classList.add('alert-success');
        validadoElemento.innerText = 'CPF válido!';
        validadoElemento.setAttribute('role', 'alert')

    }
}