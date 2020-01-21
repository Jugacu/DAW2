const plateContainer = document.querySelector('#c-plato');
const glassContainer = document.querySelector('#c-vaso');
const cutleryContainer = document.querySelector('#c-cubiertos');
const tabletopContainer = document.querySelector('#c-mantelito');


const cutlery = document.querySelector('#cubiertos');
const plate = document.querySelector('#plato');
const glass = document.querySelector('#vaso');
const tabletop = document.querySelector('#mantelito');


draggable(cutlery, [
    {
        container: cutleryContainer,
        onHover: (container, element) => {
            console.log(container)
        }
    }
] );
