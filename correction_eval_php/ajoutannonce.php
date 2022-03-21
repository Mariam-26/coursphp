<?php 
// JE REQUIRE LA CONNECTION A LA BDD
require 'inc/init.inc.php';

// le traitement du formulaire en BDD
if (!empty($_POST)) {/* SI le formulaire n'est pas vide, j'exécute ce qui suit */
  /* Je m'assure que je n'ai pas d'insertion de SQL et de failles */
  $_POST['title'] = htmlspecialchars($_POST['title']);
  $_POST['description'] = htmlspecialchars($_POST['description']);
  $_POST['image'] = htmlspecialchars($_POST['image']);
  $_POST['postal_code'] = htmlspecialchars($_POST['postal_code']);
  $_POST['city'] = htmlspecialchars($_POST['city']);
  $_POST['type'] = htmlspecialchars($_POST['type']);
  $_POST['price'] = htmlspecialchars($_POST['price']);
  
  /* Je prépare ma requête avec des marqueurs pour l'instant vides */
  $insertion = $pdoLocation->prepare(" INSERT INTO advert (title, description, image, postal_code, city, type, price, reservation_message) VALUES (:title, :description, :image, :postal_code, :city, :type, :price, NULL) ");

// Je fs correspondre ms marqueurs vides aux éléments de mon form
  $insertion->execute(array(
    ':title' => $_POST['title'],
    ':description' => $_POST['description'],
    ':image' => $_POST['image'],
    ':postal_code' => $_POST['postal_code'],
    ':city' => $_POST['city'],    
    ':type' => $_POST['type'],    
    ':price' => $_POST['price'],    
      /* Mes marqueurs sont maintenant remplis avec les données récupérées grâce au name dans le formulaire */
  ));

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

    <title>Le Bon Appart - Ajouter une annonce</title>
  </head>
  <body>
    <div class="p-5 bg-light">
      <div class="container">
        <h1 class="display-3">Le Bon Appart</h1>
        <p class="lead">Ajout d'une annonce</p>
      
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 mx-auto">
          <!-- FORMULAIRE POUR INSERER DES ELEMENTS DANS LA BDD -->
          <form action="#" method="POST" class="p-3 bg-light border-primary round shadow">

          <div class="mb-3">
              <label for="title">Titre du bien</label>
              <input type="text" id="title" name="title" class="form-control">
            </div> <!-- Titre -->

            <div class="mb-3">
              <label for="description">Description du bien</label>
              <input type="text" id="description" name="description" class="form-control">
            </div> <!-- Description -->

            
            <div class="mb-3">
              <label for="image">Image du bien</label>
              <input type="text" id="image" name="image" class="form-control" placeholder="URL  de l'image">
            </div> <!-- Image -->

            <div class="mb-3">
              <label for="postal_code">Code_postal du bien</label>
              <input type="number" id="postal_code" name="postal_code" class="form-control">
            </div> <!-- Code_postal -->

            <div class="mb-3">
              <label for="city">Ville du bien</label>
              <input type="nuber" id="city" name="city" class="form-control">
            </div> <!-- Ville -->
            
            <div class="mb-3">
              <label for="type">Type du bien</label>
              <select name="type" id="type" class="form-select">
                <option value="">-- Choisir une option --</option>
                <option value="location">location</option>
                <option value="vente">vente</option>
              </select>
            </div> <!-- Type -->

            <div class="mb-3">
              <label for="price">Prix du bien</label>
              <input type="number" id="price" name="price" class="form-control">
            </div> <!-- Prix -->

            <button type="submit" class="btn btn-primary">AJOUTER LE BIEN</button>


          </form><!-- Fin form -->
        </div> <!-- Fin col-12 -->
      </div> <!-- Fin row -->
    </div> <!-- Fin container -->
   





   
    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>