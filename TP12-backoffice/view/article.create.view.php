<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Ajout d'un nouvel article - Bricomachin</title>
  <meta name="author" content="Jean-Pierre Chevallet" />
  <link rel="stylesheet" type="text/css" href="public/design/style.css">
</head>
<body>
  <header>
    <h1>Bricomachin: backoffice</h1>
  </header>
  <aside>
    <!-- Menu -->
    <?php include(__DIR__.'/menu.viewpart.php'); ?>
  </aside>
  <main>
    <h2>Ajout d'un nouvel article</h2>
    <form enctype="multipart/form-data" method="post">
      <input type="hidden" name="ctrl" value="article.create">
      <p>
        <label for="reference">Référence</label>
        <input type="number" id="reference" name="reference" value="<?= htmlspecialchars($reference) ?>" required>
      </p>
      <p>
        <label for="libelle">Libéllé</label>
        <textarea id="libelle" name="libelle" rows="1" cols="30" required><?= htmlspecialchars($libelle) ?></textarea>
      </p>
      <p>
        <label for="categorie">Catégorie</label>
        <select id="categorie" name="categorie" required>
          <option value="">Sélectionner une catégorie</option> <!-- Option par défaut -->
          <option value="11" <?= ($categorie == '11') ? 'selected' : '' ?>>Clé et douille</option>
          <option value="12" <?= ($categorie == '12') ? 'selected' : '' ?>>Petit rangement (coffre, étagère, ...)</option>
          <option value="14" <?= ($categorie == '14') ? 'selected' : '' ?>>Coussin et housse de coussin</option>
          <option value="16" <?= ($categorie == '16') ? 'selected' : '' ?>>Embrasse et gland</option>
          <option value="17" <?= ($categorie == '17') ? 'selected' : '' ?>>Galette de chaise, coussin de sol et pouf</option>
          <option value="18" <?= ($categorie == '18') ? 'selected' : '' ?>>Garage et carport</option>
          <option value="21" <?= ($categorie == '21') ? 'selected' : '' ?>>Jonc de mer, sisal et fibre naturelle pour sol</option>
          <option value="22" <?= ($categorie == '22') ? 'selected' : '' ?>>Lampe</option>
          <option value="23" <?= ($categorie == '23') ? 'selected' : '' ?>>Lustre, suspension et plafonnier</option>
          <option value="24" <?= ($categorie == '24') ? 'selected' : '' ?>>Marteau</option>
          <option value="25" <?= ($categorie == '25') ? 'selected' : '' ?>>Moquette de sol en rouleau</option>
          <option value="27" <?= ($categorie == '27') ? 'selected' : '' ?>>Paillasson, tapis de propreté</option>
          <option value="29" <?= ($categorie == '29') ? 'selected' : '' ?>>Perceuse sans fil et visseuse</option>
          <option value="30" <?= ($categorie == '30') ? 'selected' : '' ?>>Rideau</option>
          <option value="31" <?= ($categorie == '31') ? 'selected' : '' ?>>Spot</option>
          <option value="32" <?= ($categorie == '32') ? 'selected' : '' ?>>Tapis de décoration</option>
          <option value="33" <?= ($categorie == '33') ? 'selected' : '' ?>>Vitrage, brise-bise</option>
          <option value="34" <?= ($categorie == '34') ? 'selected' : '' ?>>Voilage</option>
        </select>
      </p>
      <p>
        <label for="prix">Prix</label>
        <input type="number" step=".01" id="prix" name="prix" value="<?= htmlspecialchars($prix) ?>" required>
      </p>
      <p>
        <label for="image">Image</label>
        <input type="file" id="image" name="image" accept="image/png, image/jpeg">
      </p>
      <button type="submit" name="add">Envoyer</button>
    </form>

    <?php if (!empty($error)) : ?>
      <output class="error">
        <p>L'insertion n'a pas été réalisée à cause des erreurs suivantes : </p>
        <ul>
          <?php foreach ($error as $ligne) : ?>
            <li><?= htmlspecialchars($ligne) ?></li> <!-- Correction ici -->
          <?php endforeach; ?>
        </ul>
      </output>
    <?php endif; ?>

    <?php if (!empty($message)) : ?>
      <output><?= htmlspecialchars($message) ?></output> <!-- Correction ici -->
    <?php endif; ?>

  </main>
</body>
</html>
