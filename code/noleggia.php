<?php
session_start();

$email = isset($_SESSION['email']) ? $_SESSION['email'] : null; // Recupera l'email

// Se l'email non è presente, rimanda l'utente al login
if (!$email) {
    header('Location: account.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Wheels - Noleggia</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style-noleggia.css" type="text/css">
</head>
<body>
    <nav id="navbar">
        <div id="menu"><a href="#"><h3><img src="./icons/menu-20.png" alt="">Menu</h3></a></div>
        <div id="logo"><a href="index.php"><h1><i>Luxury Wheels</i></h1></a></div>
        <div id="account"><a href="account.php"><img src="./icons/account-20.png" alt="account"></a></div>
    </nav>

    <div id="content">
        <!-- Selezione Auto -->
        <label for="carSelect">Seleziona un'auto:</label>
        <select id="carSelect" onchange="updateCarInfo()">
            <option value="" disabled selected>Scegli un'auto</option>
            <option value="Audi R8" data-name="Audi R8" data-price="560" data-img="./auto/audi-r8.png">Audi R8 - €560/giorno</option>
            <option value="bmw320" data-name="BMW Serie 3" data-price="80" data-img="./auto/bmw-serie8.png">BMW Serie 3 - €80/giorno</option>
            <option value="mercedes-benz-classeA" data-name="mercedes-benz-classeA" data-price="75" data-img="./auto/mercedes-benz-classeA.png">Mercedes Benz classe A - €75/giorno</option>
            <option value="multipla-GT" data-name="multipla-GT" data-price="50" data-img="./auto/multipla-GT.png">Multipla-GT - €50/giorno</option>
            <option value="porsche-911-GT3" data-name="porsche-911-GT3" data-price="600" data-img="./auto/porsche-911-GT3.png">Porsche 911 GT3 - €600/giorno</option>
        </select>
        
        <!-- Dettagli Auto -->
        <div id="carDetails" style="display:none;">
            <img id="carImage" src="" alt="Auto" style="width: 50vh;">
            <div>
                <h2 id="carName"></h2><br>
                <p id="carDescription">Su Luxury Wheels, offriamo un'ampia selezione di veicoli di alta gamma, dalle sportive eleganti alle SUV di lusso. Ogni auto è scelta per offrirti un'esperienza di guida senza pari. Noleggia oggi stesso e vivi l'emozione della guida con Luxury Wheels</p><br>
            </div>
            
            <!-- Opzioni Extra -->
            <label><input type="checkbox" id="insurance" onclick="updatePrice()"> Assicurazione Premium (+€100)</label><br>
            <label><input type="checkbox" id="GPS" onclick="updatePrice()"> Navigatore GPS (+€30)</label><br>
            <label><input type="checkbox" id="child" onclick="updatePrice()"> Seggiolino per bambini (+€15)</label><br>
            <label><input type="checkbox" id="conducente" onclick="updatePrice()"> Conducente privato (+€500)</label><br>
            <label><input type="checkbox" id="assistenza" onclick="updatePrice()"> Servizio di assistenza stradale (+€80)</label>
        </div>
        
        <!-- Riquadro Prezzo -->
        <div id="summary" style="display:none;">
            <span id="summaryName"></span>
            <span id="summaryPrice">€0</span>
        </div>
        
        <!-- Pulsante di Conferma -->
        <button onclick="checkLogin()">Procedi al Noleggio</button>
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
    
    <div id="receipt" style="display:none;"></div>

    <script src="script-noleggia.js"></script>
</body>
</html>