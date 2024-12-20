<?php
// Récupération de le controleur à activer 
// Par défaut on lance l'action main
// ATTENTION : comme il y a des formulaires en GET et POST
//             il faut utiliser la variable super globale $_REQUEST
$ctrl = $_REQUEST['ctrl'] ?? 'main';

// Liste des controleurs possibles
// Cette liste permet d'être sûr de ne pas charger de fichier inconnu
const CTRLS = array('main');

// Vérification que l'action est correcte
if (! in_array($ctrl, CTRLS)) {
  // Ouvre une page d'erreur
  $error = 'Mauvais controleur :"' . $ctrl . '"';
  require_once('view/error.view.php');
  exit(0);
}
// Calcule le chemin vers le fichier du controleur
$path = 'controller/' . $ctrl . '.ctrl.php';
// Charge le controleur
require_once($path);
