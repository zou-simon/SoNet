<?php
include 'controleur.php';

class ModAmis {

	private $controleur;
	
	function __construct() {
		$this -> controleur = new ContAmis();
		if (isset($_SESSION['id']) && $this -> controleur -> verifExist($_SESSION['id'])) {
			if (isset($_GET['action']))
				$action = $_GET['action'];
			else
				$action = 'amis';

			switch ($action) {			
				case "amis" :
					$this -> controleur -> amis('', '');
					break;
				
				case "ajout":
					$this -> controleur -> ajoutAmi('');
					break;

				case "ajouter":
					$this -> controleur -> ajouter();
					break;

				case "accepter_demande":
					$this -> controleur -> accepterDemande();
					break;

				case "refuser_demande":
					$this -> controleur -> refuserDemande();
					break;

				case "annuler_demande":
					$this -> controleur -> annulerDemande();
					break;

				case "supprimer":
					$this -> controleur -> supprimer();
					break;

				case "renommer":
					$this -> controleur -> renommer();
					break;

				case "bloquer":
					$this -> controleur -> bloquer();
					break;

				case "debloquer":
					$this -> controleur -> debloquer();
					break;

				case "signaler":
					$this -> controleur -> signaler();
					break;

				case "profil":
					$this -> controleur -> profil();
					break;

				case "voter":
					$this -> controleur -> voter();
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
