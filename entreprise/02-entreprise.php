<?php require_once '../entreprise/includes/header_entreprise.php'; ?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Logo du site -->
    <link rel="sortcut-icon" href="../entreprise/img/1-logo.jpg">
  
  <!-- Ma feuille de styles -->
  <link rel="stylesheet" href="../entreprise/css/entreprise.css">

    <title>Les salariés</title>
  </head>
  <body>

  <main>
    <h1>Les salariés</h1>
    
    <?php 
     
      $pdoEntreprise = new PDO( 
         'mysql:host=localhost;
         dbname=entreprise',
         'root',
         '',
         array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
         )
      );
      


       $requete = $pdoEntreprise->query( "SELECT * FROM employes"); 
      
      echo "
      <table class=\"table table-striped\">
      <thead>
      <tr>
      <th>ID</th>
      <th>Prenom</th>
      <th>Nom</th>
      <th>Sexe</th>
      <th>Service</th>
      <th>Salaire</th>
      <th>Date_embauche</th>
      </tr>
      </thead>
      <tbody>
                 
      ";
      
      while($ligne = $requete->fetch(PDO:: FETCH_ASSOC)){ 
        echo "<tr>";
        echo "<td>". $ligne['id_employes'] . "</td>";       
        echo "<td>". $ligne['prenom'] . "</td>";
        echo "<td>". $ligne['nom'] . "</td>";
        echo "<td>". $ligne['sexe'] . "</td>";
        echo "<td>". $ligne['service'] . "</td>";
        echo "<td>". $ligne['salaire'] . "</td>";
        
        echo "<td>". date('d/m/y - H:i:s', strtotime($ligne['date_embauche'])). "</td>"; 
        echo "<td><a class=\"btn btn-primary\" href=\"03-entreprise.php?
         \">Modifier</a></td>";
        echo "<td><a class=\"btn btn-danger\" href=\"03-entreprise.php?
         \">Supprimer</a></td>";
        
        echo "</tr>";
      }
      echo "
      </tbody>
      </table>
      "  
      // Réception des informations d'un employé avec $_GET 

      ?>



<div class="col-12 col-md-6 m-auto">
          <form action="#" method="POST" class="border p-2 my-5">
            <div class="mb-3">
              <label for="prenom">Votre prenom</label>
              <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="nom">Votre nom</label>
              <input type="text" name="nom" id="nom" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="sexe">Votre genre</label>
              <input type="text" name="sexe" id="sexe" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="service">Votre service</label>
              <input type="text" name="service" id="service" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="salaire">Votre salaire</label>
              <input type="text" name="salaire" id="salaire" class="form-control" required> <br>
              <button type="submit" class="btn btn-success">Ajouter un salarié</button>
            </div>
          </form>

          <?php 
          // je traite le formulaire de façon sécurisée grâce à une requête préparée

          if ( !empty($_POST)){/* je vérifie que $_POST contient des informations
             */
            $_POST['prenom'] = htmlspecialchars($_POST['prenom']); 
            $_POST['nom'] = htmlspecialchars($_POST['nom']);
            $_POST['sexe'] = htmlspecialchars($_POST['sexe']);
            $_POST['service'] = htmlspecialchars($_POST['service']);
            // $_POST['date_embauche'] = htmlspecialchars($_POST['date_embauche']);
            $_POST['salaire'] = htmlspecialchars($_POST['salaire']);
            
            /* grâce à cette instruction, je me premunie des failles et des injections SQL */


            $insertion = $pdoEntreprise->prepare("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, NOW(), :salaire)"); /* pr la date d'enregistrement, ds ls valeurs ns précisons NOW() qui va permettre de récupére la sate de jour, ls autres  valeurs st récisées par la suite ds le execute */
            $insertion->execute(array(
              ':prenom'=>$_POST['prenom'],
              ':nom'=> $_POST['nom'],
              ':sexe'=> $_POST['sexe'],
              ':service'=> $_POST['service'],
              // ':date_embauche'=> $_POST['date_embauche'],
              ':salaire'=> $_POST['salaire'],
            )); /* grâce à cette instruction, le SQL comprend que l'on récupère ce qui se trouve ds l'l'input pr le pseudo et ds l'input message pr le message */
          }
          ?>
      </div>
  </main>
    

    

    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>