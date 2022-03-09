<?php
// 1-Méthodes de debug
require('inc/functions.php');

// 2- Connexion BDD
$pdoBlog = new PDO(
    'mysql:host=localhost;dbname=blog',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // afficher les erreurs SQL dans le navigateur
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // charset des échanges avec la BDD
    )
);

// 3- Réception des infos d'un employé avec $_GET
if (isset($_GET['id'])) {
    $resultat = $pdoBlog->prepare(" SELECT * FROM articles WHERE id = :id ");
    $resultat->execute(array(
        ':id' => $_GET['id'] // on associe le marqueur vide à l'id
    ));
    if ($resultat->rowCount() == 0) {
        header('location:articles.php');
        exit();
    }
    $fiche = $resultat->fetch(PDO::FETCH_ASSOC); /* Sr notre variable résultat qui contient notre requête (ici  on sélection ttes ls infos d'un employé donné)  on demande fetch (va chercher) et on lui indique qu'il ft recupérer les infos ds la BDD FETCH_ASSOC permet de renvoyer ls résultats d'une rangée comme venant d'un tableau*/
} else {/* si la personne vient sur la page juste 03-entreprise.ph on la renvoie vers la page °2-entreprise.php //Doit être à l'exterieur du if principal car on demande de sortir di on ne récupère ps l'id_employes ds l'URL  */
    header('location:articles.php');
    exit();
}

//4- MàJ d'un employé
if (!empty($_POST)) {
    $_POST['image'] = htmlspecialchars($_POST['image']);
    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['contenu'] = htmlspecialchars($_POST['contenu']);
    $_POST['auteur'] = htmlspecialchars($_POST['auteur']);
    $_POST['date_parution'] = htmlspecialchars($_POST['date_parution']);
    
    $resultat = $pdoBlog->prepare(" UPDATE articles SET image = :image, titre = :titre, contenu = :contenu, auteur = :auteur, date_parution = :date_parution WHERE id = :id");
    /* On utilise prepare lorsque l'on prépare une requête avec des marqueurs (:nomduchamp) */

    $resultat->execute(array(
        ':image' => $_POST['image'],
        ':titre' => $_POST['titre'],
        ':contenu' => $_POST['contenu'],
        ':auteur' => $_POST['auteur'],
        ':date_parution' => $_POST['date_parution'],
        ':id' => $_GET['id'],
    ));
    /* Je fais ensuite correspondre les marqueurs jusqu'à là vides aux donnéees que je récupère de mon formulaire */

    header('location:articles.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Modelisation de la BDD - mise à jour d'un article</title>

</head>

<body>
    <?php require_once('inc/nav.inc.php') ?>
    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Modelisation de la BDD</h1>
            <p class="lead">Mise à jour de l'article #<?php echo $fiche['id'] ?></p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="articles.php" role="button">Voir tous les articles</a>
            </p>
        </div>
    </div>
    <main class="container">
        <section class="row my-5">

            <div class="col-md-4 alert-primary rounded p-5">
                <!-- J'affiche toutes les informations relatives à l'employé sélectionné -->

                <h2 class="text-center mb-4">Fiche de l'article
                    
                    </h2>

                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center"><?php echo $fiche['image'] . " " . $fiche['titre']; ?></h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Contenu : <?php echo $fiche['contenu'] ?></p>
                        
                        <p class="card-text">Date de parution :
                            <?php
                            echo date('d/m/Y', strtotime($fiche['date_parution']))
                            ?>
                        </p>
                        <p class="card-text">Auteur : <?php echo $fiche['auteur']; ?></p>
                    </div>
                </div>

            </div>
            <!-- fin col -->

            <div class="col-md-8 alert-warning p-5 rounded">
                <!-- Je m'occupe de la màj de la fiche de l'employé concerné -->
                <h2 class="text-center">Mettre à jour <?php  ?></h2>
                <form action="#" method="POST">
                    <!-- IL FAUT PENSER LORSQUE L'ON FAIT UN FORMULAIRE DE MISE A JOUR A PASSER EN VALUE LES DONNEES POUR VOIR CE QUI ETAIT AVANT ET CE QUE L'ON VEUT CHANGER -->

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="text" name="image" id="image" class="form-control" value="<?php echo $fiche['image']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" name="titre" id="titre" class="form-control" value="<?php echo $fiche['titre']; ?>">
                    </div>

                    
                    <div class="mb-3">
                        <label for="contenu" class="form-label">Contenu</label>
                        <input type="text" name="contenu" id="contenu" class="form-control" value="<?php echo $fiche['contenu']; ?>">
                            <!-- POUR LE contenu, JE BOUCLE SUR LES CONTENUS EXISTANTS DANS LA BDD AFIN DE NE PAS AVOIR UN CODE TROP LONG || CODE THOMASTORRENTE -->
                            <?php
                            // requete pour le select du contenu
                            $requete_contenu = $pdoBlog->query("SELECT DISTINCT contenu FROM articles");
                            while ($contenu = $requete_contenu->fetch(PDO::FETCH_ASSOC)) {

                                echo "<option value=\"" . $contenu['contenu'] . "\" >" . $contenu['contenu'] . "</option>"; /* ici on sélection ts ls contenus qui existent ds la BDD et on ls affiche en tant qu'option avec la valeur à laquelle l'option correspond */
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="date_embauche" class="form-label">Date de parution</label>
                        <input type="date" name="date_parution" id="date_parution" class="form-control" value="<?php echo $fiche['date_parution']; ?>"><!-- Bien penser à mettre un input type date -->
                    </div>

                    <div class="mb-3">
                        <label for="auteur" class="form-label">Auteur</label>
                        <input type="text" name="auteur" id="auteur" class="form-control" value="<?php echo $fiche['auteur']; ?>">
                    </div><!-- Ici un input de type text pour être sur de ne pas insérer de string -->

                    <button type="submit" class="btn btn-warning">Mettre à jour</button>
                </form>

            </div>
            <!-- fin col -->
        </section>
        <!-- fin row -->
        </div>
        <!-- fin container  -->
    </main>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>