<?php 
//--------------- Connexion BDD -----------------------//
$host = 'mysql:host=localhost;dbname=liberty'; // le serveur (localhost) et le nom de la BDD (entreprise)
$login = 'root'; // le login de connexion à Mysql
$password = ''; // le mdp de connexion à Mysql (sur xampp et wamp, pas de passe)
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'
);

$pdo = new PDO($host, $login, $password, $options);
//--------------- Démarrage de la session -----------------------//
session_start();
//--------------- Définition d'une constante -----------------------//
define("RACINE_SITE", "/liberty_chat/");
$contenu = '';
//--------------- Inclusion du fichier fonction -----------------------//
require_once 'fonction.inc.php';