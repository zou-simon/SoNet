<?php
require 'modele.php';
require 'vue.php';

class ContAccueil {

	private $modele, $vue;
	
	function __construct() {
		$this -> modele = new ModeleAccueil();
		$this -> vue = new VueAccueil();
	}

	// Vérifie l'existence du compte
	function verifExist($id) {
		return $this -> modele -> getCompte($id);
	}

	// Affichage de la page d'accueil
	function accueil($filActualite, $column2) {
		$this -> vue -> afficheAccueil($filActualite, $column2);
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

	// Affichage du fil d'actualité
	function filActualite($alert) {
		$listePublications = '';
		$column2 = '';
		$pasAmi = 1;
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
				if ($publication[6] == $_SESSION['id'] || $this -> modele -> getAVote($publication[4], $_SESSION['id']) != 0) {
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
				else {
					$formSondage = '';
					if (is_array($sondage) || is_object($sondage)) {
						foreach ($sondage as $key => $reponse) {
							if ($key > 0 && $key < 5 && $reponse != '')
								$formSondage .= $this -> vue -> reponse($sondage[0], $key, $reponse);
						}
					}
					$content .= $this -> vue -> sondage($sondage[0], $formSondage);
				}
			}
			// Identification
			if ($this -> modele -> getIdentifications($publication[0]) != null) {
				$identifie = '';
				foreach ($this -> modele -> getIdentifications($publication[0]) as $key => $ami) {
					if ($key == 0) {
						if ($this -> modele -> getRename($_SESSION['id'], $ami) != '')
							$identifie .= $this -> modele -> getRename($_SESSION['id'], $ami);
						else
							$identifie .= $this -> modele -> getCompte($ami)[1];
					}
					else {
						if ($this -> modele -> getRename($_SESSION['id'], $ami) != '')
							$identifie .= ", " . $this -> modele -> getRename($_SESSION['id'], $ami);
						else
							$identifie .= ", " . $this -> modele -> getCompte($ami)[1];
					}
				}
				$content .= $this -> vue -> identification($identifie);
			}
			// Localisation
			if ($publication[5] != '')
				$content .= $this -> vue -> localisation($publication[5]);
			
			$boutonsPublication = '';
			$modal = '';
			// Mes publications
			if ($publication[6] == $_SESSION['id']) {
				$boutonsPublication = $this -> vue -> mesBoutonsPublication($publication[0]);
				$modal = $this -> vue -> modalModifier($publication, $this -> listeAmis($this -> modele -> getIdentifications($publication[0])));
			}
			else {
				$boutonsPublication = $this -> vue -> autresBoutonsPublication($publication[6]);
				$modal = $this -> vue -> modalSignalerPublication($this -> modele -> getCompte($publication[6]), $publication[0]);
			}
			$listePublications .= $this -> vue -> publication($publication, $this -> modele -> getCompte($publication[6]), $content, $boutonsPublication, $modal);
			// Commentaires
			$listeCommentaires = '';
			foreach ($this -> modele -> getCommentaires($publication[0]) as $commentaire) {
				$modal = '';
				if ($commentaire[3] == $_SESSION['id']) {
					$boutonsCommentaire = $this -> vue -> mesBoutonsCommentaire($commentaire[0]);
					$modal = $this -> vue -> modalModifierCommentaire($commentaire);
				}
				else {
					$boutonsCommentaire = $this -> vue -> autresBoutonsCommentaire($commentaire[3]);
					$modal = $this -> vue -> modalSignalerCommentaire($this -> modele -> getCompte($commentaire[3]), $commentaire[0]);
				}
				$listeCommentaires .= $this -> vue -> commentaire($commentaire, $this -> modele -> getCompte($commentaire[3]), $boutonsCommentaire, $modal);
			}
			// Publication par le lien de partage
			if (isset($_GET['id']) && $_GET['id'] == $publication[0]) {
				$column2 .= $this -> vue -> affichagePublication($publication, $this -> modele -> getCompte($publication[6]), $content, $boutonsPublication, "block", $listeCommentaires);
				$pasAmi = 0;
			}
			else
				$column2 .= $this -> vue -> affichagePublication($publication, $this -> modele -> getCompte($publication[6]), $content, $boutonsPublication, "none", $listeCommentaires);
		}
		if (isset($_GET['id']) && $pasAmi == 1 && $this -> modele -> getCompte($this -> modele -> getPublication($_GET['id'])[6]) != '') {
			header("Location: ?module=amis&action=ajouter&id=" . $this -> modele -> getPublication($_GET['id'])[6]);
			exit();
		}
		$this -> accueil($this -> vue -> filActualite($this -> modele -> getCompte($_SESSION['id']), $alert, $this -> listeAmis(array()), $listePublications), $column2);
	}

