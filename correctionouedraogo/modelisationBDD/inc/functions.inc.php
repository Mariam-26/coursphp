<?php

// création d'une fonction qui var_dump une variable : très utile pour un tableau
    function jevar_dump($mavariable){ // la fonction nommée avec son paramètre: une variable qu'on va pouvoir modifier pour mettre le nom de celle qu'on veut afficher
        echo "<small class=\"bg-success text-white p-2\">var_dump :</small><pre class=\"alert alert-success w-75\">";
        var_dump($mavariable);
        echo "</pre>";
    }

    function jeprint_r($mavariable){
        echo "<small class=\"bg-primary text-white p-2\">print_r :</small><pre class=\"alert alert-primary w-75\">";
        print_r($mavariable);
        echo "</pre>";
    }

 
// 1 - je crée ma fonction debug
// function debug($mavar){
//   echo "<br><pre class=\"alert alert-warning\">";
//   var_dump($mavar);
//   echo "</pre>";
// }
// // 2 Je crée une fonction pr vérifier que l'utilisateur est connecté

// function estConnecte(){
//   if(isset($_SESSION['membres'])){ /* Si ds la superglobale $_SESSION je récuàère un indice membre , cela signifie que la personne est connectée */
//     return true; /* Il est connecté */
//   }
//   else{
//     return false; /* Il n'est pas connecté */
//   }
// }

// // 3- je verifie que le membre qui est connecte est ADMIN
// function estAdmin(){
//   if(estConnecte() && $_SESSION['membres']['statut'] == 1){ /* si l'utilisateur est connecté et que son statut est  1 alors il est ADMIN */
//     // je vérifie que l'on remplie les conditions de la fonction estConnecte() et que ds ma table membre, ds la colonne statat je récupère bien l'integer 1 qui correspond à ADMIN
//     return true; /* conecté et admin */
//   }else{
//     return false; /* connecté mais pas admin */
//   }
// }
?>