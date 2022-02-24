<?php 
// Je définie le titre
$titre = "Back office entreprise";

// INCLUSION DU HEADER
require_once '../entreprise/includes/header_entreprise.php'; 

// CONNECTION A LA BASE DE DONNEES
require_once '../entreprise/connect.php';
?>

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
        
        // MA REQUETE SQL
        $requete = $pdoEntreprise->query( "SELECT * FROM employes WHERE service='direction'"); 
      
          // TABLEAU
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
          
          // MA BOUCLE TANT QUE ET SES CONDITIONS
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
          ?>
      </div>
    </div>
  </main>
<!-- FIN MAIN -->

<!-- INCLUSION DU FOOTER -->
<?php require_once '../entreprise/includes/footer_entreprise.php'; ?>

