const grid = document.querySelector('#grid');
const pieces = document.querySelector('#pieces');

const containers = [];
for (let i = 0; i < grid.children.length; i++) {
    const container = grid.children[i];
    containers.push({
        container,
        condition: (event, element, container) => {
            return container.children.length === 0
        }
    });
}
containers.push({container: pieces});

for (let i = 0; i < pieces.children.length; i++) {
    const piece = pieces.children[i];

    piece.addEventListener('mousedown', () => {
       piece.classList.add('small');
    });

    window.addEventListener('mouseup', () => {
        piece.classList.remove('small');
    });

    draggable(piece, containers);
}
