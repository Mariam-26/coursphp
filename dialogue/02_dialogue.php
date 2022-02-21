<?php require('../inc/function.php') ?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Le PHP - Insertion d'un élément </title>
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
            <h1 class="display-3">Inserrer un élément</h1>
            <p class="lead">Grâce à la superglobale $_post , on va pouvoir envoyer des informations vers la BDD</p> 
          </div>
        </div><!-- fin de jumbotron -->
        
       <main class="container">
          
          <div class="col-12 col-md-6 m-auto">
          <form action="#" method="POST" class="border p-2 my-5">
            <div class="mb-3">
              <label for="pseudo">Votre pseudo</label>
              <input type="text" name="pseudo" id="pseudo" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="message">Votre message</label>
              <input type="text" name="message" id="message" class="form-control" required> <br>
              <button type="submit" class="btn btn-success">Envoyer votre commentaire</button>
            </div>
          </form>

          <?php 
          // je traite le formulaire de façon sécurisée grâce à une requête préparée

          if ( !empty($_POST)){/* je vérifie que $_POST contient des informations
             */
            $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']); /* grâce à cette instruction, je me premunie des failles et des injections SQL */

            $_POST['message'] = htmlspecialchars($_POST['message']);

            $insertion = $pdoDialogue->prepare("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES (:pseudo, :message, NOW())"); /* pr la date d'enregistrement, ds ls valeurs ns précisons NOW() qui va permettre de récupére la sate de jour, ls autres  valeurs st récisées par la suite ds le execute */
            $insertion->execute(array(
              ':pseudo'=>$_POST['pseudo'],
              ':message'=> $_POST['message'],
            )); /* grâce à cette instruction, le SQL comprend que l'on récupère ce qui se trouve ds l'l'input pr le pseudo et ds l'input message pr le message */
          }
          ?>
      </div>

      <div class="col-12 col-md-6">
        <p>Affichez les 6 derniers commentaires de la table commentaire ds un tableau. Ds une ultime colonne, ajoutez un bouton mdification.</p>
      </div>

      <?php 
       $requete = $pdoDialogue->query( "SELECT * FROM commentaire ORDER BY 'date_enregistrement' DESC LIMIT 0,6"); 
      
      echo "
      <table class=\"table table-striped\">
      <thead>
      <tr>
      <th>ID</th>
      <th>Pseudo</th>
      <th>Message</th>
      <th>date d'enregistrement</th>
      </tr>
      </thead>
      <tbody>
                 
      ";
      
      while($ligne = $requete->fetch(PDO:: FETCH_ASSOC)){ 
        echo "<tr>";
        echo "<td>". $ligne['id_commentaire'] . "</td>";
        
        echo "<td>". $ligne['pseudo'] . "</td>";
        echo "<td>". $ligne['message'] . "</td>";
        echo "<td>". date('d/m/y - H:i:s', strtotime($ligne['date_enregistrement'])). "</td>"; 
        echo "<td><a class=\"btn btn-primary\" href=\"03_fichedialogue.php?
        id_commentaire=".$ligne['id_commentaire'] ."\">Modif</a></td>";
        echo "</tr>";
      }
      echo "
      </tbody>
      </table>
      "           
      ?>

    </main>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>