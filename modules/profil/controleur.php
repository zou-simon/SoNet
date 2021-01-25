<?php
require 'modele.php';
require 'vue.php';

class ContProfil {

	private $modele, $vue;
	
	function __construct() {
		$this -> modele = new ModeleProfil();
		$this -> vue = new VueProfil();
	}

	// Vérifie l'existence du compte
	function verifExist($id) {
		return $this -> modele -> getCompte($id);
	}

	// Affichage de la page profil
	function profil($content) {
		$this -> vue -> afficheProfil($this -> modele -> getCompte($_SESSION['id']), $content);
	}

	// Récupère la liste des amis avec les surnoms
	function listeAmis($identifie) {
		$content = '';
		foreach ($this -> modele -> getAmis($_SESSION['id']) as $ami) {
			if ($ami[0] != $_SESSION['id']) {
				if ($ami[2] == null) {
					if ($identifie != '' && in_array($ami[0], $identifie))
						$content .= $this -> vue -> ami($this -> modele -> getNomPhotoEtId($ami[0]), $this -> modele -> getNomPhotoEtId($ami[0])[0], 'checked');
					else
						$content .= $this -> vue -> ami($this -> modele -> getNomPhotoEtId($ami[0]), $this -> modele -> getNomPhotoEtId($ami[0])[0], '');
				}
				else {
					if ($identifie != '' && in_array($ami[0], $identifie))
						$content .= $this -> vue -> ami($this -> modele -> getNomPhotoEtId($ami[0]), $ami[2], 'checked');
					else
						$content .= $this -> vue -> ami($this -> modele -> getNomPhotoEtId($ami[0]), $ami[2], '');
				}
			}
			else {
				if ($ami[3] == null) {
					if ($identifie != '' && in_array($ami[1], $identifie))
						$content .= $this -> vue -> ami($this -> modele -> getNomPhotoEtId($ami[1]), $this -> modele -> getNomPhotoEtId($ami[1])[0], 'checked');
					else
						$content .= $this -> vue -> ami($this -> modele -> getNomPhotoEtId($ami[1]), $this -> modele -> getNomPhotoEtId($ami[1])[0], '');
				}
				else {
					if ($identifie != '' && in_array($ami[1], $identifie))
						$content .= $this -> vue -> ami($this -> modele -> getNomPhotoEtId($ami[1]), $ami[3], 'checked');
					else
						$content .= $this -> vue -> ami($this -> modele -> getNomPhotoEtId($ami[1]), $ami[3], '');
				}
			}
		}
		return $content == '' ? $this -> vue -> pasAmi() : $content;
	}

	// Affichage des publications de l'utilisateur
	function publications($alert) {
		$listePublications = '';
		$publications = $this -> modele -> getPublications($_SESSION['id']);
		foreach ($publications as $publication) {
			$content = '';
			// Fichier
			if ($publication[3] != '') {
				if (file_exists($publication[3])) {
					if (strstr(mime_content_type($publication[3]), '/', true) == "image")
						$content .= $this -> vue -> image($publication[3]);
					else if (strstr(mime_content_type($publication[3]), '/', true) == "video")
						$content .= $this -> vue -> video($publication[3]);
					else if (strstr(mime_content_type($publication[3]), '/', true) == "audio")
						$content .= $this -> vue -> audio($publication[3]);
					else
						$content .= $this -> vue -> fichier($publication[3]);
				}
				else
					$content .= $this -> vue -> problemeFichier();
			}
			// Sondage
			if ($publication[4] != 0) {
				$sondage = $this -> modele -> getSondage($publication[4]);
				$resultats = '';
				$totalVote = $sondage[5] + $sondage[6] + $sondage[7] + $sondage[8];
				if (is_array($sondage) || is_object($sondage)) {
					foreach ($sondage as $key => $reponse) {
						if ($key > 0 && $key < 5 && $reponse != null) {
							if ($totalVote == 0)
								$resultats .= $this -> vue -> resultat($reponse, 0);
							else
								$resultats .= $this -> vue -> resultat($reponse, $sondage[$key + 4] / $totalVote * 100);
						}
					}
				}
				$content .= $this -> vue -> resultatSondage($resultats);
			}
			// Identification
			if ($this -> modele -> getIdentification($publication[0]) != null) {
				$identifie = '';
				foreach ($this -> modele -> getIdentification($publication[0]) as $key => $ami) {
					if ($key == 0)
						$identifie .= $this -> modele -> getCompte($ami)[1];
					else
						$identifie .= ", " . $this -> modele -> getCompte($ami)[1];
				}
				$content .= $this -> vue -> identification($identifie);
			}
			// Localisation
			if ($publication[5] != '')
				$content .= $this -> vue -> localisation($publication[5]);

			$listePublications .= $this -> vue -> publication($publication, $content, $this -> listeAmis($this -> modele -> getIdentification($publication[0])));	
		}
		if ($listePublications == '') {
			$listePublications = $this -> vue -> pasPublication();
		}
		$this -> profil($this -> vue -> affichePublications($alert, $listePublications));
	}

