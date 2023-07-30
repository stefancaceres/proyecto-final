
// Muestra de carteles de error
var formulario = document.getElementsByClassName('botonformu');
formulario.addEventListener('submit', function(event) 
{
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;

    if (nombre === '' || apellido === '') {
        event.preventDefault();
        document.getElementById('mensajeError').style.display = 'block';
    }
});