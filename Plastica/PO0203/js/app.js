window.addEventListener('load', () => {

    const avatar = document.querySelector('#avatar');
    const uploader = document.querySelector('#uploader');

    uploader.onchange = (e) => {
        const input = e.target;
        const files = input.files;

        // FileReader support
        if (FileReader && files && files.length) {
            const fr = new FileReader();
            fr.onload = () => {
                avatar.style.backgroundImage = `url(${fr.result})`;
                avatar.style.backgroundSize = `cover`;
                avatar.style.border = '0'
            };
            fr.readAsDataURL(files[0]);
        }
    };

    const textarea = document.querySelectorAll('textarea');

    textarea.forEach((el) => {
        el.addEventListener('keydown', autosize);
        el.addEventListener('keyup', autosize);
    });

    function autosize() {
        const field = this;
        // Reset field height
        field.style.height = 'inherit';

        // Get the computed styles for the element
        const computed = window.getComputedStyle(field);

        // Calculate the height
        const height = parseInt(computed.getPropertyValue('border-top-width'), 10)
            + parseInt(computed.getPropertyValue('padding-top'), 10)
            + field.scrollHeight
            + parseInt(computed.getPropertyValue('padding-bottom'), 10)
            + parseInt(computed.getPropertyValue('border-bottom-width'), 10);

        field.style.height = height + 'px';
    }

    const sliders = document.querySelectorAll('.progress');

    sliders.forEach((el) => {
        el.children[0].style.width = `${Math.floor(Math.random() * 100) + 1}%`;
        rangeSlider(el, (val) => {
            el.children[0].style.width = `${val}%`
        });
    });

    function rangeSlider(el, onDrag) {

        let down = false;
        let rangeWidth;
        let rangeLeft;

        el.addEventListener("mousedown", function (e) {
            rangeWidth = this.offsetWidth;
            rangeLeft = this.offsetLeft;
            down = true;
            updateDragger(e);
            return false;
        });

        document.addEventListener("mousemove", function (e) {
            updateDragger(e);
        });

        document.addEventListener("mouseup", function () {
            down = false;
        });

        function updateDragger(e) {
            if (down && e.pageX >= rangeLeft && e.pageX <= (rangeLeft + rangeWidth)) {
                if (typeof onDrag == "function") onDrag(Math.round(((e.pageX - rangeLeft) / rangeWidth) * 100));
            }
        }

    }
});
