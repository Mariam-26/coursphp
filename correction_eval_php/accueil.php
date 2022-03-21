<?php 
// JE REQUIRE LA CONNECTION A LA BDD
require 'inc/init.inc.php';

// 4- J'affiche toutes les infos de la table advert 
$requete = $pdoLocation->query(" SELECT * FROM advert ORDER BY id DESC LIMIT 0,15");
?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Le Bon Appart - Accueil</title>
  </head>
  <body>
    <div class="p-5 bg-light">
      <div class="container">
        <h1 class="display-3">Le Bon Appart</h1>
        <p class="lead">Accueil</p>
      
      </div>
    </div>

    <div class="container">
      <div class="row">
        <?php 
        while ($annonces = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
          <?php 
          if(empty($annonces['rerservation_message'])) { ?>

          <?php }else {?>

          <?php } ?>
           
        <?php } ?> <!-- fin de la boucle -->
        ?>
      </div> <!-- Fin row -->
    </div> <!-- Fin container -->
   





   
    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>