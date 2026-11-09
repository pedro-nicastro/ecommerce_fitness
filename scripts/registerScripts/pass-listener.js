/* js document */
function checkPassword() {
    var password = document.getElementById("pass").value;
    var confirmPassword = document.getElementById("pass-listener").value;
    var message = document.getElementById("message-pass");

    if (password === confirmPassword) {
      message.innerHTML = "";
    } else {
      message.innerHTML = "*As senhas não coincidem.*";
      message.style.color = "red";
    }
  }