<?php 
// 1- Je require ma connexion à la base de données
require('inc/init.inc.php');

// 2- Je fais ma requête pour afficher un tableau avec les 5 articles les plus récents
$requete = $pdoBlog->query(" SELECT * FROM articles ORDER BY date_parution DESC LIMIT 0,5 "); 
/* Grâce aux valeurs précisées après le limit, je précise d'abord que je veux commencer au premier élément du tableau, et je précise ensuite que je veux limiter à 5 éléments */

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Accueil</title>
    <!-- BOOTSWATCH CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="p-5 bg-primary">
        <div class="container">
            <h1 class="display-3 text-white">Back office Blog</h1>
            <p class="lead text-white">Page d'accueil</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Image</th>
                            <th>Auteur</th>
                            <th>Date de parution</th>
                        </tr>
                    </thead><!-- fin de l'en-tête -->
                    <tbody>
                        <?php while ($article = $requete->fetch(PDO::FETCH_ASSOC)) { ?> <!-- OUVERTURE DE LA BOUCLE WHILE // Ce n'est pas parce que je ne suis plus dans un passage PHP que ma boucle ne continue pas // Tant que je n'ai pas mis d'accolade fermante, la boucle continue -->
                            <tr>
                                <td><?php echo $article['id']; ?></td>
                                <td><?php echo $article['titre']; ?></td>
                                <td><?php echo $article['contenu']; ?></td>
                                <td><img src="<?php echo $article['image']; ?>" alt="Illustation article" class="img-fluid"></td>
                                <td><?php echo $article['auteur']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($article['date_parution'])); ?></td>
                            </tr>
                        <?php } ?><!-- Fermeture de ma boucle while -->
                    </tbody><!-- Fermeture de tbody -->

                </table>


            </div>
        </div>
    </div>


    <!-- BOOTSWATCH JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>