<?php
// Je définie le titre
$titre = "mariam Ouédraogo";

//  INCLUSION DU HEADER 
require_once '../entreprise/includes/header_entreprise.php'; 

// CONNECTION A LA BASE DE DONNEES
require_once '../entreprise/connect.php';
?>



<!-- MAIN -->
<main class="container">
  <div class="row col-12">
      <div class="col-lg-12 col-md-12 col-sm-12">
      <h1 class="p-5 text-center">mariam Ouédraogo<h1>         
      
      <!-- CARD  -->
      <div class="col-12 col-md-6">   
      <div class="card">
        
          <div class="card-header">
            ID de l'employé : <?php echo $fiche['id_employes'];?>
          </div>
          <div class="card-body">
            <h4 class="card-title">Prenom : <?php echo $fiche['prenom'];?></h4>
            <p class="card-text">nom : <?php echo $fiche['nom'];?></p>
            <p class="card-text">sexe : <?php echo $fiche['sexe'];?></p>
            <p class="card-text">service : <?php echo $fiche['service'];?></p>
            <p class="card-text">salaire : <?php echo $fiche['salaire'];?></p>
            <p class="card-text">date_embauche : <?php echo $fiche['date_embauche'];?></p>
          </div>
          <div class="card-footer text-muted">
            Date d'embauchement ou de mise à jour : <?php echo date('d/m/y', strtotime($fiche['date_enregistrement'])); ?>
          </div>
        </div>
        </div>

        <!-- FORMULAIRE DE LA MISE A JOUR -->
        <div class="col-12 col-md-6 m-auto">
          <h2 class="p-5 ">Mise à jour du  salarié</h2>
          <form action="#" method="POST" class="mb-5">

            <div class="mb-3">
              <label for="prenom">Prenom</label>
              <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $fiche['prenom']; ?>">
            </div>

            <div class="mb-3">
              <label for="nom">nom</label>
              <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $fiche['nom']; ?>">
            </div>

            <div class="mb-3">
              <label for="sexe">sexe</label>
              <input type="text" name="sexe" id="sexe" class="form-control" value="<?php echo $fiche['sexe']; ?>">
            </div>

            <div class="mb-3">
              <label for="service">service</label>
              <input type="text" name="service" id="service" class="form-control" value="<?php echo $fiche['service']; ?>">
            </div>

            <div class="mb-3">
              <label for="salaire">salaire</label>
              <input type="text" name="salaire" id="salaire" class="form-control" value="<?php echo $fiche['salaire']; ?>">
            </div>

            <div class="mb-3">
              <label for="date">date_embauche</label>
              <input type="date" name="date" id="date" class="form-control" value="<?php echo $fiche['date']; ?>">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">
            Mise à jour du salarié
            </button>
          </form>
           <!-- FIN FORMULAIRE DE LA MISE A JOUR -->

          <?php 
          // 
          if(!empty($_POST)){/* Je vérifie que mon formulaire n'est ps vide  */

            // Instruction pour contrer carrer toutes failles
            $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
            $_POST['nom'] = htmlspecialchars($_POST['nom']); 
            $_POST['sexe'] = htmlspecialchars($_POST['sexe']); 
            $_POST['service'] = htmlspecialchars($_POST['service']);
            $_POST['salaire'] = htmlspecialchars($_POST['salaire']); 

            $resultat = $pdoEntreprise->prepare("UPDATE employes SET prenom = :prenom, nom = :nom, sexe = :sexe, service = :service, salaire = :salaire WHERE id_employes = :id_employes");

            $resultat->execute(array(
             
              ':prenom' => $_POST['prenom'],
              ':nom' => $_POST['nom'],
              ':sexe' => $_POST['sexe'],
              ':service' => $_POST['service'],
              ':salaire' => $_POST['salaire'],
             
            ));
            // header('location:02-entreprise.php');
            // exit();
          }
          ?>        
        </div>
        </div>
        </div>
         
    </main>
    <!-- FIN MAIN -->

    <!-- INCLUSION DU FOOTER -->  
    <?php require_once '../entreprise/includes/footer_entreprise.php'; ?> 
