const Tablet = class extends Dispositivo {

    constructor(marca, modelo, color, desc, procesador){
        super(marca, modelo, color, desc)

        this.procesador = procesador;
    }

    verProcesador(){
        super.mostrarDatos();
        this.logger.innerHTML += `<p><b>Procesador</b>: ${this.procesador}</p>`
    }

}