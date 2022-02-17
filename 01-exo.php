<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Le PHP - Page d'exos 01</title>
</head>

<body>

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Exo 1</h1>
        </div>
    </div> <!-- fin jumbotron -->

    <main class="container">

        <section class="row">
            <div class="col-12">
                <h2 class="text-center">Mini exo 1</h2>
                <p>Afficher la date d'aujourd'hui sous le format jj/mm/aaaa puis en anglais, la date complète</p>
                <?php

                $date = date("d/m/y");
                echo "<p class=\"alert alert-success\"> $date </p>";

                echo "<p class=\"alert alert-success\">" . date("l jS F Y") . "</p>";

                // echo date("j F y");

                ?>
            </div>


            <div class="col-12">
                <h2 class="text-center">Mini exo 2</h2>
                <p>Afficher la devise de la France : "Liberté, Égalité, Fraternité"</p>
                <?php

                echo "<p class=\"alert alert-success\">Liberté, Égalité, Fraternité</p>";

                ?>
            </div>

            <div class="col-12">
                <h2 class="text-center">Mini exo </h2>
                <p>Calcul de la TVA avec une fonction</p>
                <?php

                // Déclaration de la fonction
                function calculTva()
                {
                    return 100 * 1.2;
                }

                // exécution de notre fonction
                echo calculTva();

                ?>

                <p>Faire un formulaire dans lequel on récupère le prix d'un objet : si le prix est supérieur à 100€ => remise de 10% // si le prix est inférieur à 100€, remise de 5% puis donner le prix net</p>

                <!-- <form action="#" method="GET">
                    <label for="prix">Combien avez-vous payé votre objet ?</label>
                    <input type="text" name="prix" id="prix" class="form-control">
                    <input type="submit" name="submit" class="btn btn-success mt-1">
                </form> -->

                <!-- if(isset ($_GET['submit'])) {
                    $prix = $_GET['prix'];
                    $discount1 = 0.05;
                    $discount2 = 0.1;
                    $cinqpourcent = $prix * $discount1;
                    $dixpourcent = $prix * $discount2;
                    $prixfinaldix = $prix-$dixpourcent;
                    $prixfinalcinq = $prix-$cinqpourcent;

                    if($prix > 100){
                        echo "<p class=\"alert alert-success\">Vous avez une remise de $dixpourcent €, votre object vaut donc $prixfinaldix €.</p>";
                    }else {
                        echo "<p class=\"alert alert-success\">Vous avez une remise de $cinqpourcent €, votre object vaut donc $prixfinalcinq €.</p>";
                    }

                } -->

                <h2 class="text-center">Mini exo 4</h2>
                <p>Si vous achetez un mac à plus de 1000€ dans la boutique de Hols, la remise est de 15%, pour un mac de moins de 1000€, la remise est de 10%. Si vous achetez un livre, la remise est de 5%, pour tous les autres articles la remise est de 2%.</p>

                <form action="#" method="GET" class="mb-5">

                    <label for="objet">Objet acheté</label>
                    <input type="text" name="objet" placeholder="mac, livre ou autre" id="objet">
                    <label for="prix">Prix de l'objet</label>
                    <input type="text" name="prix" id="prix" placeholder="prix de l'objet">
                    <input type="submit" class="btn btn-success" name="submit">

                </form>

                <?php

                /* On vérifie si le formulaire est soumis */
                if (isset($_GET['submit'])) {
                    /* On récupère les données du formulaire dans des variables */
                    $objet = $_GET['objet'];
                    $prix = $_GET['prix'];
                    /* 10% => 1-(10/100) = 0.9 */
                    // Pour la remise, le calcul est le précedent : on remplace 10 par le pourcentage que l'on veut obtenir
                    $pf15 = 0.85 * $prix;
                    $pf10 = 0.9 * $prix;
                    $pf5 = 0.95 * $prix;
                    $pf2 = 0.98 * $prix;

                    if ($objet == 'mac') {
                        if ($prix > 1000) {/* dans mac si prix supérieur à 1000€ -> remise de 15% */
                            echo "<p class=\"alert alert-success\">Vous avez acheté un $objet dont la valeur est de $prix €, vous bénéficiez d'une remise de 15%, le prix final est donc de $pf15 €.</p>";
                        } else {/* dans mac si prix inférieur à 1000 => remise 10% */
                            echo "<p class=\"alert alert-success\">Vous avez acheté un $objet dont la valeur est de $prix €, vous bénéficiez d'une remise de 10%, le prix final est donc de $pf10 €.</p>";
                        }
                    } elseif ($objet == 'livre') {/* livre => remise 5% */
                        echo "<p class=\"alert alert-success\">Vous avez acheté un $objet dont la valeur est de $prix €, vous bénéficiez d'une remise de 5%, le prix final est donc de $pf5 €.</p>";
                    } else {/* autre => 2% */
                        echo "<p class=\"alert alert-success\">Vous avez acheté un $objet dont la valeur est de $prix €, vous bénéficiez d'une remise de 2%, le prix final est donc de $pf2 €.</p>";
                    }
                }


                ?>

                <h2>Mini exo 5</h2>
                <p>Afficher dansun select, les 31 jours d'un mois grâce à une boucle for en PHP</p>

                <select name="jour" id="jour" class="mb-5">
                <?php

                for($i = 1; $i <= 31; $i++){
                    echo "<option value=\"$i\">$i</option>";
                } 

            
                ?>
               </select>

            </div>
        </section>


    </main><!-- fin du main -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>