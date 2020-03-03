/*
@author Julián Sánchez
@version Examen 3 de marzo 2020
 */


const drag = document.querySelector('#drag');
const bottom = document.querySelector('#bottom');

const arr = [];
const containers = document.querySelectorAll('.container');

for (let i = 0; i < containers.length; i++) {
    const container = containers[i];
    arr.push({
        container,
        condition: (event, element, container) => {
             jugacu.draggable(element, arr);
            return container.childNodes.length === 0;
        }
    });
}

jugacu.draggable(drag, arr, {
    ghostMode: true,
    ghostCanDrag: false
});
