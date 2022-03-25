<?php
// Je mets en require la connexion à la bbd
require 'inc/init.inc.php';


if (isset($_GET['id'])) {
    $requete = $pdoAppart->prepare(" SELECT * FROM advert WHERE id = :id ");
    $requete->execute(array(
        ':id' => $_GET['id'],/* J'associe mon marqueur vide à l'id que je récupère dans l'URL */
    ));

    if ($requete->rowCount() == 0) {
        header('location:annonces.php');
        exit();
    }
    $annonce = $requete->fetch(PDO::FETCH_ASSOC);
} else {
    header('location:annonces.php');
    exit();
}

/* TODO
1- update avec message reservation
2- CK Editor
*/

$contenu = "";/* Initialisation de la variable qui va servir à afficher le message d'erreur, si erreur */

// La màj d'une annonce

$contenu = "";/* J'initialise ma cariable qui va me servir à afficher un message d'erreur en cas de soucis pour l'insertion */

// 4- MàJ d'un article
if (!empty($_POST)) {

    if ($_POST['reservation_message'] < 5) {/* Je vérifie que la personne n'envoie pas un formulaire vide */
        $contenu .= "<div class=\"alert alert-danger\">Merci de bien vouloir remplir le champ de réservation !</div>";
    }

        $_POST['reservation_message'] = htmlspecialchars($_POST['reservation_message']);

        $maj = $pdoAppart->prepare(" UPDATE advert SET reservation_message = :reservation_message WHERE id = :id ");

        $maj->execute(array(
            ':id' => $_GET['id'],
            ':reservation_message' => $_POST['reservation_message'],
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

    <title>Le Bon Appart - <?php echo $annonce['title'] ?></title>

    <!-- CKEDITOR 5
    1- https://ckeditor.com/docs/ckeditor5/latest/builds/guides/quick-start.html
    2- On colle le CDN dans l'en tête
    3- On colle le script avant la fermeture de body
    4- On donne dans le script l'id qui correspond à notre élément
    5- Comme c'est une page accessible par tout le monde, on enlève pas le htmlspecialchars (on ne veux pas que les gens malveillants puissent nous injecter du sql)
    6- On va donc ajouter une fonction prédéfinie qui va nous permettre de lire les balises correctement : html_entity_decode(le texte qui doit être analysé)
    -->
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
</head>

<body>
    <?php require('inc/nav.inc.php') ?>

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3"><?php echo $annonce['title'] ?></h1>
            <p class="lead">En <?php echo $annonce['type'] ?></p>
            <p>
                <small>
                    <?php
                    $formatArgent = numfmt_create('fr_FR', NumberFormatter::CURRENCY);
                    echo numfmt_format_currency($formatArgent, $annonce['price'], "EUR");
                    ?>
                </small> <br>
                <small class="text-uppercase"><?php echo $annonce['city'] ?></small>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">

            <div class="col-7 mx-auto">
                <figure>
                    <img src="<?php echo $annonce['image'] ?>" alt="Image d'illustration de l'annonce <?php echo $annonce['title'] ?>" class="img-fluid">
                </figure>

                <?php echo $annonce['description'] ?>
            </div>

        </div><!-- fin de la rangée -->

        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <?php if (empty($annonce['reservation_message'])){ ?><!-- Si il n'y a pas de message de réservation; j'affiche un formulaire pour réserver le bien -->

                    <h2>Réservation du bien</h2>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="reservation_message">Votre message de réservation</label>
                            <textarea name="reservation_message" id="reservation_message" cols="30" rows="10" class="form-control"></textarea>
                            <?php echo $contenu; ?>
                        </div>
                        <button type="submit" class="btn btn-warning">JE RÉSERVE</button>
                    </form>
                <?php }else{ ?><!-- sinon j'affiche unea alert avec le message de réservation -->
                    <div class="alert alert-danger text-center">
                        Ce bien a déjà été réservé. <br>
                        Message de réservation : <?php echo html_entity_decode($annonce['reservation_message']); ?>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div><!-- fin du container -->


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Script de CK Editor -->
    <script>
        ClassicEditor
            .create(document.querySelector('#reservation_message'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>