<?php
session_start(); // Avvia la sessione per memorizzare i dati

// Controlla se il form è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera i dati del form
    $email = $_POST['email']; // Salva l'email in sessione
    $password = $_POST['password'];

    // La password predefinita è "123456"
    if ($password === '123456') {
        // Salva l'email nella sessione
        $_SESSION['email'] = $email;
        
        // Reindirizza alla pagina successiva o una pagina di benvenuto
        header('Location: index.php');
        exit();
    } else {
        // Mostra un errore se la password non è corretta
        echo "Password errata.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Wheels - Account</title>
    
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style-account.css" type="text/css">
</head>
<body>
    <div id="container">
        <div id="left-side"></div>
        <div id="right-side">
            <form id="login-form" action="account.php" method="POST" novalidate>
                <div id="logo"><a href="index.html"><h1><i>Luxury Wheels</i></h1></a></div>
                <p>Benvenuto/a</p>
            
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <span class="error-message" id="email-error"></span>
            
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <span class="error-message" id="password-error"></span>
            
                <button type="submit">Accedi</button>
            
                <p class="register-text">Non hai un account?<br><a href="register.html">Registrati</a></p>
            </form>            
        </div>
    </div>

    <script src="script-account.js"></script>
</body>
</html>
