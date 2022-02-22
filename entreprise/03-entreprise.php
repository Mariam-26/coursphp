<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Employé Ouédraogo</title>
  </head>
  <body>

  <main>
    <h1>Employé Ouédraogo</h1>
    
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
        echo "<td><a class=\"btn btn-primary\" href=\"03-entreprise.php?
         \">Supprimer</a></td>";
        
        echo "</tr>";
      }
      echo "
      </tbody>
      </table>
      "  
      // Réception des informations d'un employé avec $_GET 
      ?>


<div class="row">
          <?php 
          if(isset($_GET['id_embauche'])){
            // ici on verifie que l'id du commentaire existe ds notre BDD
            $resultat = $pdoEntreprise->prepare("SELECT * FROM employes WHERE id_embauche = :id_embauche");
            $resultat->execute(array(
              ':id_embauche' => $_GET['id_embauche'] /* on associe id_commentaire à l'id récupéré ds le lien de la page */
            ));
            if ($resultat ->rowCount() == 0) {/* si l'id_commentaire n'existe pas ds la BDD alors je renvoie vers une autre page */
              header('location:02-entreprise.php'); /* on redirige vers la page de départ */ 
              exit(); /* on arrête le script car il ne correspond à rien */
            }
            $fiche = $resultat->fetch(PDO::FETCH_ASSOC);
            }else { /* si j'arrive sur la page sans rien dans l'URL */
              header('location:02-entreprise.php'); 
              exit();
            }          
          ?>
      </div>


<div class="row col-12">

<div class="col-12 col-md-6">   
<div class="card">
    <div class="card-header">
      ID de l'embauche : <?php echo $fiche['id_embauche']; ?>
    </div>
    <div class="card-body">
      <h4 class="card-title">Prenom : <?php echo $fiche['prenom']; ?></h4>
      <p class="card-text">nom : <?php echo $fiche['nom']; ?></p>
      <p class="card-text">Sexe : <?php echo $fiche['sexe']; ?></p>
      <p class="card-text">Service : <?php echo $fiche['service']; ?></p>
      <p class="card-text">salaire : <?php echo $fiche['salaire']; ?></p>
    </div>
    <div class="card-footer text-muted">
      Date d'embauche ou de mise à jour : <?php echo $fiche['date_enregistrement']; ?>
    </div>
  </div>
  </div>
  </div>
  </main>
    

    

    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>