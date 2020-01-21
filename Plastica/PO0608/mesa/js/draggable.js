const draggable = (element, containersSettings, boundary) => {

    let moving;
    let wasOver;

    // Prevents a bug that makes the browser thinks that is dragging.
    element.style.userSelect = 'none';

    element.addEventListener('mousedown', (e) => {
        teleportToCursor(e, element);
        enableMoving(element);
        setListeners(element);
    });

    function setListeners(element) {
        window.onmousemove = (e) => {
            if (moving) {
                teleportToCursor(e, element)
            }
        };

        window.onmouseup = (e) => {
            if (moving) {
                tryToDrop(element, e);
                disableMoving(element);
            }
        }

    }

    function teleportToCursor(e, element) {
        boundary = boundary instanceof HTMLElement ? boundary : searchBounds(element, 0);

        const x = boundary ? e.clientX - boundary.getBoundingClientRect().left : e.pageX;
        const y = boundary ? e.clientY - boundary.getBoundingClientRect().top : e.pageY;

        element.style.left = `${x - element.offsetWidth / 2}px`;
        element.style.top = `${y - element.offsetHeight / 2}px`;

        execHoverCallbacks(element);
    }

    function searchBounds(element, index) {
        if (index > 100 || element === document.body) return null;
        const position = window.getComputedStyle(element).position;
        return (position === 'relative' && index > 0) ? element : searchBounds(element.parentElement, ++index);
    }

    function tryToDrop(element, event) {
        const containersSetting = getCollidingContainerSetting(element);
        if (containersSetting && containersSetting.container) {
            if (!isFunction(containersSetting.condition) ||
                (isFunction(containersSetting.condition) && containersSetting.condition(event, element, containersSetting.container))) {
                containersSetting.container.appendChild(element);
            }
        }
    }

    function getCollidingContainerSetting(element) {
        for (let i = 0; i < containersSettings.length; i++) {
            const containerSetting = containersSettings[i];
            if (collides(containerSetting.container, element)) {
                return containerSetting;
            }
        }

        return null;
    }

    function isFunction(functionToCheck) {
        return functionToCheck && {}.toString.call(functionToCheck) === '[object Function]';
    }

    function execHoverCallbacks(element) {
        const containerSetting = getCollidingContainerSetting(element);
        if (containerSetting && isFunction(containerSetting.onHover)) {
            containerSetting.onHover(containerSetting.container, element);
            wasOver = containerSetting;
        } else if (wasOver && isFunction(wasOver.onLeave)) {
            wasOver.onLeave(wasOver.container, element);
            wasOver = undefined;
        }
    }

    function collides(el1, el2) {
        let d1 = el1.getBoundingClientRect();
        let d2 = el2.getBoundingClientRect();

        let ox = Math.abs(d1.x - d2.x) < (d1.x < d2.x ? d2.width : d1.width);
        let oy = Math.abs(d1.y - d2.y) < (d1.y < d2.y ? d2.height : d1.height);
        return ox && oy;
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
