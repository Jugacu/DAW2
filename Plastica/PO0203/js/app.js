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
});
