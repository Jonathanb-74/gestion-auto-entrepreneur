<?php
ini_set('display_error',0);
error_reporting(0);
setlocale(LC_TIME, "fr_FR", "french", "fr_FR.UTF8", "fr");
date_default_timezone_set('Europe/Paris');
// Locale::setDefault('fr_FR');

//NOM SITE
$ns_site      = "M.E";
$ns_separateur= " | "; //Inserer un espace avant & après.

//SQL CONNEXION
if (file_exists($racine . "/include/conf/bdd.php")) 
{
	// echo "ok include sql";
	require($racine . "/include/conf/bdd.php");
}
else
{
	header('Location:' . $racine . '/install/bdd.php');
	exit();
}

$conn  = mysqli_connect($host, $user, $passwd, $mabase);
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>";
}


/* Modification du jeu de résultats en utf8 */
if (!mysqli_set_charset($conn, "utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($conn));
    exit();
} else {
    //printf("Jeu de caractères courant : %s\n", mysqli_character_set_name($conn));
}

//PATH
$p_css  = "/include/css/";
$p_img  = "/include/img/";
$p_php  = "/include/php/";
$p_html = "/include/html/";
$p_modeles = "/include/modeles/";

//REQUIRE
require($racine . $p_php . "general.php");

//Install verif
if ($_SERVER['PHP_SELF'] != "/install/install.php") {
	if (ifInstall() == 0) 
	{
		header('Location:' . $racine . '/install/install.php');
	}
}

//Connexion verif
if ($_SERVER['PHP_SELF'] != "/install/install.php" && $_SERVER['PHP_SELF'] != "/connexion.php" && $_SERVER['PHP_SELF'] != $p_css . "theme.php") {
	session_start();
	if (!isset($_SESSION['utilisateur'])) {
		// header ('Location: /connexion.php');
		require($racine . "/connexion.php");
		exit();
	}
}

require_once ($racine . "/include/PHPMarkdownLib/Michelf/Markdown.inc.php");
