<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Logo du site -->
    <link rel="sortcut icon" href="../entreprise/img/1-logo.jpg">
  
  <!-- Ma feuille de styles -->
  <link rel="stylesheet" href="../entreprise/css/entreprise.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Back office entreprise</title>
  </head>
  <body id="accueil">

  <!-- HEADER -->
  <header>
   <div class="row col-12">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- NAV -->
        <nav class="navbar navbar-expand-lg p-5">
        <div class="container-fluid ">
          <a class="navbar-brand entreprise" href="#">Entreprise</a>
          <button class="navbar-toggler text-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
              </li> <li class="nav-item">
                <a class="nav-link" aria-current="page" href="01-entreprise.php">Entreprise - 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="02-entreprise.php">Entreprise - 2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="03-entreprise.php">Entreprise - 3</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
        </nav>
        <!-- FIN NAV --> 
      </div>
   </div class="row col-12"> 
</header>
<!-- FIN HEADER -->

<!-- MAIN -->
  <main class="container">
    <div class="row col-12">
      <div class="n col-lg-12 col-md-12 col-sm-12">
        <h1 class="p-5 text-center">Back office entreprise</h1>
        <p class="mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas sit, magni omnis natus assumenda cum itaque ipsum veniam quod tempora adipisci sequi enim aliquam incidunt reiciendis asperiores modi recusandae accusantium.
        Non quis aut earum maxime eos? Magnam ut necessitatibus saepe unde consequuntur voluptas quibusdam architecto ducimus earum dolor autem sit, odio eum officia, sed adipisci hic praesentium. Culpa, iusto atque.
        Voluptates qui quaerat, tempora a animi laboriosam sint maiores at delectus sequi dolore! Inventore, praesentium! Inventore, voluptate illum fugit eos distinctio suscipit repellat nihil fugiat rem tenetur minus ipsum dicta?
        Quas reprehenderit totam similique veniam, doloremque illum explicabo necessitatibus quidem nulla voluptate blanditiis commodi? Esse iure facilis ratione debitis voluptatibus, dignissimos vero, qui est sit aliquid modi fugiat? Culpa, voluptatum!</p>
        
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
        
           $requete = $pdoEntreprise->query( "SELECT * FROM employes WHERE service='direction'"); 
          
          echo "
          <table class=\"table table-striped\">
          <thead>
          <tr>
          <th>ID</th>
          <th>Prenom</th>
          <th>Nom</th>
          <th>Sexe</th>
          <th>Service</th>
          <th>Date_embauche</th>
          <th>Salaire</th>
          </tr>
          </thead>
          <tbody>                    
          ";
          
          while($ligne = $requete->fetch(PDO:: FETCH_ASSOC)){ 
            echo "<tr>";
            echo "<td>". $ligne['id_employes'] . "</td>";       
            echo "<td>". $ligne['prenom'] . "</td>";
            echo "<td>". $ligne['nom'] . "</td>";
            echo "<td>". $ligne['sexe'] . "</td>";
            echo "<td>". $ligne['service'] . "</td>";
            echo "<td>". $ligne['date_embauche'] . "</td>";
            echo "<td>". $ligne['salaire'] . "</td>";
            echo "<td>". date('d/m/y - H:i:s', strtotime($ligne['date_embauche'])). "</td>"; 
            
            echo "</tr>";
          }
          echo "
          </tbody>
          </table>
          "  
          // Réception des informations d'un employé avec $_GET 
          ?>
      </div>
    </div>
  </main>
<!-- FIN MAIN -->

<!-- FOOTER -->
<footer id="contact" class="mt-5">
  <div class="container-flui p-5 ">
    <?php echo '<p class="t-center">Exo - PHP</p>'; ?>
    <p>&copy; Colombbus - Paris 2022</p>
    
  </div>
</footer>
<!-- FIN FOOTER -->

    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>