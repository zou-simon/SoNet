<?php
require 'modele.php';
require 'vue.php';

class ContCompte {

	private $modele, $vue;
	
	function __construct() {
		$this -> modele = new ModeleCompte();
		$this -> vue = new VueCompte();
	}

	// Affichage la page de connexion
	function formConnexion() {
		if (isset($_SESSION['id'])) {
			header("Location: ?module=accueil");
			exit();
		}
		else
			$this -> vue -> afficheConnexion('');
	}

	// Affichage la page de connexion
	function formInscription() {
		if (isset($_SESSION['id'])) {
			header("Location: ?module=accueil");
			exit();
		}
		else
			$this -> vue -> afficheInscription('');
	}

	// Connexion d'un utilisateur
	function connexion() {
		if (isset($_POST['email']) && isset($_POST['password'])) {
			if ($this -> modele -> verifExist($_POST['email'])) {
				if ($this -> modele -> verifMdp($_POST['email'], $_POST['password'])) {
					$_SESSION['id'] = $this -> modele -> getId($_POST['email']);
					header("Location: ?module=accueil");
					exit();
				}
				else {
					$this -> vue -> afficheConnexion($this -> vue -> mdpIncorrect());
				}
			}
			else {
				$this -> vue -> afficheConnexion($this -> vue -> pasCompte());
			}
		}
	}

	// Inscription d'un utilisateur
	function inscription() {
		if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password-repeat']) && isset($_POST['birthday'])) {
			if ($this -> modele -> verifExist($_POST['email'])) {
				$this -> vue -> afficheInscription($this -> vue -> existeDeja($_POST['email']));
			}
			else {
				if ($_POST['password'] == $_POST['password-repeat']) {
					if ($this -> modele -> insert($_POST['name'], $_POST['email'], $_POST['password'], $_POST['birthday'])) {
						$_SESSION['id'] = $this -> modele -> getId($_POST['email']);
						header("Location: ?module=accueil");
						exit();
					}
				}
				else {
					$this -> vue -> afficheInscription($this -> vue -> mdpPasIdentique());
				}
			}
		}
	}

}
?>