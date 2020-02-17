let selectedColor = 'yellow';
let down = false;

window.onmousedown = () => {
    down = true;
};

window.onmouseup = () => {
    down = false;
};

const over = (e) => {
    if (down) {
        e.target.className = `col ${selectedColor}`;
    }
};

const click = (e) => {
    e.target.className = `col ${selectedColor}`;
};

const generateBoard = (w, h) => {
    const drawArea = document.getElementById('drawArea');

    for (let i = 0; i < h; i++) {
        const row = document.createElement('div');
        row.classList.add('row');

        for (let j = 0; j < w; j++) {
            const cell = document.createElement('div');
            cell.classList.add('col', 'default');
            cell.addEventListener('mouseover', over);
            cell.addEventListener('click', click);
            row.append(cell);
        }

        drawArea.append(row);
    }
};

const clearSelector = () => {
    const colors = document.getElementById('colors');
    for (let i = 0; i < colors.children.length; i++) {
        const child = colors.children[i];
        child.classList.remove('selected');
    }
};

const initSelector = () => {
    const colors = document.getElementById('colors');
    for (let i = 0; i < colors.children.length; i++) {
        const child = colors.children[i];
        child.addEventListener('click', (e) => {
            clearSelector();
            e.target.classList.add('selected');
            selectedColor = e.target.className.split(' ')[0];
        });
    }
};

const init = () => {
    initSelector();
    generateBoard(30, 30);
};

window.onload = init;
