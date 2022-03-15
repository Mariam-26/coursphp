<?php 
// je crée ma fonction debug
function debug($mavar){
  echo "<br><pre class=\"alert alert-warning\">";
  var_dump($mavar);
  echo "</pre>";
}
// 2 Je crée une fonction pr vérifier que l'utilisateur est connecté

function estConnecte(){
  if(isset($_SESSION['membre'])){ /* Si ds la superglobale $_SESSION je récuàère un indice membre , cela signifie que la personne est connectée */
    return true;
  }
  else{
    return false;
  }
}

// 3- je verifie que le membre qui est connecte est ADMIN
function estAdmin(){
  if(estConnecte() && $_SESSION['membres']['statut'] == 1){ /* si l'utilisateur est connecté et que son statut est  1 alors il est admin */
    // je vérifie que l'on remplie les conditions de la fonction estConnecte() et que ds ma table membre, ds la colonne statat je récupère bien l'integer 1 qui correspond à ADMIN
    return true; /* conecté et admin */
  }else{
    return false; /* connecté mais pas admin */
  }
}
?>