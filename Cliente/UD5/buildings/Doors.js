export default class Doors {
    constructor(number, owner) {
        this.number = number;
        this.owner = owner;
    }

    getNumber() {
        return this.number;
    }

    getOwner() {
        return this.owner;
    }

    setNumber(number) {
        this.number = number;
    }

    setOwner(owner) {
        this.owner = owner;
    }
}
