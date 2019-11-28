let shouldReset = false;

setInterval(() => {
    const inputs = document.querySelectorAll('input[name=slide_switch]');

    let nextShouldUpdate = false;

    if (shouldReset) {
        inputs[0].checked = true;
        shouldReset = false;
    } else {
        inputs.forEach((input, index) => {
            // Skip this and make the next checked
            if (input.checked) {
                nextShouldUpdate = true;
                return
            }

            // Checks it if it needs update
            if (nextShouldUpdate) {
                input.checked = true;
                nextShouldUpdate = false;
                // If its the last of the array and it needs update it should return to the beginning
                if (index === inputs.length - 1) {
                    shouldReset = true;
                }
            }
        })
    }
}, 1000);