	// Modification d'une publication
	function modificationPublication() {
		if (isset($_GET['idPublication'])) {
			$publication = '';
			foreach ($this -> modele -> getPublications($_SESSION['id']) as $p) {
				if ($_GET['idPublication'] == $p[0])
					$publication = $p;
			}
			if ($publication != '') {
				// Localisation
				if (isset($_POST['message']) && $_POST['message'] != '')
					$message = $_POST['message'];
				else
					$message = $publication[1];

				$valide = 1;
				// Fichier
				if ($_FILES['update-file']['name'] == '') {
					if (isset($_POST['file-is-delete']) && $_POST['file-is-delete'] == 1) {
						if ($publication[3] != '' && file_exists($publication[3])) {
							unlink($publication[3]);
							rmdir("publication/" . $publication[6] . date("YmdHis", strtotime($publication[2])));
						}
						$chemin = '';
					}
					else
						$chemin = $publication[3];
				}
				else {
					$target_chemin = "publication/" . $publication[6] . date("YmdHis", strtotime($publication[2])) . "/";
					if ($publication[3] != '' && file_exists($publication[3]))
						unlink($publication[3]);
					else
						mkdir($target_chemin);
					$target_fichier = $target_chemin . basename($_FILES['update-file']['name']);
					$nomFichier = pathinfo($_FILES['update-file']['name'], PATHINFO_FILENAME);
					$fichierType = strtolower(pathinfo($_FILES['update-file']['name'], PATHINFO_EXTENSION));
					$chemin = $target_chemin . $nomFichier . "." . $fichierType;

					if (isset($_POST['submit'])) {
						if (!getimagesize($_FILES['update-file']['tmp_name'])) {
							$this -> publications($this -> vue -> fichierEchec());
							$valide = 0;
						}	
					}

					if ($_FILES['update-file']['size'] > 10485760 || $_FILES['update-file']['size'] == 0) {
						$this -> publications($this -> vue -> fichierVolumineux());
						$valide = 0;
					}

					if ($valide == 1) {
						if (move_uploaded_file($_FILES['update-file']['tmp_name'], $target_fichier))
							rename($target_fichier, $chemin);
						else {
							if (is_dir($target_chemin))
								rmdir($target_chemin);
							$this -> publications($this -> vue -> fichierEchec());
							$valide = 0;
						}
					}
				}

				// Identification
				if ($this -> modele -> deleteIdentificationPublication($publication[0])) {
					if (isset($_POST['friends'])) {
						if (!$this -> modele -> insertIdentification($publication[0], $_POST['friends'])) {
							$this -> publications($this -> vue -> erreurIdentification());
							$valide = 0;
						}
					}
				}

				// Localisation
				if (isset($_POST['locate']))
					$locate = $_POST['locate'];
				else
					$locate = $publication[5];

				if ($valide == 1) {
					if ($this -> modele -> updatePublication($publication[0], $message, $chemin, $locate))
						$this -> publications($this -> vue -> modificationPublication());
					else
						$this -> publications($this -> vue -> erreurModificationPublication());
				}
			}
			else
				$this -> publications($this -> vue -> erreurModificationPublication());
		}
	}

