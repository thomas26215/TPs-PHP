<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Vue principale du backoffice</title>
    <meta name="author" content="Jean-Pierre Chevallet" />
    <link rel="stylesheet" type="text/css" href="public/design/style.css">
</head>

<body>
    <header>
        <h1>Bricomachin: backoffice</h1>
        <nav>
            <!-- Menu -->
            <?php include(__DIR__ . '/menu.viewpart.php'); ?>
            
            <!-- Bouton de déconnexion -->
            <form method="POST" class="logout-form">
                <button type="submit" name="viewName" value="logout" class="logout-button">Déconnexion</button>
            </form>
        </nav>
    </header>

    <main>
        <h2>Tableau de bord</h2>
        <!-- Contenu principal ici -->
    </main>

    <footer>
        <!-- Pied de page si nécessaire -->
    </footer>
</body>

</html>
