<?php

// La connexion à la BDD
$pdoAppart = new PDO(
    'mysql:host=localhost;
    dbname=location',/* nom bdd */
    'root',/* nom d'utilisateur phpMyAdmin */
    '',/* vide sur PC // sur mac c'est root */
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
);
