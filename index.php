<?php
session_start();
ob_start();
include 'connexion.php';
$content = "";

Connexion::initConnexion();

if (isset($_GET['module']))
	$module = $_GET['module'];
else
	$module = 'compte';

switch ($module) {
	case "compte" :
		include 'modules/compte/module.php';
		new ModCompte();
		break;
	case "accueil" :
		include 'modules/accueil/module.php';
		new ModAccueil();
		break;
	case "messages" :
		include 'modules/messages/module.php';
		new ModMessages();
		break;
	case "amis" :
		include 'modules/amis/module.php';
		new ModAmis();
		break;
	case "profil" :
		include 'modules/profil/module.php';
		new ModProfil();
		break;

	default :
		die ("Interdiction d'acces à ce module.");
		break;
}

$content = ob_get_clean();
include 'template.php';
?>
