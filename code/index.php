<?php
session_start();

// Controlla se l'utente ha già accettato i cookie
if (isset($_SESSION['email'])) {
    // L'utente ha già accettato i cookie, prosegui con il resto della pagina
} else {
    // Se l'utente non ha accettato i cookie, mostra il pop-up
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accept_cookies'])) {
        // L'utente ha accettato i cookie, salva l'email nella sessione
        $_SESSION['email'] = $_POST['email'];
        header('Location: account.php'); // Puoi redirigere a una pagina di successo
        exit();
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reject_cookies'])) {
        // L'utente ha rifiutato i cookie, reindirizza fuori dal sito
        echo "<script>alert('Sei sicuro di non voler accettare? Se non accetti verrai buttato fuori dal sito.'); window.location.href = 'https://www.google.com';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Wheels</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>   
    <div id="header">
        <nav id="navbar">
            <div id="menu">
                <a href="#"><h3><img src="./icons/menu-20.png" alt="">Menu</h3></a>
            </div>
            <div id="logo"><a href="index.php"><h1><i>Luxury Wheels</i></h1></a></div>
            <div id="account"><a href="account.php"><img src="./icons/account-20.png" alt="account"></a></div>
        </nav>
        <div id="slogan">
            <div class="phrase"><h1>Vivi il sogno,<br>&nbsp;&nbsp;Guida l'eccellenza</h1></div>
            <button><a href="modelli.html"><h3>Scopri i nostri modelli</h3></a></button>
        </div>
    </div>

    <div id="content">
        <div class="phrase2"><h1>Guidare è una esperienza,<br>noi la moltiplichiamo</h1></div>
        <div class="img-container"></div>
        <div id="choice">
            <div class="phrase3">
                <h1>La tua Luxury online.<br>Scopri le autovetture subito disponibili.</h1>
                <button><a href="modelli.html">modelli</a></button>
            </div>
            <div class="img-container">
                <div class="slider">
                    <img src="./auto/renntech-mercedes-amg-gt-black-series-r3-scorimento.png" alt="Auto 1" class="slide active">
                    <img src="./auto/audi-rs8-scorimento.png" alt="Auto 2" class="slide">
                    <img src="./auto/bmw-m3-e30-3-scorimento.png" alt="Auto 3" class="slide">
                    <img src="./auto/Volvo_240-scorimento.png" alt="Auto 4" class="slide">
                </div>
                <div class="dots">
                    <span class="dot active" onclick="currentSlide(0)"></span>
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>
        </div>
    </div>

    <div id="footer">
        <div id="footer-content">
            <div class="nazione-lingua">
                <div class="nazione"></div>
                <div class="lingua"></div>
            </div>
            <div class="social-media">
                <a href="https://github.com/CoderArtist06"><img src="./icons/GitHub.png" alt="GitHub" style="filter: invert(100%);"></a>
            </div>
            <div class="copyleft">
                <p>GNU GENERAL PUBLIC LICENSE, Version 3, 29 June 2007</p>
            </div>
        </div>
    </div>
    
    <!-- Overlay che blocca l'interazione -->
    <div id="overlay"></div>

    <!-- Pop-up per i cookie -->
    <div id="cookie-popup">
        <p>Questo sito utilizza solo cookie tecnici per migliorare l'esperienza. Accetti?</p>
        <button onclick="acceptCookies()">Accetta</button>
        <button onclick="rejectCookies()">Rifiuta</button>
    </div>
    
    <script src="script.js"></script>
</body>
</html>