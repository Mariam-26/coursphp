<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Le PHP - Inclure des fichiers</title>
  </head>
  <body>
  <?php
  echo "<p>On ouvre le fichier header.inc.php</p>";
  include('inc/header.inc.php');

  echo "<p>Fin de notre fichier header.inc.php</p>";
  ?>

  <main class="container">
    <p>Ici ns avons inclu ntotre fichier header.inc.php qui contient le jumbotronn grâce à la fonction php <code>include('')</code>Cette fonction prendra comme seul argument le chemin de notre fichier.</p>
    <?php include_once('inc/coucou.inc.php');?>
  </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>