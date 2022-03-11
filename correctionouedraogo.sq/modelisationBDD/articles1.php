<?php 
require('../modelisationBDD/connect.php');

// 4- J'affiche toutes les infos de la table articles 
$requete = $pdoBlog->query(" SELECT * FROM articles");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog - page des articles</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="p-5 bg-primary">
  <div class="container">
    <h1 class="display-3 text-white">Back office - Blog</h1>
    <p class="lead text-white">Page des articles</p>
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
                                <th>Actions</th>    
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($article = $requete->fetch(PDO::FETCH_ASSOC)) { ?><!-- ouverture de la boucle WHILE -->
                                <tr>
                                    <td><?php echo $article['id']; ?>
                                    </td>
                                    <td><?php echo $article['titre']; ?></td>
                                    <td><?php echo $article['contenu']; ?></td>
                                    <td><img src="<?php echo $article['image']; ?>" alt="IMAGE" class="img-fluid">
                                    </td>
                                    <td><?php echo $article['auteur']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($article['date_parution'])); ?></td>
                                    <td>
                        <div class="btn-group">
                        <a href="article.php?id=<?php echo $article['id']; ?>" class="btn btn-primary m-2">Modification</a>
                        <!-- Ici le bouton pour la suppression = 
                        1- Je lui passe l'action suppression
                        2- je lui passe l'id de l'article --> 
                        <a href="articles.php?action=suppression&id=<?php echo $article['id']; ?>" class="btn btn-danger m-2" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet article ?'))">Supprimer</a>
                        </div>
                    </td>
                                </tr>
                            <?php } ?><!-- fermeture de la boucle WHILE-->
                        </tbody>
                    </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>