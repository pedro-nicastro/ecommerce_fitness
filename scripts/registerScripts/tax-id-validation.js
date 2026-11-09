$(document).ready(function () {
    $('#tax-id').mask('000.000.000-00', { reverse: true });
});

function validateTaxId(value) {
    const digits = value.replace(/\D/g, '');
    const message = document.getElementById('message-tax-id');
    const valid = digits.length === 11 && !/^(.)\1+$/.test(digits);
    message.textContent = valid ? '' : 'Enter a valid Brazilian tax ID (CPF).';
    message.style.color = valid ? '' : 'red';
    return valid;
}
