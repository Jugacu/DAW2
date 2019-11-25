export default class BuildingManager {
    
    constructor() {
        this.buildings = new Map();
    }

    /**
     * @param building Building
     */
    addBuilding(building) {
        this.buildings.set(building, building)
    }

    /**
     * @param building Building
     * @param num_floors int
     * @param num_doors int
     */
    addFloors(building, num_floors, num_doors) {
        if (this.buildings.has(building)) {
            this.buildings.get(building).addFloor(num_floors, num_doors)
        }
    }
}
