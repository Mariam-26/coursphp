<?php
// 1- Méthodes de debug
require('inc/functions.php');

// 2- Connexion à la BDD
$pdoblog = new PDO(
    'mysql:host=localhost;dbname=blog',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
);

?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Modelisation de la BDD</title>

</head>

<body>
    <!-- 3-Ma nav en require_once -->
    <?php require_once('inc/nav.inc.php'); ?>
    <main>
  
        <div class="container bg-white mt-2 mb-2 m-auto p-2">
            <section class="row">
                <div class="col-12">
                    <?php
                    // 4- J'affiche toutes les infos de la table articles 
                    $requete = $pdoblog->query(" SELECT * FROM articles");
                    ?>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Contenu</th>
                                <th>Auteur</th>
                                <th>Date_parution</th>    
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { ?><!-- ouverture de la boucle while -->
                                <tr>
                                    <td><?php echo $ligne['id']; ?>
                                    </td>
                                    <td><img src="<?php echo $ligne['image']; ?>" alt="" class="img-fluid">
                                    </td>
                                    <td><?php echo $ligne['titre']; ?></td>
                                    <td><?php echo $ligne['contenu']; ?></td>
                                    <td><?php echo $ligne['auteur']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($ligne['date_parution'])); ?></td>
                                </tr>
                            <?php } ?><!-- fermeture de la boucle -->
                        </tbody>
                    </table>

                </div><!-- fin col -->
                
               
            </section><!-- fin row -->
            
        </div>
        <!-- fin container  -->
    </main>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>