	// Publier une publication
	function publier() {
		if (isset($_POST['message'])) {
			$valide = 1;
			$idPublication = '';
			// Fichier
			if ($_FILES['file']['name'] == "")
				$chemin = '';
			else {
				$target_chemin = "publication/" . $_SESSION['id'] . date("YmdHis") . "/";
				mkdir($target_chemin);
				$target_fichier = $target_chemin . basename($_FILES['file']['name']);
				$nomFichier = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
				$fichierType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
				$chemin = $target_chemin . $nomFichier . "." . $fichierType;

				if (isset($_POST['submit'])) {
					if (!getimagesize($_FILES['file']['tmp_name'])) {
						$this -> filActualite($this -> vue -> fichierEchec());
						$valide = 0;
					}	
				}

				if ($_FILES['file']['size'] > 10485760 || $_FILES['file']['size'] == 0) {
					$this -> filActualite($this -> vue -> fichierVolumineux());
					$valide = 0;
				}

				if ($valide == 1) {
					if (move_uploaded_file($_FILES['file']['tmp_name'], $target_fichier))
						rename($target_fichier, $chemin);
					else {
						if (is_dir($target_chemin))
							rmdir($target_chemin);
						$this -> filActualite($this -> vue -> fichierEchec());
						$valide = 0;
					}
				}
			}

			// Sondage
			$idSondage = 0;
			if (isset($_POST['choix1']) && isset($_POST['choix2'])) {
				$idSondage = $this -> modele -> insertSondage($_POST['choix1'], $_POST['choix2'], $_POST['choix3'] != '' ? $_POST['choix3'] : '', $_POST['choix4'] != '' ? $_POST['choix4'] : '');
			}

			// Localisation
			$locate = '';
			if (isset($_POST['locate'])) {
				$locate = $_POST['locate'];
			}

			if ($valide == 1) {
				$idPublication = $this -> modele -> insertPublication($_POST['message'], date("Y-m-d H:i:s"), $chemin, $idSondage, $locate, $_SESSION['id']);
				if ($idPublication != '') {
					// Identification
					if (isset($_POST['friends'])) {
						if (!$this -> modele -> insertIdentification($idPublication, $_POST['friends']))
							$this -> filActualite($this -> vue -> erreurIdentification());
						else
							$this -> filActualite($this -> vue -> publie());
					}
					else
						$this -> filActualite($this -> vue -> publie());
				}
				else 
					$this -> filActualite($this -> vue -> erreurPublication());
			}
			else
				$this -> filActualite($this -> vue -> erreurPublication());
		}
		else
			$this -> filActualite($this -> vue -> erreurPublication());
	}

