const form = document.querySelector('form');
const input = document.querySelector('#formulario');

form.addEventListener('focus', function() {
    form.classList.add('cambiaformu');
    });

input.addEventListener('focus', function() {
    input.classList.add('cambiaformu');
    });