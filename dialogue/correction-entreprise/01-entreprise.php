<?php require('../inc/functions.php'); ?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Backoffice - Les salariés</title>
</head>

<body>
    <!-- 1 - CONNEXION BDD -->
    <?php
    $pdoEntreprise = new PDO(
        'mysql:host=localhost;
      dbname=entreprise',
        'root',
        '',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        )
    );
    ?>

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Les salariés</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi tempora autem aspernatur eius harum necessitatibus minus saepe natus expedita beatae, perferendis, asperiores ipsa provident debitis distinctio temporibus laudantium ipsum.</p>
        </div>
    </div> <!-- fin jumbotron -->

    <main class="container">

        <section class="row my-5">

            <div class="col-md-8">
                <?php
                
                $requete = $pdoEntreprise->query(" SELECT * FROM employes ");
                
                echo "
                    <table class=\"table table-dark table-hover\">
                        <thead>
                            <tr>
                                <th>ID de l'employé</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Sexe</th>
                                <th>Service</th>
                                <th>Date d'embauche</th>
                                <th>Salaire</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                
                while ($employes = $requete->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $employes['id_employes'] . "</td>";
                    echo "<td>" . $employes['prenom'] . "</td>";
                    echo "<td>" . $employes['nom'] . "</td>";
                    echo "<td>" . $employes['sexe'] . "</td>";
                    echo "<td>" . $employes['service'] . "</td>";
                    echo "<td>" . date('d/m/y', strtotime($employes['date_embauche'])) . "</td>";
                    echo "<td>" . $employes['salaire'] . "</td>";
                    echo "<td>
                        <a href=\"03-entreprise.php?id=" . $employes['id_employes'] . "\" class=\"btn btn-primary\">Modifier</a>
                        <a href=\"#\" class=\"btn btn-danger\">Supprimer</a>
                        </td>";
                    echo "</tr>";
                }
                
                echo "
                    </tbody>
                    </table>
                    ";
                
                ?>
            </div>

            <div class="col-md-4">

                <form action="#" method="POST" class="border p-2">

                    <div class="mb-3">
                        <label for="id">Id de l'employé</label>
                        <input type="text" name="id" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="prenom">Prénom de l'employé</label>
                        <input type="text" name="prenom" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nom">Nom de l'employé</label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="sexe">Sexe</label>
                        <select name="sexe" id="sexe">
                            <?php

                            $requete_sexe = $pdoEntreprise->query(" SELECT DISTINCT sexe FROM employes ");

                            while ($sexe = $requete_sexe->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value=\"" . $sexe['sexe'] . "\">" .  $sexe['sexe'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="sexe">Service</label>
                        <select name="service" id="service">
                            <?php

                            $requete_service = $pdoEntreprise->query(" SELECT DISTINCT service FROM employes ");

                            while ($service = $requete_service->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value=\"" . $service['service'] . "\">" .  $service['service'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="date_embauche">Date d'embauche</label>
                        <input type="date" name="date_embauche" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="salaire">Salaire</label>
                        <input type="number" name="salaire" class="form-control" required>
                    </div>

                    <button type="submit">Ajouter un salarié</button>
                </form>

            </div>

        </section>


    </main><!-- fin du main -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html><?php require('../inc/functions.php'); ?>