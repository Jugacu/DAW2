const table = document.querySelector('#tabla');
const cart = document.querySelector('#cesta');

for (let i = 1; i < table.rows.length; i++) {
    const row = table.rows[i];
    const img = row.cells[0].children[0];
    const text = row.cells[1].innerText;

    draggable(img, [
        {
            container: cart,
            condition: (event, element, container) => {

                addToCart(text);
                container.style.opacity = '1';

                return false;
            },
            onHover: (container) => {
                container.style.opacity = '.5';
            },
            onLeave: (container) => {
                container.style.opacity = '1';
            }
        }
    ]);

}

function addToCart(text) {
    const h4 = document.createElement('h4');
    h4.innerText = text;
    cart.append(h4);

    draggable(h4, [
        {
            container: document.querySelector('#basura'),
            condition: (event, element, container) => {
                element.remove();
                container.style.opacity = '1';

                return false;
            },
            onHover: (container) => {
                container.style.opacity = '.5';
            },
            onLeave: (container) => {
                container.style.opacity = '1';
            }
        }
    ])
}
