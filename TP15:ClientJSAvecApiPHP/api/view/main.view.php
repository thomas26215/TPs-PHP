<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Se faire saluer par une API REST</title>
  <meta name="author" content="Jean-Pierre Chevallet" />
</head>

<body>
  <header>
    <h1>Se faire saluer par une API REST</h1>
  </header>
  <main>
    <form>
      <label>Votre nom<input type="text" id="nom" name="nom"></input></label>
      <button type="button" id="click">Bonjour</button>
    </form>
    <p>
      Résultat :
      <output id="resultat"></output>
    </p>
  </main>
  <script type="module" src="public/js/controller.js"></script>
</body>

</html>
