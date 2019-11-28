let shouldReset = false;
let nextShouldUpdate = false;

setInterval(() => {
    const inputs = document.querySelectorAll('input[name=slide_switch]');

    if (shouldReset) {
        inputs[0].checked = true;
        shouldReset = false;
    } else {
        inputs.forEach((input, index) => {
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

            // If its the last of the array and its checked it should reset
            if (index === inputs.length - 1 && input.checked) {
                shouldReset = true;
            }
        })
    }
}, 5000);
