// const formu = document.querySelector('contformu');
// const input = document.querySelector('#formulario');

// formu.addEventListener('focus', function() {
//     formu.classList.add('cambiaformu');
//     });

// input.addEventListener('focus', function() {
//     input.classList.add('cambiaformu');
//     });


// validacion de campos
function validarCampos() {
    var campos = document.querySelectorAll('input, select, formu, textarea');
    var camposValidados = true;

    for (var i = 0; i < campos.length; i++) {
        if (campos[i].name!== 'obs' && campos[i].value === '') {
            camposValidados = false;
            break;
        }
    }

    if (camposValidados) {
        location.reload("index.php");
    }
    else{
        
    }
}



// Muentra de carteles de error
var formulario = document.getElementsByClassName('formu');
formulario.addEventListener('submit', function(event) 
{
    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;

    if (nombre === '' || email === '') {
        event.preventDefault();
        document.getElementById('mensajeError').style.display = 'block';
    }
});