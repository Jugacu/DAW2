import Doors from "./Doors.js";

export default class Building {

    /**
     * @param street string
     * @param number number
     * @param postal number
     */
    constructor(street, number, postal) {
        this.floors = [];
        this.street = street;
        this.number = number;
        this.postal = postal;

        this.logger = document.querySelector('#logs');
        this.logger.innerHTML += `<p>Construido nuevo edificio en calle: ${street} nº: ${number}, C.P.: ${postal} </p>`
    }

    addFloor(num_floors, num_doors) {
        for (let i = 0; i < num_floors; i++) {
            const doors = [];
            this.floors.push(doors);
            for (let j = 0; j < num_doors; j++) {
                doors.push(new Doors(j, undefined))
            }
        }
    }

    setNumber(number) {
        this.number = number;
    }

    setStreet(street) {
        this.street = street;
    }

    setPostal(postal) {
        this.postal = postal;
    }

    printStreet() {
        this.logger.innerHTML += `<p>La calle del edificio nº${this.number} es: ${this.street}</p>`
    }

    printNumber() {
        this.logger.innerHTML += `<p>El número del edificio en ${this.street} es: ${this.number}</p>`
    }

    printPostal() {
        this.logger.innerHTML += `<p>El codigo postal del edificio nº${this.number} es: ${this.postal}</p>`
    }

    setDoorOwner(name, floor_index, door_number) {
        if (floor_index < 0 || !floor_index) {
            this.logger.innerHTML += `<p>NO se pueden introducir número de puertas negativos o nulos.</p>`
            return;
        }

        this.floors[floor_index].forEach((door) => {
            if (door.getNumber() === door_number) {
                door.setOwner(name);
                this.logger.innerHTML += `<p>${name} es ahora el propietario de la puerta ${door_number} de la planta ${floor_index}.</p>`
            }
        })
    }

    printFloors() {
        this.logger.innerHTML += '<p>';
        this.logger.innerHTML += `<strong>Listado de propietarios del edificio calle ${this.street} nº: ${this.number}</strong><br>`
        this.floors.forEach((floor, index) => {
            floor.forEach((door, door_index) => {
                this.logger.innerHTML += `El propietario del piso ${this.number} de la planta ${index} y la puerta ${door_index} es: ${door.getOwner() !== undefined ? door.getOwner() : 'VACÍO'}<br>`
            })
        });
        this.logger.innerHTML += '</p>';
    }
}
