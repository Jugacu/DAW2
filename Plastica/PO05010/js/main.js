window.addEventListener("scroll", () => {
    const scrolled = window.pageYOffset;
    document.querySelector('#bg').style.top = `${(0 - (scrolled * .25))}px`;
    document.querySelector('#fg').style.top = `${(0 - (scrolled * .5))}px`;
});
