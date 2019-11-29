const inputs = document.querySelectorAll('input[name=slide_switch]');
let interval;

// IIFE function
const resetInterval = (
    function init() {
        clearInterval(interval);

        let nextShouldUpdate = false;

        interval = setInterval(() => {
            inputs.forEach((input, index) => {
                // If its the last of the array and its checked it should reset
                if (index === inputs.length - 1 && input.checked) {
                    inputs[0].checked = true;
                    nextShouldUpdate = false;
                    return;
                }

                // Skip this and make the next checked
                if (input.checked && !nextShouldUpdate) {
                    nextShouldUpdate = true;
                    return;
                }

                // Checks it if it needs update
                if (nextShouldUpdate) {
                    input.checked = true;
                    nextShouldUpdate = false;
                }
            })

        }, 5000);

        return init;
    }
)();

// Resets after every click
inputs.forEach((input) => {
    input.addEventListener('click', () => resetInterval());
});