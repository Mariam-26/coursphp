<?php 
// 
require_once 'connect.php';
// 2- Inscription sr la BDD
if(!empty($_POST)){
  // Les IF qui suivent vt permettre de vérifier si les valeurs passées ds $_POST correspondent bien à ce qui es attendu en BDD

  if(!isset($_POST['civilite']) ||$_POST['civilite'] != 'm' && $_POST['civilite'] != 'f'){
    // je vérifie que je récupère uns info ds civilité et qu'elle correspond st à m st à f

    $contenu .= "<div class=\"alert alert-warning\">La civilité n'est pas valable !</div>";
  }
  if(!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20){
    // si le prenom n'est ps defin ou que le prenom fait moins de 1 caractères ou plus de 20 alors erreur

    $contenu .= "<div class=\"alert alert-warning\">Prénom doit faire entre 2 et 20 caractères !</div>";
  }

  if(!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20)){
    // si le nom n'est ps defin ou que le nom fait mons de 1 caractères ou plus de 20 alors erreur

    $contenu .= "<div class=\"alert alert-warning\">Prénom doit faire entre 2 et 20 caractères !</div>";
  }

  if(!isset($_POST['email']) || strlen($_POST['email']) > 50  || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    // je vérifie que l'email n'est ps vide, qu'il fait moins de 50 caractère et qu'il est conforme grâce à filtter_var() accompané des FILTER_VALIDATE_EMAIL

    $contenu .= "<div class=\"alert alert-warning\">Votre email n'est pas conforme !</div>";
  }

  if(!isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20){
    // si le pseudo n'est ps defin ou que le pseudo fait mons de 4 caractères ou plus de 20 alors erreur

    $contenu .= "<div class=\"alert alert-warning\">Prépseudo doit faire entre 4 et 20 caractères !</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog - Inscription</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="p-5 bg-primary">
  <div class="container">
    <h1 class="display-3 text-white">Inscription - Blog</h1>
    <p class="lead text-white">Inscrivez sur notre site</p>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-8 mx-auto">

    <form action="#" method="POST">
      <div class="mb-3">
        <label for="civilite">Civilité *</label>
        <input type="radio" name="civilité" id="civilite" value="Feminin">
        <input type="radio" name="civilité" id="civilite" value="Masculin">

        <!-- OPTION AVEC SELECT -->
        <!-- <select name="civilite" id="civilite">
          <option value="f">Féminin</option>
          <option value="m">Masculin</option>
        </select> -->

        <!-- Quand j'ai un enum en BDD je ds mettre soit ds boutons de types radio, soit un select avec ds options. il faudra forcément que ls option ou les boutons radio aient une "value-->
      </div>

      <div class="mb-3 row">
        <div class="col">
          <label for="prenom">Prénom *</label>
          <input type="text" name="prenom" id="prenom" class="form-control" require>
        </div>
        <div class="col">
        <label for="nom">Nom *</label>
          <input type="text" name="nom" id="nom" class="form-control" require>
        </div>
      </div>

      <div class="mb-3 row">
        <div class="col">
          <label for="email">Email *</label>
          <input type="text" name="email" id="email" class="form-control" require>
        </div>
        
        <div class="col">
        <label for="pseudo">Pseudo *</label>
          <input type="text" name="pseudo" id="pseudo" class="form-control" require>
        </div>
      </div>

      <div class="mb-3 row">
        <div class="col">
          <label for="adresse">Adresse *</label>
          <input type="text" name="adresse" id="adresse" class="form-control" require>
        </div>
        <div class="col">
        <label for="ville">Ville *</label>
          <input type="text" name="ville" id="ville" class="form-control" require>
        </div>
      </div>

      <div class="mb-3 row">
        <div class="col">
          <label for="code_postal">Code postal *</label>
          <input type="text" name="code_postal" id="code_postal" class="form-control" require>
        </div>
        <div class="col">
        <label for="mdp">Mot de passe*</label>
          <input type="text" name="mdp" id="mdp" class="form-control" require>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">S'inscrire</button>

    </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>