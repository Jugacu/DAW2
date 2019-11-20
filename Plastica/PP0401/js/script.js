const menuIcon = document.querySelector('.menu-icon');

let menuOpen = false;
const toggleMenu = () => {
    const menu = document.querySelector('.menu');

    if (menuOpen) {
        //Close
        menu.style.marginLeft = '';
        menuIcon.style.transform = 'rotate(0deg)';
        menuOpen = false;

    } else {
        // Open
        menu.style.marginLeft = '0';
        menuIcon.style.transform = 'rotate(45deg)';
        menuOpen = true;
    }

};

menuIcon.addEventListener('click', () => {
    toggleMenu();
});
