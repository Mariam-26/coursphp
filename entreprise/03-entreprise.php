<?php require_once '../entreprise/includes/header_entreprise.php'; ?>

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
      
      
      // $requete = $pdoEntreprise->query( "SELECT * FROM employes WHERE service='secretariat'");
      ?>

  
      



<main class="container">
          
<?php 
             $requete = $pdoEntreprise ->query ( "SELECT * FROM employes WHERE prenom='Employé'"); /* Ds la variable $requete => je fs ma requete en SQL grâce à la fonction query(). Cette dernière dt automatiquemment s'appuyer sr ma variable ds laquelle j'ai placé les infos de connection. */
             /* pr débug grâce à mon jeprint_r */
             $ligne = $requete->fetch(PDO:: FETCH_ASSOC);
            //  jeprint_r($ligne); 
            echo '<ol> 

            <li>id_employes :  '.$ligne['id_employes'].'</li>
            <li>Prenom :  '.$ligne['prenom'].'</li>
            <li>nom :  '.$ligne['nom'].'</li>
            <li>sexe :  '.$ligne['sexe'].'</li>
            <li>service :  '.$ligne['service'].'</li>
            <li>salaire :  '.$ligne['salaire'].'</li>
            <li>:date_embauche  '.$ligne['date_embauche'].'</li>
            </ol>'
              ?>

      <div class="row col-12">

      <div class="col-12 col-md-6">   
      <div class="card">
          <div class="card-header">
            ID de l'employé' : <?php echo 'id_embauche'; ?>
          </div>
          <div class="card-body">
            <h4 class="card-title">Prenom : <?php echo 'prenom'; ?></h4>
            <p class="card-text">nom : <?php echo'nom'; ?></p>
            <p class="card-text">sexe : <?php echo'sexe'; ?></p>
            <p class="card-text">service : <?php echo'service'; ?></p>
            <p class="card-text">salaire : <?php echo'salaire'; ?></p>
          </div>
          <div class="card-footer text-muted">
            Date d'embauchement ou de mise à jour : <?php echo 'date_enregistrement'; ?>
          </div>
        </div>
        </div>
        </div>




        <div class="col-12 col-md-6">
          <h2>Mise à jour du dernier salarié</h2>
          <form action="#" method="POST">
            <div class="mb-3">
              <label for="prenom">Prenom</label>
              <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo 'prenom'; ?>">
            </div>

            <div class="mb-3">
              <label for="nom">nom</label>
              <input type="text" name="nom" id="nom" class="form-control" value="<?php echo 'nom'; ?>">
            </div>

            <div class="mb-3">
              <label for="sexe">sexe</label>
              <input type="text" name="sexe" id="sexe" class="form-control" value="<?php echo 'sexe'; ?>">
            </div>

            <div class="mb-3">
              <label for="service">service</label>
              <input type="text" name="service" id="service" class="form-control" value="<?php echo 'service'; ?>">
            </div>

            <div class="mb-3">
              <label for="salaire">salaire</label>
              <input type="text" name="salaire" id="salaire" class="form-control" value="<?php echo 'salaire'; ?>">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">
            Mes à jour du dernier salarié
            </button>
          </form>

          <?php 
          // 
          if(!empty($_POST)){/* Je vérifie que mon formulaire n'est ps vide (not empty) */
            $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
            $_POST['nom'] = htmlspecialchars($_POST['nom']); /* grâce à ces instructions. je vérifie qu'on ne m'injecte ps de SQL ou du JS et j'évite les failles */
            $_POST['sexe'] = htmlspecialchars($_POST['sexe']); /* grâce à ces instructions. je vérifie qu'on ne m'injecte ps de SQL ou du JS et j'évite les failles */
            $_POST['service'] = htmlspecialchars($_POST['service']); /* grâce à ces instructions. je vérifie qu'on ne m'injecte ps de SQL ou du JS et j'évite les failles */
            $_POST['salaire'] = htmlspecialchars($_POST['salaire']); /* grâce à ces instructions. je vérifie qu'on ne m'injecte ps de SQL ou du JS et j'évite les failles */

            $resultat = $pdoEntreprise->prepare("UPDATE commentaire SET prenom = :prenom, nom = :nom, sexe = :sexe, service = :service, salaire = :salaire WHERE id_commentaire = :id_commentaire");

            $resultat->execute(array(
              ':id_employes' => $_GET['id_employes'],
              ':prenom' => $_POST['prenom'],
              ':nom' => $_POST['nom'],
              ':sexe' => $_POST['sexe'],
              ':service' => $_POST['service'],
              ':salaire' => $_POST['salaire']
            ));
            header('location:02_dialogue.php');
            exit();
          }
          ?>
        </div>


       
    </main>
    
    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>