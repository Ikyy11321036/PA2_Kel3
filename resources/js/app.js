import './bootstrap';

window.addEventListener('beforeunload', function (event) {
    if (localStorage.getItem('logout') === null) {
        localStorage.setItem('logout', true);
    }
});