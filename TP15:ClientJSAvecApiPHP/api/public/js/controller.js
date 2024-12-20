//////////////// Module contrôleur ///////////////// 
// On a besoin de la vue et du modèle
import view from "./view.js";
import model from "./model.js";

// Callback pour la réaction du modèle
function onAnswer(text) {
  view.update(text);
}

// Callback pour la réaction au click
function onSaluer() {
  const nom = view.read();
  model.saluer(nom, onAnswer);
}

// Attache le controleur au bouton
view.addEventListener(onSaluer);
