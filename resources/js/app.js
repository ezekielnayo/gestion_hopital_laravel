import 'bootstrap';

import './bootstrap';
require('./bootstrap');

// Importer SweetAlert
import Swal from 'sweetalert2';

window.Swal = Swal;

// resources/js/app.js

document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
        duration: 1000, // Durée de l'animation en millisecondes
        easing: 'ease-in-out', // Type d'easing pour les animations
        once: true 
    });
});


// resources/js/app.js

document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        card.addEventListener('mouseover', () => {
            card.classList.add('zoom');
        });

        card.addEventListener('mouseout', () => {
            card.classList.remove('zoom');
        });
    });
});

