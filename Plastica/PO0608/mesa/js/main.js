const plateContainer = document.querySelector('#c-plato');
const glassContainer = document.querySelector('#c-vaso');
const cutleryContainer = document.querySelector('#c-cubiertos');
const tabletopContainer = document.querySelector('#c-mantelito');
const table = document.querySelector('#mesa');


const bigTableTop = document.querySelector('#mantel');
const cutlery = document.querySelector('#cubiertos');
const plate = document.querySelector('#plato');
const glass = document.querySelector('#vaso');
const tabletop = document.querySelector('#mantelito');


draggable(bigTableTop, [
    {
        container: table
    }
]);

draggable(tabletop, [
    {
        container: tabletopContainer,
        condition: () => table.children.length === 2
    }
]);

draggable(cutlery, [
    {
        container: cutleryContainer,
        condition: () => tabletopContainer.children.length === 4
    }
]);

draggable(plate, [
    {
        container: plateContainer,
        condition: () => tabletopContainer.children.length === 4
    }
]);


draggable(glass, [
    {
        container: glassContainer,
        condition: () => tabletopContainer.children.length === 4
    }
]);

