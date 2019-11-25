import Doors from "./Doors.js";

export default class Building {

    /**
     * @param street string
     * @param number number
     * @param postal number
     */
    constructor(street, number, postal) {
        this.street = street;
        this.number = number;
        this.postal = postal;
        this.floors = [];
    }

    addFloor(num_floors, num_doors) {
        for (let i = 0; i < num_floors; i++) {
            const doors = [];
            this.floors.push(doors);
            for (let j = 0; j < num_doors; j++) {
                doors.push(new Doors(j, undefined))
            }
        }
        console.log(this.floors)
    }
}
