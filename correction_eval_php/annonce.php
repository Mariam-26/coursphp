<?php
// Je mets en require la connexion à la bbd
require 'inc/init.inc.php';
if (isset($_GET['id'])) {
  $requete = $pdoLocation->prepare("SELECT * FROM advert WHERE id = :id ");
  $requete->execute(array(
    ':id' => $_GET['id'],
  ));
  if ($requete->rowCount() == 0) {
    header('locatio:annonces.php');
    exit();
  }
  $annonce = $requete->fetch(PDO::FETCH_ASSOC);
} else {
  header('location:annonces.php');
  exit();
}

?>
<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Le Bon Appart - <?php echo $annonce['title'] ?></title>
</head>

<body>
  
  <!-- Je require la NAVBAR -->
  <?php require 'inc/nav.inc.php' ?>

  <div class="p-5 bg-light">
    <div class="container">
      <h1 class="display-3"><?php echo $annonce['title'] ?></h1>
      <p class="lead">En<?php echo $annonce['type'] ?></p>
      <p>
        <small>
          <?php $formatArgent = numfmt_create('fr_FR', NumberFormatter::CURRENCY);
          echo numfmt_format_currency($formatArgent, $annonce['price'], "EUR"); ?>
        </small>
      </p>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-7 mx-auto"></div>
      <figure>
        <img src="<?php echo $annonce['image'] ?>" alt="Image d'illustration de l'annonce <?php echo $annonce['title']?>" class="img-fluid">
      </figure>
      <?php echo $annonce['description'] ?>


    </div><!-- fin de la rangée -->

    <div class="row">
      <div class="col-12 col-md-6 mx-auto">
        <?php il(empty($annonce['reservation_message'])) {?>
          <h2>Réservation du bien</h2>
          <form action="#" method="POST">
            <div class="mb-3">
              <label for="reservation_message">Votre message de réservation</label>
              <textarea name="reservation_message" id="reservation_message" cols="30" rows="10" class="form-control"></textarea>
              <?php echo $contenu ?>
            </div>
            <button type="submi"></button>
          </form>
        } 
      </div>
    </div>
  </div><!-- fin du container -->


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>