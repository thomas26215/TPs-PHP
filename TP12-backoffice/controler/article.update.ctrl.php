<?php
// Controleur pour l'action sur les articles
// 
// Inclusion du framework
include_once('framework/view.fw.php');
// Inclusion du modèle
include_once('model/article.class.php');



$view = new View();

$view->display("article.update");

?>
