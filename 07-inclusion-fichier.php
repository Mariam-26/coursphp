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
    <p><code>include_once</code> s'appuie sr include et à donc les mms actions a une différence près : lorsque l'on utilise cete fonction, le fichier visé ne pt être qu'une seule fois ds la page.</p>

    <h2>La propriétaire require()</h2>
<?php require('inc/require.inc.php');

?>
<?php require_once('inc/require_once.inc.php');

?>

<h2>Différences entre include, require, include_once, require_once</h2>
<p>En fraançais, <em>include</em> signifiera plutôt "inclus moi ce fichier" et <em>require</em>signifiera "fichier requis",</p>
<p>S'il ya une erreur :</p>
<ol>
  <li><code>incude</code>fera une erreure ms poursuivre quand mm l'exécution du code</li>
  <li><code>require()</code>ferra une erreur et elle sera fatale : on  arrète l'exécution du code</li>
  <li><code>_once</code>fera l'erreur de son parent et il est présent pr s'assurer que le fichier n'est une seule fois ds le code.</li>
</ol>
    
  
  </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>