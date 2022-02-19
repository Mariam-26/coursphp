<?php require('inc/function.php') ?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Le PHP -Les array </title>
</head>

<body>



    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Les  array() </h1>
            <p class="lead">Les tableaux - applés array </p>
            
        </div>
    </div><!-- fin de jumbotron -->



    <main class="container">

<section class="row">

<div class="col-12">

<h2>A quoi ça sert ?</h2>
<p>on va pouvoir ds un array conserver plusieurs valeurs, c'est la difference majeure avec une variable.</p>
<?php 
$prenom ="Mariam, Papou, Alou";
echo "Bonjour $prenom";

$listeprenoms = array("Grégoire", "Sidonie", "Eléonore");


jeprint_r($listeprenoms);
jevar_dump($listeprenoms);

echo "Bonjour" . $listeprenoms[2];


?>

<h2>Example avec un tableau non prédefini</h2>

<?php $listepays[] = 'France'; 
$listepays[] = 'France';
$listepays[] = 'Angleterre';
$listepays[] = 'Espagne';
$listepays[] = 'Portugal';
 
echo "J'habite en $listepays[2]";
echo implode('<br>', $listepays);
 jevar_dump($listepays);
 
 ?>

 <p><code>implode</code>permet d'extraire les valeurs d'un tableau (array()) et cette fonction prédéfine attant 2 arguments : le premier est le separateur et le deuxième l'array que nous voulons explore.</p>

 <h2>Parcourrir les tableaux grâce aux boucles</h2>

 <h3>La boucle for</h3>

 <?php /* ICI MON CODE */ 
 
 $listefourniture = ['stylo', 'crayon de couleur', 'feutres', 'crayon de papier', 'stabilo', 'Effacile'];

 for($i = 0; $i < sizeof($listefourniture); $i++){
   echo $listefourniture[$i] . "<br>";
 }
 ?>

<p>Mais une autre est encore plus adaptée à la lecture de tableau : c'est la  boucle <code>foreach</code> car on sera pas obligé de fournir un numero</p>

<?php 

foreach($listefourniture as $k => $valeur) {
  echo "<li>$k - $valeur</li>";
}
?>

<h2>Les tableaux associatifs</h2>
<p>Il est possible de choisir les clés d'un array() plutôt que d'avoir une numerotation classique, ns apelerons ça un tableau associatif</p>

<?php 
$listecouleurs = [
  "b" => 'bleu',
  "j" => 'jaune',
  "r" => 'rouge',
  "m" => 'marron',
  "v" => 'violet'
];

echo "Ma couleur preferée est le" . $listecouleurs["r"];
jevar_dump($listecouleurs);
?>

<h2>Les tableaux multidimentionnels</h2>
<p>Il est possible de créer des tableaux à l'interieur d'autre tableau grâce à une imbrication. c'est alors un tableau multidimentionnel.</p>

<?php 
$tabmulti = [
  0 => [
    "prenom" => 'Mariam',
    "nom"  => 'Ouédraogo',
    "coleur" => 'Noire'],
  1 => [
    'prenom' => 'Alou',
    'nom' => 'Coulibaly',
    "coleur" => 'Noire'],
  2 => [
    'prenom' => 'Emanuel',
    'nom' => 'Macron',
    "coleur" => 'Blanche'],
  3 => [
    'prenom' => 'Malimata',
    'nom' => 'Wattara',
    "coleur" => 'Noire']
  ];


 jevar_dump($tabmulti[1]["nom"]);
?>





    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>