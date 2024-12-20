<?php
// Test de la classe Article
require_once(__DIR__.'/../model/article.class.php');
require_once(__DIR__.'/../model/categorie.class.php');

// Affiche un texte avec des couleurs ANSI dans le shell
function printCol(string $text,string $col='red') {
  switch ($col) {
    case 'red':
      print("\e[1;4;31m");
          break;
    case 'green':
      print("\e[1;32m");
    default:
      break;
  }
  print($text."\e[0m");
}

// Affiche "OK en vert"
function OK() {
  printCol("OK\n",'green');
}

try {
  // Nettoyage des données de test
  print("Nettoyage des données de test : ");
  try {
    $testArticle = Article::read(99);
    $testArticle->delete();
  } catch (Exception $e) {
    // Article doesn't exist, which is fine
  }
  OK();

  // Génération d'une référence unique pour le test
  $testRef = mt_rand(1000000, 9999999);

  // Vérification de l'accès à une catégorie
  print("Lecture d'une catégorie : ");
  $value = Categorie::read(22);
  $expected = new Categorie(22,"Lampe",6);
  if ( $value != $expected) {
    var_dump($value);
    print("Attendu : \n");
    var_dump($expected);
    throw new Exception("Categorie 22 non trouvé");
  }
  OK();

  // Vérification de l'accès à un article
  print("Lecture d'un article : ");
  $value = Article::read(68393374);
  $categorie = Categorie::read(18);
  $expected = new Article(68393374,"Garage en bois Neuvy, 17 m²",$categorie,1650.00,"68393374.jpg");
  if ( $value != $expected) {
    var_dump($value);
    print("Attendu : \n");
    var_dump($expected);
    throw new Exception("Article 68393374 non trouvé");
  }
  OK();

  // Vérification que la tentative d'acces à un article inexistant provoque une exception
  print("Tentative de lecture d'un article inexistant : ");
  try {
    $article = Article::read(0);
    var_dump($article);
    throw new Exception("Article inexistant de ref 0 trouvé");
  } catch (Exception $e) {
    OK();
  }

  // Vérification de la sauvegarde d'un nouvel article
  print("Création d'un article : ");
  $categorie = Categorie::read(7);
  $article = new Article($testRef,"Test Applique murale",$categorie,150.00,"image.jpg");
  $article->create();
  // Vérifie que l'article existe
  $value = new Article($testRef,"Test Applique murale",$categorie,150.00,"image.jpg");
  $expected = Article::read($testRef);
  if ( $value != $expected) {
    var_dump($value);
    print("Attendu : \n");
    var_dump($expected);
    throw new Exception("Article $testRef non inséré dans la base");
  }
  OK();

  // Vérification qu'on ne peut pas ajouter un autre article avec la même référence
  print("Refus de création d'un article avec même référence : ");
  $categorie = Categorie::read(7);
  $article = new Article($testRef,"Test",$categorie,10.00,"image.jpg");
  try {
    $article->create();
    throw new Exception("Article $testRef inséré en double dans la base");
  } catch (Exception $e) {
    OK();
  }

  // Vérification de la modification d'un article
  print("Mise à jour d'un article : ");
  $expected = Article::read($testRef);
  // Modification du prix
  $expected->setPrix(112.00);
  // Mise à jour
  $expected->update();
  $value = Article::read($testRef);
  if ( $value != $expected) {
    var_dump($value);
    print("Attendu : \n");
    var_dump($expected);
    throw new Exception("Article $testRef n'a pas été mis à jour");
  }
  OK();

  // Vérification de la destruction d'un article
  print("Suppression d'un article : ");
  $article = Article::read($testRef);
  $article->delete();
  // Verification qu'il n'y a plus cet article
  try {
    $article = Article::read($testRef);
    throw new Exception("L'article de reference $testRef n'a pas été supprimé");
  } catch (Exception $e) {
    OK();
  }

} catch (Exception $e) {
  printCol("\nLe test produit l'erreur suivante :\n");
  exit($e->getMessage()."\n");
}
