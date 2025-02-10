// Content
function updateCarInfo() {
    let select = document.getElementById("carSelect");
    let selectedOption = select.options[select.selectedIndex];
    
    document.getElementById("carImage").src = selectedOption.dataset.img;
    document.getElementById("carName").textContent = selectedOption.dataset.name;
    document.getElementById("summaryName").textContent = selectedOption.dataset.name;
    
    document.getElementById("carDetails").style.display = "block";
    document.getElementById("summary").style.display = "block";
    
    updatePrice();
}

function updatePrice() {
    let select = document.getElementById("carSelect");
    let selectedOption = select.options[select.selectedIndex];
    let basePrice = parseInt(selectedOption.dataset.price);
    
    if (document.getElementById("insurance").checked) {
        basePrice += 100;
    }
    if (document.getElementById("GPS").checked) {
        basePrice += 30;
    }
    if (document.getElementById("child").checked) {
        basePrice += 15;
    }
    if (document.getElementById("conducente").checked) {
        basePrice += 500;
    }
    if (document.getElementById("assistenza").checked) {
        basePrice += 80;
    }
    
    document.getElementById("summaryPrice").textContent = "€" + basePrice;
}

function checkLogin() {
    let loggedIn = "<?php echo isset($_SESSION['email']) ? 'true' : 'false'; ?>";
    
    if (!loggedIn) {
        alert("Devi effettuare il login per procedere!");
    } else {
        let email = "<?php echo $_SESSION['email']; ?>"; // Recupera l'email dalla sessione
        let carName = document.getElementById("carName").textContent;
        let carPrice = document.getElementById("summaryPrice").textContent;
        
        // Visualizza lo scontrino o procedi con il pagamento
        alert(`Scontrino: \nEmail: ${email}\nAuto: ${carName}\nPrezzo: ${carPrice}`);
    }
}

function showReceipt() {
    let carName = document.getElementById("carName").textContent;
    let carPrice = document.getElementById("summaryPrice").textContent;
    let email = "<?php echo $_SESSION['email']; ?>"; // Email dall'utente
    
    // Creazione del contenuto dello scontrino
    let receiptContent = `
        <h2>Scontrino di Acquisto</h2>
        <p>Email: ${email}</p>
        <p>Auto Noleggiata: ${carName}</p>
        <p>Prezzo Totale: ${carPrice}</p>
    `;
    
    document.getElementById("receipt").innerHTML = receiptContent;
    document.getElementById("receipt").style.display = "block"; // Mostra lo scontrino
}

// Footer
// Funzione per ottenere la geolocalizzazione del cliente
function getGeoLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;

            // Utilizzo di un'API per ottenere il paese e la regione in base alla latitudine e longitudine
            fetch(`https://geocode.xyz/${lat},${lon}?geoit=json`)
                .then(response => response.json())
                .then(data => {
                    // Controllo se i dati sono validi prima di settare i valori
                    if (data.country && data.state) {
                        document.querySelector('.nazione').textContent = `Ti trovi: ${data.country} / ${data.state}`;
                    } else {
                        document.querySelector('.nazione').textContent = "Ti trovi: Nazione non disponibile";
                    }
                })
                .catch(error => {
                    console.error('Errore nel recupero dei dati di geolocalizzazione:', error);
                });
        });
    } else {
        console.error("Geolocalizzazione non supportata dal browser.");
    }
}

// Aggiungi il contenuto della lingua e bandiera
function setLanguage() {
    const languageDiv = document.querySelector('.lingua');
    const language = "Italiano"; // Puoi usare navigator.language per una lingua dinamica
    const img = document.createElement('img');
    img.src = "https://upload.wikimedia.org/wikipedia/commons/0/03/Flag_of_Italy.svg"; // Bandiera italiana
    img.alt = "Bandiera Italia";
    languageDiv.innerHTML = `Lingua: ${language} `;
    languageDiv.appendChild(img);
}

// Imposta i valori iniziali
window.onload = function() {
    getGeoLocation();
    setLanguage();
};
