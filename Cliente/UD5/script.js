import Building from "./buildings/Building.js";
import BuildingManager from "./buildings/BuildingManager.js";

const building = new Building('huesca', 25, 26002);
const manager = new BuildingManager();

manager.addBuilding(building);

manager.addFloors(building, 5, 6);
