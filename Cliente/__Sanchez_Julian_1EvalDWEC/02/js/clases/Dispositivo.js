const Dispositivo = class {

    constructor(marca, modelo, color, desc){
        this.marca = marca;
        this.modelo = modelo;
        this.color = color;
        this.desc = desc;
        
        this.logger = document.querySelector('#logger');
    }

    mostrarDatos() {
        this.logger.innerHTML += `<p>
        <b>Marca: </b> ${this.marca}, <b>Modelo: </b> ${this.modelo}, <b>Color: </b> ${this.color}, <b>Descripcion: </b> ${this.desc}
        </p>`
    }

}