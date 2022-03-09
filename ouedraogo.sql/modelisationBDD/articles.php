.<?php
// 1- Méthodes de debug
require('inc/functions.php');

// 2- Connexion à la BDD
$pdoBlog = new PDO(
    'mysql:host=localhost;dbname=blog',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
);

// 3- Vérification du formulaire d'insertion
if (!empty($_POST)) {/* SI le formulaire n'est pas vide, j'exécute ce qui suit */
    /* Je m'assure que je n'ai pas d'insertion de SQL et de failles */
    $_POST['image'] = htmlspecialchars($_POST['image']);
    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['contenu'] = htmlspecialchars($_POST['contenu']);
    $_POST['auteur'] = htmlspecialchars($_POST['auteur']);
    $_POST['date_parution'] = htmlspecialchars($_POST['date_parution']);
    
    /* Je prépare ma requête avec des marqueurs pour l'instant vides */
    $insertion = $pdoBlog->prepare(" INSERT INTO articles(image, titre, contenu, auteur, date_parution) VALUES (:image, :titre, :contenu, :auteur, :date_parution) ");

    $insertion->execute(array(
        ':image' => $_POST['image'],
        ':titre' => $_POST['titre'],
        ':contenu' => $_POST['contenu'],
        ':auteur' => $_POST['auteur'],
        ':date_parution' => $_POST['date_parution'],
        
        /* Mes marqueurs sont maintenant remplis avec les données récupérées grâce au name dans le formulaire */
    ));
}

// 4- J'initialise ma variable $contenu qui va me servir par la suite
$contenu = "";

// 5- Suppression d'un élément
// jevar_dump($_GET);/* Vérification de ce que je récupère dans le get */
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id'])) {
    // si l'indice "action" existe dans $_GET et que sa valeur est "suppression" et que l'indice "id" existe  aussi, alors je peux traiter la suppression de l'employé demandé // Voir lien sur le bouton suppression

    $resultat = $pdoBlog->prepare(" DELETE FROM articles WHERE id = :id ");/* Je prépare ma requête avec un marqueur vide : 'id_employes' */

    $resultat->execute(array(
        ':id' => $_GET['id']
    ));/* Je signifie que le marqueur vide correspond à l'id_employes récupéré ds $_GET id_empoyes */

    if ($resultat->rowCount() == 0) {
        $contenu .= '<div class="alert alert-danger">Erreur de suppression de l\'article n° ' . $_GET['id'] . ' </div>';/* si ça n'a pas fonctionné j'affiche ça */
    } else {
        $contenu .= '<div class="alert alert-success">L\'article n° ' . $_GET['id'] . ' a bien été supprimé </div>';/* sinon j'affiche ça */
    }/* ici je me sers de ma variable contenu qui était vide mais dans laquelle j'injecte désormais du contenu */
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

    <title>Les articles</title>

</head>

<body>
    <!-- 6- Ma nav en require_once -->
    <?php require_once('inc/nav.inc.php'); ?>
    <main>
        <div class="p-5 bg-light">
            <div class="container">
                <h1 class="display-3">Modelisation de la BDD</h1>
                <p class="lead">Page articles</p>
            </div>
        </div>
        <!-- fin container-fluid header  -->
        <div class="container bg-white mt-2 mb-2 m-auto p-2">

            <!-- J'afficherai ici ce qui se trouve dans le contenu pour la suppression d'un élément -->
            <?php
            echo $contenu;
            ?>

            <section class="row">

                <div class="col-12 col-lg-8 table-responsive">
                    <h2 class="text-center">Les articles</h2>
                    <?php
                    // 2- J'affiche un tableau avec les personnes travaillant dans l'entreprise
                    $requete = $pdoBlog->query(" SELECT * FROM articles ");
                    ?>

                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Contenu</th>
                                <th>Auteur</th>
                                <th>Date de parution</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ouverture de la boucle while -->
                            <?php while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr class="text-center">
                                    <td><?php echo $ligne['id']; ?></td>
                                    <td><img src="<?php echo $ligne['image']; ?>" alt="" class="img-fluid">
                                    </td>
                                    <td><?php echo $ligne['titre']; ?></td>
                                    <td><?php echo $ligne['contenu']; ?></td>
                                    <td><?php echo $ligne['auteur']; ?></td>
                                    
                                    <td><?php echo date('d-m-Y', strtotime($ligne['date_parution'])); ?></td>
                                    <td>
                                        <div class="btn-group">
                                        <a href="article.php?id=<?php echo $ligne['id']; ?>" class="btn btn-success">Modification</a>
                                            <!-- Ici le bouton pour la suppression = 
                                                  1- Je lui passe l'action suppression
                                                  2- je lui passe l'id de l'employé  
                                                    -->
                                            <a href="article.php?action=suppression&id=<?php echo $ligne['id']; ?>" class="btn btn-danger" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet article ?'))">Supprimer</a>
                                        </div>
                                    </td>
                                </tr>
                                
                            <?php } ?><!-- fermeture de la boucle -->
                        </tbody>
                    </table>

                </div><!-- fin col -->

                <div class="col-12 col-lg-4">
                    <h2 class="text-center mb-4">Ajout d'un article</h2>

                    <form action="#" method="POST" class="border bg-light p-2 rounded mx-auto">

                        <div class="mb-3">
                            <label for="image">image de l'article :</label>
                            <input type="image" name="image" id="image" class="form-control" required>
                        </div><!-- IMAGE -->

                        <div class="mb-3">
                            <label for="titre">Titre de l'article :</label>
                            <input type="text" name="titre" id="titre" class="form-control" required>
                        </div><!-- TITRE -->
                        
                        <div class="mb-3">
                            <label for="contenu">Contenu de l'article :</label>
                            <input type="text" name="contenu" id="contenu" class="form-control" required>
                        </div><!-- CONTENU -->

                        <div class="mb-3">
                            <label for="auteur">Auteur de l'article :</label>
                            <select name="auteur" id="auteur" class="form-select">
                                <?php
                                $requete_auteur = $pdoBlog->query("SELECT DISTINCT auteur FROM articles");
                                while ($auteur = $requete_auteur->fetch((PDO::FETCH_ASSOC))) {
                                    echo "<option value=\"" . $auteur['auteur'] . "\" >" . $auteur['auteur'] . "</option>";
                                }
                                ?>
                            </select>
                        </div><!-- SERVICE -->

                        <div class="mb-3">
                            <label for="date_parution" class="form-label">Date de parution</label>
                            <input type="date" name="date_parution" id="date_parution" class="form-control" required>
                        </div><!-- DATE DE PARUTION -->

                        <button type="submit" class="btn btn-success" name="submit" id="submit">Ajouter un article</button><!-- BOUTON SUBMIT -->

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