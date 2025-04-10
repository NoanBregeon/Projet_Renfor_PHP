document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById('toggle-button');
    const formLogin = document.getElementById('form-login');
    const formRegister = document.getElementById('form-register');
    const formTitle = document.getElementById('form-title');

    let showingRegister = toggleBtn.dataset.state === "register";

    toggleBtn.addEventListener('click', function (e) {
        e.preventDefault();
        showingRegister = !showingRegister;

        if (showingRegister) {
            formLogin.style.display = 'none';
            formRegister.style.display = 'block';
            formTitle.innerText = 'Créer un compte';
            toggleBtn.innerText = 'Se connecter';
            toggleBtn.dataset.state = "register";
        } else {
            formLogin.style.display = 'block';
            formRegister.style.display = 'none';
            formTitle.innerText = 'Connexion';
            toggleBtn.innerText = 'Créer un compte';
            toggleBtn.dataset.state = "login";
        }
    });
});