	// Modifier une publication
	function modifierPublication() {
		if (isset($_GET['id'])) {
			$publication = '';
			foreach ($this -> modele -> getPublications($_SESSION['id']) as $p) {
				if ($_GET['id'] == $p[0])
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
							$this -> filActualite($this -> vue -> fichierEchec());
							$valide = 0;
						}	
					}

					if ($_FILES['update-file']['size'] > 10485760 || $_FILES['update-file']['size'] == 0) {
						$this -> filActualite($this -> vue -> fichierVolumineux());
						$valide = 0;
					}

					if ($valide == 1) {
						if (move_uploaded_file($_FILES['update-file']['tmp_name'], $target_fichier))
							rename($target_fichier, $chemin);
						else {
							if (is_dir($target_chemin))
								rmdir($target_chemin);
							$this -> filActualite($this -> vue -> fichierEchec());
							$valide = 0;
						}
					}
				}

				// Identification
				if ($this -> modele -> deleteIdentification($publication[0])) {
					if (isset($_POST['friends'])) {
						if (!$this -> modele -> insertIdentification($publication[0], $_POST['friends'])) {
							$this -> filActualite($this -> vue -> erreurIdentification());
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
						$this -> filActualite($this -> vue -> modificationPublication());
					else
						$this -> filActualite($this -> vue -> erreurModificationPublication());
				}
			}
			else
				$this -> filActualite($this -> vue -> erreurModificationPublication());
		}
	}

	// Supprimer une publication
	function supprimerPublication() {
		if (isset($_GET['id'])) {
			$publication = '';
			foreach ($this -> modele -> getPublications($_SESSION['id']) as $p) {
				if ($_GET['id'] == $p[0])
					$publication = $p;
			}
			if ($publication != '') {
				if ($this -> modele -> deletePublication($_GET['id'])) {
					if ($publication[3] != '' && file_exists($publication[3])) {
						unlink($publication[3]);
						rmdir("publication/" . $publication[6] . date("YmdHis", strtotime($publication[2])));
					}
					if ($this -> modele -> getIdentifications($publication[0]) != null)
						$this -> modele -> deleteIdentification($publication[0]);
					$this -> filActualite($this -> vue -> suppressionPublication());
				}
				else
					$this -> filActualite($this -> vue -> erreurSuppressionPublication());
			}
			else
				$this -> filActualite($this -> vue -> erreurSuppressionPublication());
		}
	}

	// Signaler une publication
	function signaler() {
		if (isset($_GET['id']) && isset($_GET['contenu']) && isset($_POST['raison']) && $this -> modele -> insertSignalement($_POST['raison'], $_SESSION['id'], $_GET['id'], $_GET['contenu']))
			$this -> filActualite($this -> vue -> confirmationSignalement($this -> modele -> getCompte($_GET['id'])));
		else
			$this -> filActualite($this -> vue -> erreurSignalement());
	}

	// Commenter une publication
	function commenter() {
		if (isset($_GET['id']) && isset($_POST['commentaire'])) {
			if ($this -> modele -> insertCommentaire($_POST['commentaire'], date("Y-m-d H:i:s"), $_SESSION['id'], $_GET['id']))
				$this -> filActualite('');
			else
				$this -> filActualite($this -> vue -> erreurCommentaire());
		}
	}

	// Modifier une publication
	function modifierCommentaire() {
		if (isset($_GET['id']) && isset($_POST['message'])) {
			if ($this -> modele -> updateCommentaire($_GET['id'], $_POST['message']))
				$this -> filActualite($this -> vue -> modificationPublication());
			else
				$this -> filActualite($this -> vue -> erreurModificationPublication());
		}
	}

	// Supprimer une publication
	function supprimerCommentaire() {
		if (isset($_GET['id'])) {
			if ($this -> modele -> getCommentaireUtilisateur($_GET['id']) == $_SESSION['id']) {
				if ($this -> modele -> deleteCommentaire($_GET['id']))
					$this -> filActualite($this -> vue -> suppressionCommentaire());
			}
			else
				$this -> filActualite($this -> vue -> pasVotreCommentaire());
		}
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

	// Affichage de la page action incorrecte
	function pasAction() {
		$this -> vue -> pasAction();
	}
}
?>