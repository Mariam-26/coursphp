<?php 
// 
require_once 'connect.php';

// 2- Traitement du formulaire
if(!estConnecte()) {/* si la personne ne remplit ps ls conditions de la fonction estConnecte() alors on va la renvoyer vers la page connection.php */
header('location:connexion.php');




  
}



?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog - Connexion</title>
  <!-- BOOTSWATCH CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <div class="p-5 bg-primary">
      <div class="container">
          <h1 class="display-3 text-white">Profil de <?php echo $_SESSION['membres'] = ['nom']; ?> </h1>
          <!-- à partir du moment ou un membre est connecté, ses infos st passées ds la superglobale $_SESSION et on peut donc accéder à n'importe quel moment et endroit du site -->
          <p class="lead text-white">Bienvenue sur votre profil
            <?php if(estAdmin()){
              echo "<small>-- Vous êtes admin</small>";
            }else {
              echo "<small>-- Vous êtes admin</small>";
              if($_SESSION['membres']['civilite'] == 'f') {
                echo 'e';
              }
              echo "!</small>";
            }  ?> 
            </p>
      </div>
  </div>








  <div class="container">
      <div class="row">
          <div class="col-8 mx-auto">
          <!-- <?php echo $contenu; ?>
              <form action="#" method="POST" class="p-5 my-2 border-primary">

              <div class="mb-3">


    <label for="pseudo">pseudo *</label>
    <input type="text" name="pseudo" id="pseudo" class="form-control">

      </div>
            <div class="mb-3">
                <label for="mdp">Mot de passe *</label>
              <input type="password" name="mdp" id="mdp" class="form-control">
          </div>
                  <button type="submit" class="btn btn-primary">S'inscrire</button>

              </form> -->

          </div>
      </div>
  </div>


  <!-- BOOTSWATCH JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>