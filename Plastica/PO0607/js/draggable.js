const draggable = (element, containersSettings) => {

    let moving;

    // Prevents a bug that makes the browser thinks that is dragging.
    element.style.userSelect = 'none';

    element.onmousedown = () => {
        enableMoving(element);
        setListeners(element);
    };

    function setListeners(element) {
        window.onmousemove = (e) => {
            if (moving) {
                element.style.left = `${e.pageX - element.offsetWidth / 2}px`;
                element.style.top = `${e.pageY - element.offsetHeight / 2}px`;
            }
        };

        window.onmouseup = (e) => {
            if (moving) {
                tryToDrop(element, e);
                disableMoving(element);
            }
        }

    }

    function tryToDrop(element, event) {
        containersSettings.forEach((containersSetting) => {
            if (collides(containersSetting.container, element)) {
                if (containersSetting.condition(event, element, containersSetting.container)) {
                    containersSetting.container.appendChild(element);
                }
            }
        });
    }

    function collides(el1, el2) {
        el1.offsetBottom = el1.offsetTop + el1.offsetHeight;
        el1.offsetRight = el1.offsetLeft + el1.offsetWidth;
        el2.offsetBottom = el2.offsetTop + el2.offsetHeight;
        el2.offsetRight = el2.offsetLeft + el2.offsetWidth;

        return !((el1.offsetBottom < el2.offsetTop) ||
            (el1.offsetTop > el2.offsetBottom) ||
            (el1.offsetRight < el2.offsetLeft) ||
            (el1.offsetLeft > el2.offsetRight))
    }

    function enableMoving(element) {
        element.style.position = 'absolute';
        moving = true;
    }

    function disableMoving(element) {
        element.style.position = '';
        element.style.left = '';
        element.style.top = '';
        moving = false;
    }

};
