<?php 
// 
require_once 'connect.php';

// 2- Traitement du formulaire

if(!empty($_POST)){
  /* Les if qui suivent vont permettre de vérifier si les valeurs passées dans $_POST correspondent bien à ce qui est attendu en BDD */
  if(!isset($_POST['pseudo']) || empty($_POST['mdp'])) {/* si le mdp n'est pas defini ou que pseudo et  mdp st requis */
    $contenu .= "<div class=\"alert alert-warning\">Le mot de passe et le pseudo sont requis !</div>";
}

if(empty($_POST['contenu'])) { 
  $resultat = $pdoBlog->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
  $resultat->execute(array
  ':pseudo' => $_POST['pseudo']),
));
}

      if($resultat->rowCount() == 1) {/* si au décompte de cette requête on obtient pas 0 c'est que le pseudo existe déjà */
         $membre = $resultat->fetchch(PDO::FETCH_ASSOC);
         debug($membre);
      if(password_verify($_POST['mdp'])){
        $_SESSION['membres'] = $Membre;
        header('location:profill.php')
      }else { /* si le mot de passe n'est pas bon */
        $contenu .= "<div class=\"alert alert-warning\">Attention, vous n'avez pas le bon mot de passe !</div>";
      }
      }else { /* si le pseufo n'est pas bon */
        $contenu .= "<div class=\"alert alert-warning\">Erreur sur le pseudo, ATTENTION !</div>";
      }
  }
// } fin IF principal



?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog - Connection</title>
  <!-- BOOTSWATCH CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <div class="p-5 bg-primary">
      <div class="container">
          <h1 class="display-3 text-white">Connection Blog</h1>
          <p class="lead text-white">Connectez-vous à votre compte</p>
      </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-8 mx-auto">
          <?php echo $contenu; ?>
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

              </form>

          </div>
      </div>
  </div>


  <!-- BOOTSWATCH JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>