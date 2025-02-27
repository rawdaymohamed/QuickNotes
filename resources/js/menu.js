
document.addEventListener('DOMContentLoaded', function () {
    const button = document.querySelector('[data-collapse-toggle="navbar-default"]');
    const menu = document.getElementById('navbar-default');

    button.addEventListener('click', function () {
        const expanded = menu.classList.contains('hidden');
        menu.classList.toggle('hidden');
        button.setAttribute('aria-expanded', !expanded);
    });
});
