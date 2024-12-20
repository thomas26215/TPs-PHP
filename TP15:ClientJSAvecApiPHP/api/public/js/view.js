// Module de la vue 
// Les éléments DOM 
const button = document.getElementsByTagName("button")[0];  // le bouton du formulaire
const input = document.getElementById('nom');  // l'input du nom
const output = document.getElementById('resultat');  // l'élément output pour le résultat

const view = {
    // Lire le contenu de la vue
    read: function () {
        return input.value;
    },
    // Met à jour la vue
    update: function (out) {
        output.textContent = out;
    },
    // Accrocher une fonction callback à un événement click du bouton de la vue
    addEventListener: function (callback) { button.addEventListener("click", callback) }
}

export default view;
