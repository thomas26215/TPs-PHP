<?php
// Controleur pour l'action sur les articles
// 
// Controleur pour l'action sur les articles

// Inclusion du framework
include_once("framework/view.fw.php");
// Inclusion du modèle
include_once("model/article.class.php");
include_once("model/categorie.class.php");
// Nom du répertoire où stocker les images téléchargées
$imgPath = "public/img/";

// Initialisation des variables
$reference = '';
$libelle = '';
$categorie = '';
$prix = 0.0;
$error = [];
$message = '';

// Vérification de la méthode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "coucou";

    // Récupération des champs texte et nombre avec des valeurs par défaut
    $reference = $_POST['reference'] ?? '';
    $libelle = $_POST['libelle'] ?? '';
    $categorie = $_POST['categorie'] ?? '';
    $prix = $_POST['prix'] ?? 0;

    echo $reference;

    // Récupération de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $imageFile = $_FILES['image'];
        $uploadFile = $imgPath . uniqid() . '-' . basename($imageFile['name']);

        // Déplacement du fichier téléchargé vers le répertoire cible
        if (move_uploaded_file($imageFile['tmp_name'], $uploadFile)) {
            echo "Image téléchargée avec succès.<br>";
        } else {
            $error[] = "Erreur lors du téléchargement de l'image.";
            $uploadFile = ''; // Réinitialiser en cas d'erreur
        }
    } else {
        $error[] = "Aucune image téléchargée ou erreur lors du téléchargement.";
        $uploadFile = ''; // Réinitialiser en cas d'erreur
    }

    // Vérification et création de l'article
    if (empty($error)) {
        $newCategorie = Categorie::read(intval($categorie));
        $article = new Article((int) $reference, $libelle, $newCategorie, (float)$prix, $uploadFile);
        
        // Appel à la méthode create pour enregistrer l'article
        if ($article->create()) {
            $message = "Article ajouté avec succès.";
        } else {
            $error[] = "Erreur lors de l'ajout de l'article.";
        }
    }
}
$view = new View();
$view->assign('test', 'test');
$view->assign('libelle', 1);
$view->assign('categorie', 10);
$view->display('article.create');




// 
?>
