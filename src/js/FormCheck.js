const submit = document.querySelector('#submit');

function validateEmail(email) {
    // Użyj wyrażenia regularnego (regex) do sprawdzenia poprawności adresu email
    var regex = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
    return regex.test(email);
}

function validatePassword(password) {
    // Sprawdź, czy hasło ma co najmniej 6 znaków
    if (password.length < 6) {
        alert('Hasło musi mieć co najmniej 6 znaków.');
        return false;
    }

    // Sprawdź, czy hasło zawiera co najmniej jedną dużą literę
    if (!/[A-Z]/.test(password)) {
        alert('Hasło musi zawierać co najmniej jedną dużą literę.');
        return false;
    }

    // Sprawdź, czy hasło zawiera co najmniej jedną małą literę
    if (!/[a-z]/.test(password)) {
        alert('Hasło musi zawierać co najmniej jedną małą literę.');
        return false;
    }

    // Sprawdź, czy hasło zawiera co najmniej jedną cyfrę
    if (!/[0-9]/.test(password)) {
        alert('Hasło musi zawierać co najmniej jedną cyfrę.');
        return false;
    }

    // Sprawdź, czy hasło zawiera co najmniej jeden znak specjalny
    if (!/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-=|\\\/]/.test(password)) {
        alert('Hasło musi zawierać co najmniej jeden znak specjalny.');
        return false;
    }

    return true;
}

submit.addEventListener('click', (e) => {
    e.preventDefault();

    let login = document.querySelector('#login').value;
    let password = document.querySelector('#password').value;
    let confirmPassword = document.querySelector('#check_pass').value;

    login = login.trim();
    password = password.trim();
    confirmPassword = confirmPassword.trim();

    if (!validateEmail(login)) {
        alert('Wprowadź poprawny adres email.');
        return false;
    }

    if (!validatePassword(password)) {
        return false;
    }

    if (password !== confirmPassword) {
        alert('Hasła nie pasują do siebie.');
        return false;
    }

    return true;
});
