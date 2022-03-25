<?php
// Je mets en require la connexion à la bbd
require 'inc/init.inc.php';

// Le traitement du formailaire pour l'insertion en BDD
if (!empty($_POST)) {

    /* Vérification SQL ety failles */
    $_POST['title'] = htmlspecialchars($_POST['title']);
    $_POST['description'] = $_POST['description'];
    $_POST['image'] = htmlspecialchars($_POST['image']);
    $_POST['postal_code'] = htmlspecialchars($_POST['postal_code']);
    $_POST['city'] = htmlspecialchars($_POST['city']);
    $_POST['type'] = htmlspecialchars($_POST['type']);
    $_POST['price'] = htmlspecialchars($_POST['price']);

    $insertion = $pdoAppart->prepare(" INSERT INTO advert (title, description, image, postal_code, city, type, price, reservation_message) VALUES (:title, :description, :image, :postal_code, :city, :type, :price, NULL) ");

    $insertion->execute(array(
        ':title' => $_POST['title'],
        ':description' => $_POST['description'],
        ':image' => $_POST['image'],
        ':postal_code' => $_POST['postal_code'],
        ':city' => $_POST['city'],
        ':type' => $_POST['type'],
        ':price' => $_POST['price'],
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

    <!-- 
    CDN CKEDITOR 5
    1- https://ckeditor.com/docs/ckeditor5/latest/builds/guides/quick-start.html
    2- On colle le CDN dans l'en tête
    3- On colle le script avant la fermeture de body
    4- On donne dans le script l'id qui correspond à notre élément
    5- On enlève, si c'est une page exclusivement accesible par un admin, le htmlspecialchars du champ concerné
    -->
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

</head>

<body>
    <?php require('inc/nav.inc.php') ?>

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Le Bon Appart</h1>
            <p class="lead">Ajout d'une annonce</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <!-- Mon formulaire pour insérer des éléments dans la BDD -->
                <form action="#" method="POST" class="p-3 bg-light border border-primary rounded shadow">

                    <div class="mb-3">
                        <label for="title">Titre du bien</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div><!-- TITRE -->

                    <div class="mb-3">
                        <label for="description">Description du bien</label>
                        <textarea type="text" name="description" id="description" class="form-control"></textarea>
                    </div><!-- DESCRIPTION -->

                    <div class="mb-3">
                        <label for="image">Image du bien</label>
                        <input type="text" name="image" id="image" class="form-control" placeholder="URL de l'image">
                    </div><!-- IMAGE -->

                    <div class="mb-3">
                        <label for="postal_code">Code postal du bien</label>
                        <input type="number" name="postal_code" id="postal_code" class="form-control">
                    </div><!-- CODE POSTAL -->

                    <div class="mb-3">
                        <label for="city">Ville du bien</label>
                        <input type="text" name="city" id="city" class="form-control">
                    </div><!-- VILLE -->

                    <div class="mb-3">
                        <label for="type">Type de bien</label>
                        <select name="type" id="type" class="form-select">
                            <option value="">-- Choisir une option --</option>
                            <option value="location">Location</option>
                            <option value="vente">Vente</option>
                        </select>
                    </div><!-- TYPE -->

                    <div class="mb-3">
                        <label for="price">Prix du bien</label>
                        <input type="number" name="price" id="price" class="form-control">
                    </div><!-- PRIX -->

                    <button type="submit" name="submit" class="btn btn-primary">AJOUTER LE BIEN</button>
                </form><!-- fin du form -->

            </div><!-- fin de la col -->
        </div><!-- fin de la rangée -->
    </div><!-- fin du container -->


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Script de CK Editor -->
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>


</body>

</html>