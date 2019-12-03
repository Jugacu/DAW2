const h = document.querySelector('#h');
const m = document.querySelector('#m');
const s = document.querySelector('#s');

const ph = document.querySelector('#ph');
const pm = document.querySelector('#pm');

const enableBtn = document.querySelector('#enable');
const disableBtn = document.querySelector('#disable');

const img = document.querySelector('#img');

let ringHour = undefined;
let ringMinute = undefined;

const updateTime = () => {
    const now = new Date();

    h.value = now.getHours();
    m.value = now.getMinutes();
    s.value = now.getSeconds();
};

// Actualización
let updateInterval = setInterval(() => {
    updateTime();

    if(ringHour == h.value && ringMinute == m.value){
        img.style.display = 'block';
    }

}, 1000);
updateTime();

/*
  Botones
*/
enableBtn.addEventListener('click', () => {
    if((ph.value > 23 ||ph.value < 0) || (pm.value > 59 ||pm.value < 0)){
        alert('Introduce una hora válida');
        return;
    }

    ringHour = ph.value;
    ringMinute = pm.value;
    img.style.display = 'none';
});

disableBtn.addEventListener('click', () => {
    ph.value = '';
    pm.value = '';
    ringHour = undefined;
    ringMinute = undefined;
    img.style.display = 'none';
});