	// Suppression d'une publication
	function suppressionPublication() {
		if (isset($_GET['idPublication'])) {
			$publication = '';
			foreach ($this -> modele -> getPublications($_SESSION['id']) as $p) {
				if ($_GET['idPublication'] == $p[0])
					$publication = $p;
			}
			if ($publication != '') {
				if ($this -> modele -> deletePublication($_GET['idPublication'])) {
					if ($publication[3] != '' && file_exists($publication[3])) {
						unlink($publication[3]); 
						rmdir("publication/" . $publication[6] . date("YmdHis", strtotime($publication[2])));
					}
					if ($this -> modele -> getIdentification($publication[0]) != null)
						$this -> modele -> deleteIdentificationPublication($publication[0]);
					$this -> publications($this -> vue -> suppressionPublication());
				}
				else
					$this -> publications($this -> vue -> erreurSuppressionPublication());
			}
			else
				$this -> publications($this -> vue -> erreurSuppressionPublication());
		}
		else
			$this -> publications($this -> vue -> erreurSuppressionPublication());
	}

	// Voter pour le sondage d'une publication
	function voter() {
		if (isset($_GET['id']) && isset($_GET['vote'])) {
			if ($this -> modele -> getSondage($_GET['id']) && $this -> modele -> getAVote($_GET['id'], $_SESSION['id']) == 0) {
				if ($this -> modele -> insertAVote($_GET['id'], $_SESSION['id'], $_GET['vote']) != 0 && $this -> modele -> updateSondage($_GET['vote'], $_GET['id'])) {
					
				}
			}
			$sondage = $this -> modele -> getSondage($_GET['id']);
			$resultats = '';
			$totalVote = $sondage[5] + $sondage[6] + $sondage[7] + $sondage[8];
			if (is_array($sondage) || is_object($sondage)) {
				foreach ($sondage as $key => $reponse) {
					if ($key > 0 && $key < 5 && $reponse != null) {
						if ($totalVote == 0)
							$resultats .= $this -> vue -> resultat($reponse, 0);
						else
							$resultats .= $this -> vue -> resultat($reponse, $sondage[$key + 4] / $totalVote * 100);
					}
				}
			}
			echo $this -> vue -> resultatSondage($resultats);
		}
	}

	// Affichage de la section pour modifier le nom, email, date de naissance ou photo de profil
	function compte($alert) {
		$this -> profil($this -> vue -> afficheCompte($this -> modele -> getCompte($_SESSION['id']), $alert));
	}

