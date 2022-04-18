<?php
// Je définie le titre
$titre = "Blog - les articles";

// INCLUSION DU HEADER
require_once '../modelisationBDD/includes/header_blog.php';

// ACTIVER ARTICLES DANS LA BAR DE NAVIGATION
$nav = "articles";

// CONNECTION A LA BASE DE DONNEES
require_once '../modelisationBDD/connect.php';

// Méthodes de debug
require('../modelisationBDD/inc/functions.inc.php');

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
    // si l'indice "action" existe dans $_GET et que sa valeur est "suppression" et que l'indice "id" existe  aussi, alors je peux traiter la suppression de l'article demandé // Voir lien sur le bouton suppression

    $resultat = $pdoBlog->prepare(" DELETE FROM articles WHERE id = :id ");/* Je prépare ma requête avec un marqueur vide : 'id_employes' */

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

<!-- MAIN -->
<main class="container">
    <div class="row col-12">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h1 class="p-5 text-center" id="articles">Les articles</h1>

            <!-- J'afficherai ici ce qui se trouve dans le contenu pour la suppression d'un élément -->
            <?php echo $contenu;?>
          
            <?php
                // 2- J'affiche un tableau avec les personnes travaillant dans l'entreprise
                $requete = $pdoBlog->query(" SELECT * FROM articles ");
            ?>

            <table class="table table-striped table-hover table-sm">
                <thead>
                    <tr class="">
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
                <?php while ($article = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $article['id']; ?></td>
                    <td><img src="<?php echo $article['image']; ?>" alt="IMAGE" class="img-fluid"></td>
                    <td><?php echo $article['titre']; ?></td>
                   
                    <td><?php echo substr($article['contenu'], 0,70); ?><a href="article1.php?id=<?php echo $article['id']; ?>" class="btn btn-outline-primary btn-sm"> [VOIR LA SUITE]</a></td>
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
                <?php } ?><!-- fermeture de la boucle -->
                </tbody>
            </table>

            <div class="col-12 col-md-6 m-auto p-5">
                <h2 class="text-center mb-4">Ajout d'un article</h2>

                <form action="#" method="POST" class="border bg-light p-2 rounded mx-auto">
                    <div class="mb-3">
                        <label for="image">Image de l'article :</label>
                        <input type="TEXT" name="image" id="image" class="form-control" required>
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
                        </div><!-- AUTEUR -->

                        <div class="mb-3">
                            <label for="date_parution" class="form-label">Date de parution</label>
                            <input type="date" name="date_parution" id="date_parution" class="form-control" required>
                        </div><!-- DATE DE PARUTION -->

                        <button type="submit" class="btn btn-success" name="submit" id="submit">Ajouter un article</button><!-- BOUTON SUBMIT -->
                    </form>
                    <!-- FIN FORM -->
                </div>
                <!-- fin col form -->
            </div><!-- fin col -->         
        </div>
        <!-- fin container  -->
    </main>
    <!-- FIN MAIN -->

<!-- INCLUSION DU FOOTER -->
<?php require_once '../modelisationBDD/includes/footer_blog.php'; ?>