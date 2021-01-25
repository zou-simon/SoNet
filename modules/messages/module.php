<?php
include 'controleur.php';

class ModMessages {

	private $controleur;
	
	function __construct() {
		$this -> controleur = new ContMessages();
		if (isset($_SESSION['id']) && $this -> controleur -> verifExist($_SESSION['id'])) {
			if (isset($_GET['action']))
				$action = $_GET['action'];
			else
				$action = 'messages';

			switch ($action) {
			
				case "messages" :
					$this -> controleur -> messages('');
					break;

				case "supprimer":
					$this -> controleur -> supprimer();
					break;

				case "creer":
					$this -> controleur -> creerChatPrive();
					break;

				case "chatprive":
					$this -> controleur -> chatPrive();
					break;

				case "envoyer_message":
					$this -> controleur -> envoyerMessage();
					break;

				case "renommer":
					$this -> controleur -> renommer();
					break;

				default:
					$this -> controleur -> pasAction();
					break;
			}
		}
		else {
			header("Location: ?module=compte");
			exit();
		}
	}
}
