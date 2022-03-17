<?php 
// 1- je require ma connection à la base de données
require('../modelisationBDD/connect.php');

// 2- Ma requete pour le  tableau articles 
$requete = $pdoBlog->query(" SELECT * FROM articles");

// 3- Traitement de l'ajout d'article
if (!empty($_POST)) {/* SI le formulaire n'est pas vide, j'exécute ce qui suit */
  /* Je m'assure que je n'ai pas d'insertion de SQL et de failles */
  $_POST['image'] = htmlspecialchars($_POST['image']);
  $_POST['titre'] = htmlspecialchars($_POST['titre']);
  $_POST['contenu'] = htmlspecialchars($_POST['contenu']);
  $_POST['auteur'] = htmlspecialchars($_POST['auteur']);
  $_POST['date_parution'] = htmlspecialchars($_POST['date_parution']);
  
  /* Je prépare ma requête avec des marqueurs pour l'instant vides */
  $insertion = $pdoBlog->prepare(" INSERT INTO articles(titre, contenu, image, auteur, date_parution) VALUES (:titre, :contenu, :image, :auteur, :date_parution) ");

// Je fs correspondre ms marqueurs vides aux éléments de mon form
  $insertion->execute(array(
    ':titre' => $_POST['titre'],
    ':contenu' => $_POST['contenu'],
    ':image' => $_POST['image'],
    ':auteur' => $_POST['auteur'],
    ':date_parution' => $_POST['date_parution'],    
      /* Mes marqueurs sont maintenant remplis avec les données récupérées grâce au name dans le formulaire */
  ));
}

// 4- J'initialise ma variable $contenu qui va me servir pr les messages de réussite ou d'erreur pr la supression

$contenu = ""; /* Je fais bien attention !!! i ne faut ps qu'il y est d'espace pr l'initialisation */

// 5- Suppression d'un élément
// jevar_dump($_GET);/* Vérification de ce que je récupère dans le get */
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id'])) {
    // si l'indice "action" existe dans $_GET et que sa valeur est "suppression" et que l'indice "id" existe  aussi, alors je peux traiter la suppression de l'article demandé // Voir lien sur le bouton suppression

    $resultat = $pdoBlog->prepare(" DELETE FROM articles WHERE id = :id ");/* Je prépare ma requête avec un marqueur vide : 'id' */

    $resultat->execute(array(
        ':id' => $_GET['id']
    ));/* Je signifie que le marqueur vide correspond à l'id récupéré ds $_GET id */

    if ($resultat->rowCount() == 0) {
        $contenu .= '<div class="alert alert-danger">Erreur de suppression de l\'article n° ' . $_GET['id'] . ' </div>';/* si ça n'a pas fonctionné j'affiche ça */
    } else {
        $contenu .= '<div class="alert alert-success">L\'article n° ' . $_GET['id'] . ' a bien été supprimé </div>';/* sinon j'affiche ça */
    }/* ici je me sers de ma variable contenu qui était vide mais dans laquelle j'injecte désormais du contenu */
}
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

     <!-- J'afficherai ici ce qui se trouve dans le contenu pour la suppression d'un élément -->
     <?php echo $contenu;?>
          
          <?php
              // 2- J'affiche un tableau avec les personnes travaillant dans l'entreprise
              $requete = $pdoBlog->query(" SELECT * FROM articles ");
          ?>

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
                        <a href="article1.php?id=<?php echo $article['id']; ?>" class="btn btn-primary m-2">Modification</a>
                        <!-- Ici le bouton pour la suppression = 
                        1- Je lui passe l'action suppression
                        2- je lui passe l'id de l'article --> 
                        <a href="articles1.php?action=suppression&id=<?php echo $article['id']; ?>" class="btn btn-danger m-2" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet article ?'))">Supprimer</a>
                        </div>
                    </td>
                                </tr>
                            <?php } ?><!-- fermeture de la boucle WHILE-->
                        </tbody>
                    </table>
    </div>

    <div class="col-8mx-auto">
    <h2 class="text-center">Ajout d'un article</h2>

<form action="#" method="POST" class="border bg-light p-2 rounded mx-auto">
  <div class="mb-3">
      <label for="titre">Titre de l'article :</label>
      <input type="text" name="titre" id="titre" class="form-control" required>
  </div><!-- TITRE --> <!-- l'attribut name ns sert à récupérer ce qui se trouve ds l'input pr l'envoiyer ds la BDD // c'est la raison pr laquelle il faut absolument que le name corresponde à la colonne de notre BDD -->
  <!-- pr que qd je clique sr le label j'arrive directement ds l'input, je dois mettre la m chose ds le label FOR et ds l'input ID -->
  <!-- TITRE -->

  <div class="mb-3">
        <label for="contenu">Contenu de l'article :</label>
        <input type="text" name="contenu" id="contenu" class="form-control" required>
    </div><!-- CONTENU -->

    <div class="mb-3">
        <label for="image">Image de l'article :</label>
        <input type="TEXT" name="image" id="image" class="form-control" required placeholder="URL de l'image">
    </div><!-- IMAGE -->
    
    <div class="mb-3">
        <label for="auteur">Auteur de l'article :</label>
        <input type="text" name="auteur" id="auteur" class="form-control" require>
        </input>
        </div><!-- AUTEUR -->

        <div class="mb-3">
            <label for="date_parution" class="form-label">Date de parution</label>
            <input type="date" name="date_parution" id="date_parution" class="form-control" required>
        </div><!-- DATE DE PARUTION -->

        <button type="submit" class="btn btn-primary" name="submit" >Ajouter un article</button><!-- BOUTON SUBMIT -->
    </form>
    <!-- FIN FORM -->
    </div>



  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>