	// Modification du nom, email, date de naissance ou photo de profil
	function modificationCompte() {
		if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['birthday'])) {
			if ($this -> modele -> verifExist($_POST['email']) && $_SESSION['id'] != $this -> modele -> getId($_POST['email']))
				$this -> compte($this -> vue -> existeDeja($_POST['email']));
			else {
				$valide = 1;
				// Image
				if ($_FILES['photo']['name'] == '')
					$dir = $this -> modele -> getCompte($_SESSION['id'])[6];
				else {
					$target_chemin = "img/profil/";
					$target_fichier = $target_chemin . basename($_FILES['photo']['name']);
					$imageType = strtolower(pathinfo($target_fichier, PATHINFO_EXTENSION));
					$dir = $target_chemin . "profil_" . $_SESSION['id'] . ".png";

					if (isset($_POST["submit"])) {
						if (!getimagesize($_FILES['photo']['tmp_name'])) {
							$this -> compte($this -> vue -> photoEchec());
							$valide = 0;
						}
					}

					if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != null) {
						$this -> compte($this -> vue -> photoMauvaisFormat());
						$valide = 0;
					}

					if ($_FILES['photo']['size'] > 2097152 || $_FILES['photo']['size'] == 0) {
						$this -> compte($this -> vue -> photoVolumineux());
						$valide = 0;
					}

					if ($valide == 1) {
						if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_fichier))
							rename($target_fichier, $dir);
						else {
							$this -> compte($this -> vue -> photoEchec());
							$valide = 0;
						}
					}
				}
				
				if ($valide == 1) {
					if ($_POST['birthday'] == $this -> modele -> getCompte($_SESSION['id'])[4] && $_POST['name'] == '' && $_POST['email'] == '' && $_FILES['photo']['name'] == '')
						$this -> compte($this -> vue -> aucuneModification());
					else {
						if ($this -> modele -> update($this -> modele -> getCompte($_SESSION['id']), $_POST['name'] != '' ? $_POST['name'] : $this -> modele -> getCompte($_SESSION['id'])[1], $_POST['email'] != '' ? $_POST['email'] : $this -> modele -> getCompte($_SESSION['id'])[2], $_POST['birthday'], $dir)) {
							if ($_POST['email'] != '') {
								unset($_SESSION['id']);
								session_destroy();
								session_start();
								$_SESSION['id'] = $this -> modele -> getId($_POST['email']);
							}
							$this -> compte($this -> vue -> modificationFaite());
						}
						else
							$this -> compte($this -> vue -> erreurModification());
					}
				}
			}	
		}
		else
			$this -> compte($this -> vue -> erreurModification());
	}

	// Suppression du compte
	function suppressionCompte() {
		if ($this -> modele -> deleteCompte($_SESSION['id'])) {
			// Photo de profil
			unlink("img/profil/profil_" . $_SESSION['id'] . ".png");
			foreach ($this -> modele -> getPublications($_SESSION['id']) as $publication) {
				// Identification
				if ($this -> modele -> getIdentification($publication[0]) != null)
					$this -> modele -> deleteIdentificationUtilisateur($publication[0]);
				// Mes publications
				if ($publication[6] == $_SESSION['id'] && $this -> modele -> deletePublication($publication[0])) {
					if ($publication[3] != '' && file_exists($publication[3])) {
						unlink($publication[3]);
						rmdir("publication/" . $publication[6] . date("YmdHis", strtotime($publication[2])));
					}
					if ($this -> modele -> getIdentification($publication[0]) != null)
						$this -> modele -> deleteIdentificationPublication($publication[0]);
				}
				else
					$this -> compte($this -> vue -> erreurSuppressionCompte());
			}
			$this -> deconnexion();
		}
		else
			$this -> compte($this -> vue -> erreurSuppressionCompte());
	}

	// Affichage de la section pour modifier le mot de passe
	function securite($alert) {
		$this -> profil($this -> vue -> afficheSecurite($alert));
	}

	// Modification du mot de passe
	function changeMdp() {
		if (isset($_POST['old-password']) && isset($_POST['new-password']) && isset($_POST['new-password-repeat'])) {
			if ($this -> modele -> verifMdp($_SESSION['id'], $_POST['old-password'])) {
				if ($_POST['old-password'] != $_POST['new-password']) {
					if ($_POST['new-password'] == $_POST['new-password-repeat']) {
						if ($this -> modele -> updateMdp($_SESSION['id'], $_POST['new-password']))
							$this -> securite($this -> vue -> modificationMdpFaite());
						else
							$this -> securite($this -> vue -> erreurModificationMdp());
					}
					else
						$this -> securite($this -> vue -> mdpPasIdentique());
				}
				else
					$this -> securite($this -> vue -> mdpIdentique());
			}
			else
				$this -> securite($this -> vue -> mauvaisMdp());
		}
		else
			$this -> securite($this -> vue -> erreurModificationMdp());
	}

	// Deconnexion du compte
	function deconnexion() {
		if (isset($_SESSION['id'])) {
			unset($_SESSION['id']);
			session_destroy();
			header("Location: ?module=compte");
			exit();
		}
	}

	// Affichage de la page action incorrecte
	function pasAction() {
		$this -> vue -> pasAction();
	}
}
?>