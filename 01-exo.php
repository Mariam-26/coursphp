<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Le PHP -EXO 1 </title>
</head>
<body>

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">PHP EXO</h1>
        </div>
    </div><!-- fin de jumbotron -->

    <main class="container">

        <section class="row">
            <div class="col-12">

                <h2 class="text-center"> Mini exo 1</h2>

                <p>Afficher la date d'aujourd'hui sous le format jj/mm/aaa puis puis anglais, la date complète </p>

                <?php 

                $date = date('d/m/y');
                echo "<p> $date <br> </p>";

                echo date(" l jS F Y");
                // echo date ("j F y");
                ?>

            </div>

            <h2 class="text-center"> Mini exo 1</h2>

            <p>Afficher la devise de la France : " Liberté, Egalité, Fraternité ".</p>

            </div>

            <?php /* ICI MON CODE */

            echo "<br>Liberté, Egalité, Fraternité ";

            ?>

            <div class="col-12">

                <h1 class="tex-center"> Mini EXO </h1>

                <p> Calcul de la TVA avec une fonction</p>

                <?php

                // déclaration de la ocntion 

                function calculTva()

                {

                    return 100 * 1.2;
                }

                // exécution de notre fonction

                echo calculTva();

                ?>

                <p>Faire un formulaire danslequel on récupère le prix d'un objet: si le prix est supérieur à 100 € => remise de 10% si le prix est inférieur à 100€ , remise de 5% puis donner le prix net.</p>
<!-- 
                
<form action="#" method="GET">

<label for="prix">Combien avez vous payé votre objet ?</label>

<input type="text" name="prix" id="prix" class="form-control">
<input type="submit" name="submit" class="btn btn-success mt-1">

</form> -->


<h2 class="text-center"> Mini exo 4</h2>

<p>Si vous achetez un PC à plus de 1000 € dans la boutique de Hols la remise de 15% pour un mac de  moins de 1000€ la remise est de 10%. Si vous aveztez un livre , la remise est de 5% pour tous les autres articles, peu importe l'obejet , la remise est de 2% </p>
