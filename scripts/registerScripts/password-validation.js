function checkPassword() {
    const password = document.getElementById('password').value;
    const confirmation = document.getElementById('confirm-password').value;
    const message = document.getElementById('message-pass');
    const matches = password === confirmation;
    message.textContent = matches ? '' : 'Passwords do not match.';
    message.style.color = matches ? '' : 'red';
    return matches;
}
