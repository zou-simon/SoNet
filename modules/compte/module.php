<?php
include 'controleur.php';

class ModCompte {

	private $controleur;
	
	function __construct() {
		$this -> controleur = new ContCompte();
		if (isset($_GET['action']))
			$action = $_GET['action'];
		else
			$action = 'form_connexion';

		switch ($action) {

			case 'form_connexion' :
				$this -> controleur -> formConnexion();
				break;

			case 'form_inscription' :
				$this -> controleur -> formInscription();
				break;

			case 'connexion' :
				$this -> controleur -> connexion();
				break;
				
			case 'inscription':
				$this -> controleur -> inscription();
				break;

			default:
				$this -> controleur -> formConnexion();
				break;
		}
	}
}
?>