<?php 
//1-  CONNEXION A LA BDD
$pdoBlog = new PDO(
    'mysql:host=localhost;
    dbname=test',
    'root', /* NOM D'UTILISATEUR */
    '', /* POUR LES MOTS DE PASSE // vide sur PC */
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
    )
);

// 2- Ouverture de session
session_start();

// 3- Chemin du site en constante
/* ici on définit le chemin absolu dans une constante, on écrira alors tous les chemins src et href avec cette constante // chez l'hébergeur la constante sera la suivante : define('RACINE_SITE', '/'); */
define('RACINE_SITE', 'coursphp22/blog/');

// 4-variable contenu pour les messages
/* Cette variable ne doit pas contenir d'espace ! */
$contenu = "";

// 5- on inclue le fichier functions
require_once 'functions.inc.php';
?>