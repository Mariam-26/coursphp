<!-- INCLUS -->
<?php 
// 1- je require ma connection à la base de données
require('../modelisationBDD/connect.php');

// 3- Réception des infos de l'article grâce aux infos récupérées ds l'URL avec $_GET
if (isset($_GET['id'])) {
    $article = $pdoBlog->prepare(" SELECT * FROM articles WHERE id = :id ");
    $article->execute(array(
        ':id' => $_GET['id'] // on associe le marqueur vide à l'id
    ));
    if ($article->rowCount() == 0) {/* Si le cpde renvoie un id inconnu */
        header('location:articles1.php');
        exit();
    }
    $fiche = $article->fetch(PDO::FETCH_ASSOC); /* Sr notre variable résultat qui contient notre requête (ici  on sélection ttes ls infos d'un article donné)  on demande fetch (va chercher) et on lui indique qu'il ft recupérer les infos ds la BDD FETCH_ASSOC permet de renvoyer ls résultats d'une rangée comme venant d'un tableau*/
} else {/* si la personne vient sur la page juste article.ph on la renvoie vers la page articles.php //Doit être à l'exterieur du if principal car on demande de sortir si on ne récupère ps l'id ds l'URL  */
    header('location:articles1.php');
    exit();
}

//4- MàJ d'un article
if (!empty($_POST)) {
    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['contenu'] = htmlspecialchars($_POST['contenu']);
    $_POST['image'] = htmlspecialchars($_POST['image']);
    $_POST['auteur'] = htmlspecialchars($_POST['auteur']);
    $_POST['date_parution'] = htmlspecialchars($_POST['date_parution']);
    
    $article = $pdoBlog->prepare(" UPDATE articles SET titre = :titre, contenu = :contenu, image = :image, auteur = :auteur, date_parution = :date_parution WHERE id = :id");
    /* On utilise prepare lorsque l'on prépare une requête avec des marqueurs (:nomduchamp) */

    $article->execute(array(
        ':titre' => $_POST['titre'],
        ':contenu' => $_POST['contenu'],
        ':image' => $_POST['image'],
        ':auteur' => $_POST['auteur'],
        ':date_parution' => $_POST['date_parution'],
        ':id' => $_GET['id'],
    ));
    /* Je fais ensuite correspondre les marqueurs jusqu'à là vides aux donnéees que je récupère de mon formulaire */

    header('location:articles1.php');
    exit();
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
    <h1 class="display-3 text-white"><?php echo $fiche['titre']; ?></h1>
    <p class="lead text-white">Page de l'article n° <?php echo $fiche['auteur'];?></p>
    <p> <small class="lead text-white">Page de l'article n° <?php echo $fiche['date_parution']; ?></small> </p>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12">
    <div class="col-8 mx-auto p-5">
    <p><img src=" <?php echo $fiche['image']; ?>" alt="Illustration article" class="img-fluid py-5"></p>
    <p><?php echo $fiche['contenu']; ?></p>
    </div>

    <div class="col-8 mx-auto my-5">
         <!-- Je m'occupe de la màj de la fiche de l'article concerné -->
         <h2 class="text-center p-3">Mise à jour de l'article</h2>
            <form action="#" method="POST">
                <!-- IL FAUT PENSER LORSQUE L'ON FAIT UN FORMULAIRE DE MISE A JOUR DE L'ARTICLE A PASSER EN VALUE LES DONNEES POUR VOIR CE QUI ETAIT AVANT ET CE QUE L'ON VEUT CHANGER -->

                <div class="mb-3">
                    <label for="titre" class="form-label">Titre de l'article</label>
                    <input type="text" name="titre" id="titre" class="form-control" value="<?php echo $fiche['titre']; ?>">
                </div>
            
                <div class="mb-3">
                    <label for="contenu">Contenu de l'article</label>
                    <textarea type="text" name="contenu" id="contenu" class="form-control"><?php echo $fiche['contenu']; ?>
                    </textarea> <!-- L'atribut value ne fonction ps sr le TEXAREA => on met donc le contenu entre les balises ouvrantes et fermantes -->
                    
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">URL de l'image</label>
                    <input type="text" name="image" id="image" class="form-control" value="<?php echo $fiche['image']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="auteur" class="form-label">Auteur</label>
                    <input type="text" name="auteur" id="auteur" class="form-control" value="<?php echo $fiche['auteur']; ?>">
                </div><!-- Ici un input de type text pour être sur de ne pas insérer de string -->

                <div class="mb-3">
                    <label for="date_parution" class="form-label">Date de parution</label>
                    <input type="date" name="date_parution" id="date_parution" class="form-control" value="<?php echo $fiche['date_parution']; ?>"><!-- Bien penser à mettre un input type date -->
                </div>

                <button type="submit" class="btn btn-warning">Mettre à jour      </button>
            </form>
            <!-- FIN FORM -->
    </div>

        </div>
        <!-- FIN COL -->           
    </div>
    <!-- FIN ROW  -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

