// validation.js

$(document).ready(function(){
  $('#cpf').mask('000.000.000-00', {reverse: true});
});

function cpfListener(cpf) {
  cpf = cpf.replace(/[^\d]+/g, ''); // Remove todos os caracteres não numéricos

  if (cpf.length !== 11 || /^(.)\1+$/.test(cpf)) {
    document.getElementById("message-cpf").innerHTML = "CPF inválido.";
    document.getElementById("message-cpf").style.color = "red";
    return false;
  }
  document.getElementById("message-cpf").innerHTML = "";
  return true;
}
