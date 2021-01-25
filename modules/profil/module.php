<?php
include 'controleur.php';

class ModProfil {

	private $controleur;
	
	function __construct() {
		$this -> controleur = new ContProfil();
		if (isset($_SESSION['id']) && $this -> controleur -> verifExist($_SESSION['id'])) {
			if (isset($_GET['action']))
				$action = $_GET['action'];
			else
				$action = 'profil';

			switch ($action) {
				case "profil" :
					$this -> controleur -> profil('');
					break;

				case "publications" :
					$this -> controleur -> publications('');
					break;

				case "modification_publication":
					$this -> controleur -> modificationPublication();
					break;

				case "suppression_publication" :
					$this -> controleur -> suppressionPublication();
					break;

				case "voter":
					$this -> controleur -> voter();
					break;

				case "compte" :
					$this -> controleur -> compte('');
					break;

				case "modification_compte" :
					$this -> controleur -> modificationCompte();
					break;

				case "suppression_compte" :
					$this -> controleur -> suppressionCompte();
					break;

				case "securite" :
					$this -> controleur -> securite('');
					break;

				case "change_password" :
					$this -> controleur -> changeMdp();
					break;

				case "deconnexion" :
					$this -> controleur -> deconnexion();
					break;

				default:
					$this -> controleur -> pasAction();
					break;
			}
		}
		else {
			unset($_SESSION['id']);
			session_destroy();
			header("Location: ?module=compte");
			exit();
		}
	}
}
