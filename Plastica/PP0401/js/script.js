const menuIcon = document.querySelector('.menu-icon');

const toggleMenu = () => {

    const menu = document.querySelector('.menu');
    const menuOpen = menu.classList.contains('active');

    if (menuOpen) {
        //Close
        menu.classList.remove('active');
        menuIcon.style.transform = 'rotate(0deg)';

    } else {
        // Open
        menu.classList.add('active');
        menuIcon.style.transform = 'rotate(45deg)';
    }

};

menuIcon.addEventListener('click', () => {
    toggleMenu();
});
