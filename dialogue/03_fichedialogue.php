<?php require('../inc/function.php') ?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Le PHP - Mise à jour d'un commentaire </title>
</head>
<body>

<?php
   $pdoDialogue = new PDO( /* PDO est un objet qui représente la connexion entre une page en PHP et une BDD */
      'mysql:host=localhost;
      dbname=dialogue',/* dans le premier argument on précise localhost et le nom de la BDD */
      'root',/* dans le deuxième argument on précise l'identifiant PHPMyAdmin */
      '',/* Dans le troisième argument on précise le mot de passe, vide pour le PC */
      array(
         PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
      )/* Ici, on précise comment on veut que les erreurs soient gérées et le jeu de caractères utilisé */
   );
   ?>

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Le PHP - Mise à jour d'un commentaire</h1>
            <p class="lead">Grâce à la superglobal $_GET, on va pouvoir récupérer ds infos de la BDD</p> 
          </div>
        </div><!-- fin de jumbotron -->
        
       <main class="container">
          
          <div class="row">
          <?php 
          if(isset($_GET['id_commentaire'])){
            // ici on verifie que l'id du commentaire existe ds notre BDD
            $resultat = $pdoDialogue->prepare("SELECT * FROM commentaire WHERE id_commentaire = :id_commentaire");
            $resultat->execute(array(
              ':id_commentaire' => $_GET['id_commentaire'] /* on associe id_commentaire à l'id récupéré ds le lien de la page */
            ));
            if ($resultat ->rowCount() == 0) {/* si l'id_commentaire n'existe pas ds la BDD alors je renvoie vers une autre page */
              header('location:02-dialogue.php'); /* on redirige vers la page de départ */ 
              exit(); /* on arrête le script car il ne correspond à rien */
              $fiche = $resultat->fetch(PDO::FETCH_ASSOC);
            }else { /* si j'arrive sur la page sans rien dans l'URL */
              header('location:02-dialogue.php'); 
              exit();
            }
          }

          
          ?>
      </div>

      <div class="col-12 col-md-6">
        <p></p>

      </div>

    </main>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>