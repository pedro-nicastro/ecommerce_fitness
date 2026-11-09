function checkEmail() {
    const message = document.getElementById('message-email');
    const email = document.getElementById('email').value;
    const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    message.textContent = isValid ? '' : 'Enter a valid email address.';
    message.style.color = isValid ? '' : 'red';
    return isValid;
}
