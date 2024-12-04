document.addEventListener('DOMContentLoaded', function() {
    const burgerButton = document.getElementById('burgerMenuButton');

    burgerButton.addEventListener('click', function() {
        burgerMenuAction();
    });
});

function burgerMenuAction() {
    const burgerMenu = document.getElementById('menu');

    if (burgerMenu != null){
        burgerMenu.classList.contains('open') ? burgerMenu.classList.remove('open') : burgerMenu.classList.add('open');
    }
}