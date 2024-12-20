// La vue
const input = document.querySelector("header input"); // La zone input du header
const tbody = document.querySelector("main table tbody"); // La zone de sortie, juste le body de la table dans le main
const rowTemplate = document.querySelector("#rowTemplate"); // Le template d'une ligne de la table

const view = {
    read: function () {
        // Retourne la valeur actuelle de l'input
        return input.value.trim(); // Utiliser trim() pour enlever les espaces inutiles
    },

    // Fonction qui affiche tous les contacts dans la table tbody
    update: function (contacts) {
        // Vider le contenu actuel du tbody
        tbody.innerHTML = ""; // Réinitialiser le tbody

        // Vérifier si la liste des contacts est vide
        if (contacts.length === 0) {
            const row = rowTemplate.content.cloneNode(true); // Cloner le template
            const cells = row.querySelectorAll("td");
            cells[0].textContent = "Aucun contact trouvé"; // Message pour les contacts vides
            cells[1].textContent = ""; // Cellule vide
            cells[2].textContent = ""; // Cellule vide
            tbody.appendChild(row); // Ajouter la ligne au tbody
            return; // Sortir de la fonction si aucun contact n'est trouvé
        }

        // Pour chaque contact, créer une nouvelle ligne et l'ajouter au tbody
        contacts.forEach((contact) => {
            const row = rowTemplate.content.cloneNode(true); // Cloner le template
            const cells = row.querySelectorAll("td"); // Sélectionner toutes les cellules

            cells[0].textContent = contact.prenom; // Remplir le prénom
            cells[1].textContent = contact.nom; // Remplir le nom
            cells[2].textContent = contact.mobile; // Remplir le mobile

            tbody.appendChild(row); // Ajouter la ligne au tbody
        });
    },

    // Accrocher une fonction callback à un événement input de la zone de saisie
    addEventListener: function (callback) {
        input.addEventListener("input", callback); // Écouter l'événement 'input'
    },
};

export default view;
