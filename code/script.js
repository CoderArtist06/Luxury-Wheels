// Contenitore delle img
let currentIndex = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
        dots[i].classList.toggle('active', i === index);
    });
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
}

function currentSlide(index) {
    currentIndex = index;
    showSlide(currentIndex);
}

setInterval(nextSlide, 5000); // Cambia immagine ogni 3 secondi

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
