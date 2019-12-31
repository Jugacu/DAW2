const recursiveMenu = (el, i = 0) => {
    if (i > 10 || !el) return;

    const children = Array.from(el.childNodes);

    children.forEach((c) => {
        if (c.nodeType === 1) {
            if (c.tagName === 'SPAN' && !c.dataset.disabled) {
                c.addEventListener('click', onclick);
            }
            recursiveMenu(c, ++i);
        }
    });
};

function onclick() {
    if (this.dataset.url) {
        window.location.href = this.dataset.url;
        return;
    }

    let rel = window.location.href.includes('pages') ? '..' : '.';

    window.location.href = `${rel}/pages/${this.firstChild.nodeValue.trim()}.html`;
}

const menu = document.querySelector('#menu');
recursiveMenu(menu);