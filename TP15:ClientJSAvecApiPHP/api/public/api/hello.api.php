<?php
// Indiquer le type de contenu et l'encodage
header('Content-Type: text/plain; charset=utf-8');

// Récupérer le paramètre 'nom' de la query string
$nom = isset($_GET['nom']) ? $_GET['nom'] : 'Invité'; // Valeur par défaut

// Produire un message de bienvenue
print("Hello $nom !");
?>
