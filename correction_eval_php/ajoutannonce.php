<?php 
// JE REQUIRE LA CONNECTION A LA BDD
require 'inc/init.inc.php';

// le traitement du formulaire en BDD
if (!empty($_POST)) {/* SI le formulaire n'est pas vide, j'exécute ce qui suit */
  /* Je m'assure que je n'ai pas d'insertion de SQL et de failles */
  $_POST['title'] = htmlspecialchars($_POST['title']);
  $_POST['description'] = htmlspecialchars($_POST['description']);
  $_POST['image'] = htmlspecialchars($_POST['image']);
  $_POST['postal_code'] = htmlspecialchars($_POST['postal_code']);
  $_POST['city'] = htmlspecialchars($_POST['city']);
  $_POST['type'] = htmlspecialchars($_POST['type']);
  $_POST['price'] = htmlspecialchars($_POST['price']);
  
  /* Je prépare ma requête avec des marqueurs pour l'instant vides */
  $insertion = $pdoLocation->prepare(" INSERT INTO advert (title, description, image, postal_code, city, type, price, reservation_message) VALUES (:title, :description, :image, :postal_code, :city, :type, :price, NULL) ");

// Je fs correspondre ms marqueurs vides aux éléments de mon form
  $insertion->execute(array(
    ':title' => $_POST['title'],
    ':description' => $_POST['description'],
    ':image' => $_POST['image'],
    ':postal_code' => $_POST['postal_code'],
    ':city' => $_POST['city'],    
    ':type' => $_POST['type'],    
    ':price' => $_POST['price'],    
      /* Mes marqueurs sont maintenant remplis avec les données récupérées grâce au name dans le formulaire */
  ));

  header('location:annonces.php');
  exit();
}




?>

