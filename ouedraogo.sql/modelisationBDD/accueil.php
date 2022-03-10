<?php
// Je définie le titre
$titre = "Blog - Accueil";

// INCLUSION DU HEADER
require_once '../modelisationBDD/includes/header_blog.php';

$nav = "accueil";

// 1- Méthodes de debug
require('inc/functions.php');

// CONNECTION A LA BASE DE DONNEES
require_once '../modelisationBDD/connect.php';
?>

 <!-- MAIN -->
<main class="container">
    <div class="row col-12">
      <div class="n col-lg-12 col-md-12 col-sm-12">
        <h1 class="p-5 text-center" id="accueil">Tous les articles du BLOG</h1>
                    <?php
                    // 4- J'affiche toutes les infos de la table articles 
                    $requete = $pdoBlog->query(" SELECT * FROM articles");
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
        </div>
        <!-- fin container  -->
    </main>
    <!-- FIN MAIN -->

<!-- INCLUSION DU FOOTER -->
<?php require_once '../modelisationBDD/includes/footer_blog.php'; ?>