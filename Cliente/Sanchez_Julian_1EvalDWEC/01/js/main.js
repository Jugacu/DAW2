const logger = document.querySelector('#logger');


const str = prompt('Introduce un string');

// Mitad del string
logger.innerHTML += `<p>Mitad: ${str.slice(0, str.length / 2)}</p>`;
// Ultimo
logger.innerHTML += `<p>Último carácter: ${str.charAt(str.length - 1)}</p>`;
//Al revés
logger.innerHTML += `<p>Reversa: ${str.split("").reverse().join("")}</p>`;

const arr = str.split("");
let dashed = '';
arr.forEach((val, index) => {
    dashed += arr.length - 1 === index ? val : val + '-';
});

//Guiones
logger.innerHTML += `<p>Guion: ${dashed}</p>`;

let counter = 0;
arr.forEach(val => {
    switch (val.toLowerCase()){
        case 'a':
        case 'e':
        case 'i':
        case 'o':
        case 'u':
        counter++;
    }
});


//Vocales
logger.innerHTML += `<p>Vocales: ${counter}</p>`;