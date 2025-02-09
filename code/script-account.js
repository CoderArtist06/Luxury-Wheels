document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Blocca l'invio predefinito del form

    let valid = true;
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");

    emailError.style.display = "none";
    passwordError.style.display = "none";

    if (!email.value.trim()) {
        emailError.textContent = "L'email è obbligatoria.";
        emailError.style.display = "block";
        valid = false;
    } else if (!/\S+@\S+\.\S+/.test(email.value)) {
        emailError.textContent = "Inserisci un'email valida.";
        emailError.style.display = "block";
        valid = false;
    }

    if (!password.value.trim()) {
        passwordError.textContent = "La password è obbligatoria.";
        passwordError.style.display = "block";
        valid = false;
    } else if (password.value.length < 6) {
        passwordError.textContent = "La password deve essere di almeno 6 caratteri.";
        passwordError.style.display = "block";
        valid = false;
    }

    if (valid) {
        this.submit(); // Invia il form se i campi sono validi
    }
});
