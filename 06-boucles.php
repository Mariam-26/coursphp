<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Le PHP -Les boucles </title>
</head>

<body>



    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Les boucles </h1>
            <p class="lead">Les boucles ( structures itératives) sont  un moyen de faire répéter un morceau de code plusieurs fois. Une boucle est donc une répétition   </p>

        </div>
    </div><!-- fin de jumbotron -->



    <main class="container">

<section class="row">

<div class="col-12">

<h2>La boucle Do while </h2>

<p> C'est le même principe que la boucle <em>while.</em> la seule difference c'est que la condition est testé à la fin plutôt qu'au début.</p>

</div>



<?php

$i = 0;

do{

    echo $i;
}while($i > 0);
/* Ici on exécute une fois le code m^me si on ne remplit pas la condition dû à l'ordre de la boucle do... while => la boucle s'exécute puis rencontre une condition qu'elle ne remplit pas et et elle s'arrête donc.  */


?>


<div class="col-12">


<h2>La boule while</h2>

<p>while (tant que) est une boucle qui va excécuter un morceau de code tant que la condition est remplie. </p>

<?php
    $a = 0; // valeur initiale à 0
    while($a < 5)// on boucle tant que notre variable est inférieur à 5 
    {
        echo "Tour n° $a <br>";
        $a++; 
    }

    ?> 

</div>
<div class="col-12">
  <h2>La boucle for</h2>
  <p>Tt comme la boucle while, l'objectif de cette boucle est de répéter un morceau de code. Mais la structure sera différente,</p>
</div>

<?php 
for($b = 0; $b <= 15; $b++){/* ds les parenthèses de la boucle for :
  - 0n initialise la variable
  - On écrit notre condition
  - Ns incrémentons ou décrémentons notre variable */
  echo "<p>Tourn n° $b</p>"; /* on met le code que ns devons répérer */
}
 ?>

<div class="col-12">
  <h2>La boucle foreach</h2>
  <p>La boucle foreach sert à parcourir un tableau (array()). On la verra + en détaille ds le chapitre dédie aux aux arrays.</p>

  <h2>
    Comment choisir la boucle appropriée ?
  </h2>
  <p>A force de les utiliser, il sera de plus en plus logique de choisir telle ou telle boucle pr telle ou telle situation. Ms on verra que les boucles ont de toute façon la mm utilité : la répétition d'une portion de code.</p>
</div>
</section>

    </main>











    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>