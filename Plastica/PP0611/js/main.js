const productContainer = document.querySelector('#products');
const cartEl = document.querySelector('#cart');
const cartContents = document.querySelector('#cart-contents');

const Product = class {
    constructor(name = 'unnamed', image = 'https://i.imgur.com/gcSjNXi.jpg', price = 99, rating = 85) {
        this._name = name;
        this._image = image;
        this._rating = rating;
        this._price = price;

        this._element = document.createElement('div');
        this._element.classList.add('product');
        this._element.innerHTML = `<div class="display" style="background-image: url('${image}')"></div>
            <div class="desc">
                <h3 class="title">${name}</h3>
                <span class="price">${price}€</span>
                <div class="star-ratings-sprite"><span style="width:${rating}%" class="star-ratings-sprite-rating"></span></div>
            </div>`;
    }

    getElement() {
        return this._element;
    }
};

const cartThings = [];

const recalculateCart = () => {
    let total = 0;
    cartThings.forEach((arr) => {
        const quantity = arr[0];
        const product = arr[1];

        total += quantity * product._price;
    });
    document.getElementById('total-price').innerHTML = total;
};

const isInCart = (product) => {
    let index = -1;

    cartThings.forEach((arr, _index) => {
        const quantity = arr[0];
        const _product = arr[1];

        if (product._name === _product._name) {
            index = _index;
        }
    });
    return index;
};

const buildCart = () => {
    cartContents.innerHTML = `<div class="flex">
            <div><h3>Product</h3></div>
            <div><h3>Quantity</h3></div>
        </div>`;

    cartThings.forEach((arr, index) => {
        const quantity = arr[0];
        const product = arr[1];

        const div = document.createElement('div');
        div.innerHTML = `<div class="flex">
            <div id="dragme-${index}" class="cart-product">
                <div class="display" style="background-image: url('${product._image}')"></div>
                <div class="desc">
                    <h3>${product._name}</h3>
                    <span class="price">${product._price}€</span>
                </div>
            </div>
            <div class="input">
                <button id="decrement-${index}">-</button><input id="input-${index}" type="number" value="${quantity}" disabled=""><button id="increment-${index}">+</button>
            </div>
        </div>`;
        cartContents.append(div);

        jugacu.draggable(document.querySelector(`#dragme-${index}`), [
            {
                container: document.body,
                condition: () => {
                    removeFromCart(index);
                    return false;
                },
            }
        ], {
            ghostMode: true
        }, cartContents);

        document.getElementById(`decrement-${index}`).addEventListener('click', () => {
            if (cartThings[index][0] === 1) {
                removeFromCart(index);
                return;
            }
            cartThings[index][0]--;
            document.getElementById(`input-${index}`).value = cartThings[index][0];
            recalculateCart();
        });

        document.getElementById(`increment-${index}`).addEventListener('click', () => {
            cartThings[index][0]++;
            document.getElementById(`input-${index}`).value = cartThings[index][0];
            recalculateCart();
        });

        recalculateCart();
    });
};

const removeFromCart = (index) => {
    cartThings.splice(index, 1);
    buildCart();
    recalculateCart();
};

const addToCart = (product) => {

    let foundIndex = isInCart(product);
    if (foundIndex !== -1) {
        cartThings[foundIndex][0]++;
        document.getElementById(`input-${foundIndex}`).value = cartThings[foundIndex][0];
        recalculateCart();
        return;
    }
    cartThings.push([1, product]);

    buildCart();
};

const arr = [
    new Product(),
    new Product('test', 'https://i.imgur.com/TEJfPtY.png'),
    new Product('un helado', 'https://i.imgur.com/KMANuCX.png'),
    new Product('rico', 'https://i.imgur.com/CBgGks3.png'),
    new Product('prueba!', 'https://i.imgur.com/FONJa4N.png'),
    new Product('owoo', 'https://i.imgur.com/OD0fDy3.png'),
];


arr.forEach(product => {
    productContainer.append(product.getElement());

    jugacu.draggable(product.getElement(), [
        {
            container: cartEl,
            condition: () => {
                addToCart(product);
                cartEl.classList.remove('hover');
                return false;
            },
            onHover: (container, element) => {
                container.classList.add('hover')
            },
            onLeave: (container) => {
                container.classList.remove('hover')
            }
        }
    ], {
        ghostMode: true
    });
});