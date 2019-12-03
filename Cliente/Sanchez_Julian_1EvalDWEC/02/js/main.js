const huaweiBtn = document.querySelector('#huaweiBtn');
const samsungBtn = document.querySelector('#samsungBtn');

//Se crea el movil
huaweiBtn.addEventListener('click', () => {
    const huawei = new Smartphone('Huawey', 'P30 Aurora', 'Azul', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias, optio.', '40 MPx');
    huawei.verResolucion()
})

//Se crea la tablet
samsungBtn.addEventListener('click', () => {
    const samsung = new Tablet('Samsung', 'S5e', 'Plata', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias, optio.', 'Qualcom');
    samsung.verProcesador()
})