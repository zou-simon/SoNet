<?php
include 'controleur.php';

class ModAccueil {

	private $controleur;
	
	function __construct() {
		$this -> controleur = new ContAccueil();
		if (isset($_SESSION['id']) && $this -> controleur -> verifExist($_SESSION['id'])) {
			if (isset($_GET['action']))
				$action = $_GET['action'];
			else
				$action = 'publication';

			switch ($action) {
				case "publication" :
					$this -> controleur -> filActualite('');
					break;

				case "publier" :
					$this -> controleur -> publier();
					break;

				case "modification_publication":
					$this -> controleur -> modifierPublication();
					break;

				case "suppression_publication":
					$this -> controleur -> supprimerPublication();
					break;

				case "signaler":
					$this -> controleur -> signaler();
					break;
				
				case "commenter":
					$this -> controleur -> commenter();
					break;

				case "modification_commentaire":
					$this -> controleur -> modifierCommentaire();
					break;

				case "suppression_commentaire":
					$this -> controleur -> supprimerCommentaire();
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
