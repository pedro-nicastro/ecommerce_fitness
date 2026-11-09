/* js document - mail listener */
function checkMail() {
    const message = document.getElementById("message-mail");
    var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    
    var email = document.getElementById("email").value;
    
    if (regex.test(email)) {
        message.innerHTML = "";
        return true;
    } else {
        message.innerHTML = "*O Email é inválido.*";
        message.style.color = "red";
        return false;
    }
}
