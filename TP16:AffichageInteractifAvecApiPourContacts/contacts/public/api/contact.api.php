<?php
// Besoin de la classe pour lancer les requêtes 
require_once(__DIR__ . "/../../model/contact.class.php");

// Tableau qui contient la réponse
$out = [];
// Un parametre action est obligatoire
if (! isset($_GET['action'])) {
    $out['error'] = "parameter 'action' is missing";
} else {
    // Examine l'action demandée
    $action = $_GET['action'];

    switch ($action) {
        // Lecture des contacts sachant le nom
        case 'read':
            // Il faut un nom
            $nom = $_GET['nom'] ?? '';
            if ($nom == '') {
                $out['error'] = "nom missing for read";
                break;
            }
            // Lance la demande
            try {
                $contacts = Contact::read($nom);
                // Passe tous les objets en résultat
                $out['contacts'] = $contacts;
            } catch (Exception $e) {
                // Retourne le message d'erreur
                $out['error'] = $e->getMessage();
            }
            break;
        
        case 'readLike':
            // Il faut un pattern
            $pattern = $_GET['pattern'] ?? '';
            if ($pattern == '') {
                $out['error'] = "pattern missing for readLike";
                break;
            }
            // Lance la demande
            try {
                $contacts = Contact::readLike($pattern);
                // Passe tous les objets en résultat
                $out['contacts'] = $contacts;
            } catch (Exception $e) {
                // Retourne le message d'erreur
                $out['error'] = $e->getMessage();
            }
            break;
        
        default:
            $out['error'] = "incorrect action '$action'";
    }
}

// Définit le type de contenu comme JSON
header('Content-Type: application/json');

// Vérifie s'il y a une erreur
if (isset($out['error'])) {
    // En cas d'erreur, envoie un code d'état 400
    header("HTTP/1.1 400 Bad Request");
}

// Encode et affiche la réponse en JSON
echo json_encode($out);

