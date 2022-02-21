<?php require('../inc/function.php') ?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Le PHP - Connection à une BDD </title>
</head>
<body>

<?php
   $pdoDialogue = new PDO( /* PDO est un objet qui représente la connexion entre une page en PHP et une BDD */
      'mysql:host=localhost;
      dbname=dialogue',/* dans le premier argument on précise localhost et le nom de la BDD */
      'root',/* dans le deuxième argument on précise l'identifiant PHPMyAdmin */
      '',/* Dans le troisième argument on précise le mot de passe, vide pour le PC */
      array(
         PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
      )/* Ici, on précise comment on veut que les erreurs soient gérées et le jeu de caractères utilisé */
   );
   ?>

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Connecxionà la BDD dialogue</h1>
            <p>Ds cette page, ns allons ns connecter à la BDD et créer un formulaire qui, gr^ce à la superglobale$_POST envera les infos en BDD.</p> 
          </div>
        </div><!-- fin de jumbotron -->
        
       <main class="container">
          
          <div class="col-12">
          <section class="row">
            <h2>Base de données "dialogue"</h2>
            <p>Note BDD "dialogue" ne possède qu'une table, la table commentaire. Cette table possède les champs suivants :</p>
            <ul>
              <li>id_commentaire INT PK AT</li>
              <li>pseudo VARCHAR(255)</li>
              <li>message TEXT</li>
              <li>date_enregistrement DATETIME</li>
            </ul>

            <div class="col-12 col-md-6">
              <h2>Exercice</h2>
              <p>Afficher le commentaire là ou le pseudo correspond à Thimotée </p>
              
            <?php 
             $requete = $pdoDialogue ->query ( "SELECT * FROM commentaire WHERE pseudo='Thimotée'"); /* Ds la variable $requete => je fs ma requete en SQL grâce à la fonction query(). Cette dernière dt automatiquemment s'appuyer sr ma variable ds laquelle j'ai placé les infos de connection. */
             jeprint_r($requete); /* pr débug grâce à mon jeprint_r */
             $ligne = $requete->fetch(PDO:: FETCH_ASSOC);
            //  jeprint_r($ligne); 
            echo '<ol> 

            <li>Id :  '.$ligne['id_commentaire'].'</li>
            <li>Pseudo :  '.$ligne['pseudo'].'</li>
            <li>Message:  '.$ligne['message'].'</li>
            </ol>'
              ?>
              
            </div>
            <div class="col-12">
              <p>Ecercice : afficher ts ls commentaire ds un tableau avec l'id ds une colonne,  le speudo ds une autre colonne et enfin le message ds la dernière colonne. Avec la boucle while</p>
            </div>

            <?php 
             $requete = $pdoDialogue ->query ( "SELECT * FROM commentaire"); /* Ici je rentre ma requette Ds la variable $requete => je fs ma requete en SQL grâce à la fonction query(). Cette dernière dt automatiquemment s'appuyer sr ma variable ds laquelle j'ai placé les infos de connection. */
             jeprint_r($requete); /* pr débug grâce à mon jeprint_r */
             $ligne = $requete->fetch(PDO:: FETCH_ASSOC);
            //  jeprint_r($ligne); 
            echo '
            <table class=\"table table-striped\">
            <thead>
            <tr>
            <th>ID</th>
            <th>Pseudo</th>
            <th>Message</th>
            </tr>
            </thead>
            <tbody>
                       
            ';
            // ici je fs echo de mon tableau en PHP => j'ai l'ouverture ainsi que le thead de mon tableau
            while($ligne = $requete->fetch(PDO:: FETCH_ASSOC)){ /* Grâce à la la boucle while (tant que) j'exécute le bloc de code TANT QUE j'ai ds enregistrements qui correspondant à ma requête */
              echo "<tr>";
              echo "<td>". $ligne['id_commentaire'] . "</td>";/* je boucle l'id_commantaire */
              echo "<td>". $ligne['pseudo'] . "</td>";
              echo "<td>". $ligne['message'] . "</td>";
              echo "</tr>";
            }
            echo "
            </tbody>
            </table>
            "           
            ?>

        </section>
      </div>

    </main>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>