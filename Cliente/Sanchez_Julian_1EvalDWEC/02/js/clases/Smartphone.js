const Smartphone = class extends Dispositivo {

    constructor(marca, modelo, color, desc, resolucion){
        super(marca, modelo, color, desc)

        this.resolucion = resolucion;
    }

    verResolucion(){
        super.mostrarDatos();
        this.logger.innerHTML += `<p><b>Resolucion</b>: ${this.resolucion}</p>`
    }

}