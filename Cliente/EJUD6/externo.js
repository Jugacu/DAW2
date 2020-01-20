window.onload = iniciar;

function iniciar() {

    document.querySelector('#formulario').addEventListener('submit', validar);

    document.querySelector('#nombre').addEventListener('blur', convertirMayusculas, false);
    document.querySelector('#apellidos').addEventListener('blur', convertirMayusculas, false);

}

function validar(e) {
    if (validarcampostexto(this) && validarEdad() && validarNif() && validarEmail() && validarProvincia() && validarFecha() && validarTelefono() && validarHora() && confirm('¿Deseas enviar el formulario?'))
        return true;
    else {
        e.preventDefault();
        return false;
    }
}


function validarcampostexto(formulario) {
    for (let i = 0; i < formulario.elements.length; i++) {
        formulario.elements[i].classList.remove('error');
        if (formulario.elements[i].type === 'text' && formulario.elements[i].value === '') {
            formulario.elements[i].classList.add('error');
            formulario.elements[i].focus();
            document.querySelector('#errores').innerHTML = 'No puedes dejar campos vacíos.';
            return false;
        }
    }
    return true;
}

function convertirMayusculas() {
    document.querySelector('#nombre').value = document.querySelector('#nombre').value.toUpperCase();
    document.querySelector('#apellidos').value = document.querySelector('#apellidos').value.toUpperCase();
}

function validarEdad() {
    const ageEl = document.querySelector('#edad');
    const age = ageEl.value;


    if (isNaN(age) || age < 0 || age > 105) {
        ageEl.focus();
        ageEl.classList.add('error');
        document.querySelector('#errores').innerHTML = 'La edad ha de estar entre 0 y 105.';
        return false;
    }

    document.getElementById('edad').className = '';
    return true;
}

function validarNif() {
    const nif = document.querySelector('#nif');
    const regExp = /^(\d{8})([A-Z])$/;

    if (!nif.value.match(regExp)) {
        document.querySelector('#errores').innerHTML = 'Has de introducir un NIF válido.';
        nif.focus();
        nif.classList.add('error');
        return false;
    }
    document.getElementById('nif').className = '';
    return true;
}

function validarEmail() {

    const email = document.querySelector('#email');

    const regExp = /^[A-z-.]{2,}@[A-z-.]{2,}[.][A-z-.]{2,4}$/;

    if (!email.value.match(regExp)) {
        document.getElementById('errores').innerHTML = 'ERROR: No es un email válido.';
        document.querySelector('#errores').innerHTML = 'Has de introducir un EMAIL válido.';
        email.focus();
        email.classList.add('error');
        return false;
    }
    document.getElementById('email').className = '';
    return true;
}

function validarProvincia() {
    const prov = document.querySelector('#provincia');

    if (prov.value === '0') {
        document.getElementById('errores').innerHTML = 'ERROR: Has de seleccionar una PROVINCIA';
        prov.focus();
        prov.classList.add('error');
        return false;
    }
    document.getElementById('provincia').className = '';
    return true;
}

function validarFecha() {
    const fecha = document.querySelector('#fecha');
    const regExp = /^[0-9]{2}([-/])[0-9]{2}\1[0-9]{4}$/;

    if (!fecha.value.match(regExp)) {
        document.getElementById('errores').innerHTML = 'ERROR: Has de seleccionar una FECHA válida';
        fecha.focus();
        fecha.classList.add('error');
        return false;
    }
    document.getElementById('fecha').className = '';
    return true;
}

function validarTelefono() {
    const tlf = document.querySelector('#telefono');
    const regExp = /^[69][0-9]{8}$/;

    if (!tlf.value.match(regExp)) {
        document.getElementById('errores').innerHTML = 'ERROR: Has de introducir una TELÉFONO válido';
        tlf.focus();
        tlf.classList.add('error');
        return false;
    }
    // Si llega aquí es que el teléfono es correcto
    document.getElementById("telefono").className = "";
    return true;
}

function validarHora() {
    const hora = document.querySelector('#hora');
    const regExp = /^[0-9]{2}:[0-9]{2}$/;

    if (!hora.value.match(regExp)) {
        document.getElementById('errores').innerHTML = 'ERROR: Has de introducir una HORA válida';
        hora.focus();
        hora.classList.add('error');
        return false;
    }
    // Si llega aquí es que el teléfono es correcto
    document.getElementById("hora").className = "";
    return true;
}