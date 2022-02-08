<?php
/* comentaires sur plusieurs lignes*/
// commentaire sur une ligne 
# commentaire sur une ligne

echo 'Bonjour<br>';
print'Je suis préssée que ce soit vendredi';

/* 
-Ces codes PHP permettent d'afficher du texte
-echo et print  sont plutôt semblables mais dans le cours  nous utiliserons majoritairement echo
- chaque instruction se termine par un point virgule
- Comme en JS, le code peut être mis entre apostrophes (quote) ou entre guillements*/

/*
Dautres instructions permettent d'afficher mais pour débugger un code :
-print_r
-var_dump
*/

#il est possible d'afficher de faire du HTML dans une balise PHP => méthode correcte

echo "<h1>Bonjour , il fait beau aujourd'hui </h1>";
echo "Je suis présée que les <strong> vacances</strong> arrivent.";
#il est aussi possible d'afficher au PHP dans une balise html


?>

<h2> <?php echo " Quelle météo splendide"; ?>! </h2>

<p> <?php echo " Nous sommes"; ?> lundi :)</p>

<?php  

/* Le code que nous venons de faire est moins propore, moins professionnel) car il nous fait sortir et rentrer plusieurs fois  dans le code PHP il nous faut donc éviter cette façon dede coder. */
// lorsque l'on regarde le code source de notre page, nous remarquons comme on l'a vu dans le cours que nous n'y trouvons pas de PHP.
// Si vous voyez une erreur apparaître , vérifiez bien le code , que vous avez fermé les apostrophes ou les guillements et que vous avez le point virgule en fin de ligne.

$prenom = 'Fred';//Pour déclarer une variable on utilisera dollar $

//AFFICHAGE CONTENU VARIABLE

echo "Bonjour $prenom <br>";
echo 'comment vas tu $prenom?';

/*Lorsque l'on veut afficher le contenu d'une variable, il faudra utiliser les guillements
Comme en JS , on déclare une variable afin de garder en mémoire sa valeur En langage pro : on dira donc ici qu'on a déclaré la variable prenom et qu'on lui a affecté la valeur FRED 
mais n'oublions pas qu'une variable peut varie  */

$prenom = 'justine';

echo "<p>$prenom est la meilleur formatrice</p>";

// Attention a bien gardé la même convention de nommage dans tout un site, ici nous utiliserons le camelcase => nomPrenom//monAge// jour DeLaSemaine etc.. 
// on aurait pu choisir le serpent case => mon_prenom // mon_age// jour_de_la_semaine.

/*
Il existe les mêmes types de variables que nous avons vu JS 

-string : chaine de caractères
-integer: entier
-boolean: booléen
-double ( float en JS): nombres décimaux 
*/

$variable1 = "bla bla bla";
echo "$variable1 :". gettype($variable1) . "<br>";

$variable2 = 123;
echo "$variable2 :". gettype($variable2) . "<br>";

$variable3 = TRUE;
echo "$variable3:". gettype($variable3) . "<br>";

$variable4 = 42.5;
echo "$variable4:". gettype($variable4) . "<br>";

/*Ici le navigateur renvoie  1 pour TRUE et il renverra vide (correspond à 0)pour
FALSE
*/ 

// La constante existe  aussi e, PHP , c'est une fonction prédéfinie et elle se déclare de la façon suivante:

define("CAPITALE","Paris");
echo "<p>".CAPITALE."</p>";

/* Par cobnvention, une constante se déclare toujours en majuscule. on déclare d'abord de la constante , puis après la virgule, son contenu. Le contenu d'une constante ne peut pas varier 
on utilisera majoritairement */

// il existe des constantes magiques : 

echo __FILE__. "<br>";
echo __LINE__. "<br>";


/* La première renvoie le fichoer dans le quel on se trouve et son emplacement 
la seconde nous renvoie la ligne à laquelle le code a été demandé 
il en exist 'autres que vous pouvez découvrir sur le doc officielle de PHP */

/* 

En PHP la concaténation se fait grâce aux points ou aux virgules.Ils ont à peu près la même utilisation sauf que print ne permet pas l'utilisation de la virgule donc majoritairement on utilisera le point (.) dans le cours

*/



?>

