import Building from "./buildings/Building.js";

const building = new Building('huesca', 25, 26002);
building.addFloor(5, 7);

building.setDoorOwner('Julián & Billie Eilish', 2, 5);
building.setDoorOwner('Vecinos', 0, 6);
building.setDoorOwner('XDDD', undefined, 6);
building.printStreet();
building.printNumber();
building.printPostal();
building.printFloors();
