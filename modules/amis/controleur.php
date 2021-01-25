<?php
require 'modele.php';
require 'vue.php';

class ContAmis {

	private $modele, $vue;
	
	function __construct() {
		$this -> modele = new ModeleAmis();
		$this -> vue = new VueAmis();
	}

	// Vérifie l'existence du compte
	function verifExist($id) {
		return $this -> modele -> getCompte($id);
	}

	// Retoune la liste des amis avec les surnoms
	function listeAmis() {
		$listeAmis = $this -> modele -> getAmis($_SESSION['id']);
		$content = '';
		foreach($listeAmis as $value) {
			if ($value[0] != $_SESSION['id']) {
				if ($value[2] == null)
					$content .= $this -> vue -> ami($this -> modele -> getNomPhotoEtId($value[0]), $this -> modele -> getNomPhotoEtId($value[0])[0]);
				else
					$content .= $this -> vue -> ami($this -> modele -> getNomPhotoEtId($value[0]), $value[2]);
			}
			else {
				if ($value[3] == null)
					$content .= $this -> vue -> ami($this -> modele -> getNomPhotoEtId($value[1]), $this -> modele -> getNomPhotoEtId($value[1])[0]);
				else
					$content .= $this -> vue -> ami($this -> modele -> getNomPhotoEtId($value[1]), $value[3]);
			}
		}
		return $content == '' ? $this -> vue -> pasAmi() : $content;
	}

	// Retoune la liste des demandes d'ami recues
	function listeDemandesAmiRecue() {
		$listeDemandesAmiRecue = $this -> modele -> getDemandesAmiRecue($_SESSION['id']);
		$content = '';
		foreach($listeDemandesAmiRecue as $value) {
			$content .= $this -> vue -> demandeAmiRecue($this -> modele -> getNomPhotoEtId($value[0]));
		}
		return $content;
	}

	// Retoune la liste des demandes d'ami envoyées
	function listeDemandesAmiEnvoyee() {
		$listeDemandeAmiEnvoyee = $this -> modele -> getDemandesAmiEnvoyee($_SESSION['id']);
		$content = '';
		foreach($listeDemandeAmiEnvoyee as $value) {
			$content .= $this -> vue -> demandeAmiEnvoyee($this -> modele -> getNomPhotoEtId($value[0]));
		}
		return $content;
	}

	// Retourne la liste des demandes d'ami
	function listeDemandeAmi() {
		$content = '';
		if ($this -> listeDemandesAmiRecue() != '') {
			$content .= '<p class="text-secondary">Reçue</p>
				' . $this -> listeDemandesAmiRecue();
		}

		if ($this -> listeDemandesAmiEnvoyee() != '') {
			$content .= '<p class="text-secondary">Envoyée</p>
				' . $this -> listeDemandesAmiEnvoyee();
		}
		return $content == '' ? $this -> vue -> pasDemandeAmi() : $content;
	}

	// Retourne la liste des utilisateurs bloqués
	function listeUtilisateursBloques() {
		$listeUtilisateursBloques = $this -> modele -> getUtilisateursBloques($_SESSION['id']);
		$content = '';
		foreach($listeUtilisateursBloques as $value) {
			$content .= $this -> vue -> utilisateurBloque($this -> modele -> getNomPhotoEtId($value[0]));
		}
		return $content == '' ? $this -> vue -> pasUtilisateurBloque() : $content;
	}

	// Retourne la liste des publications d'un ami
	function listePublications($utilisateur) {
		$listePublications = '';
		$publications = $this -> modele -> getPublications($utilisateur);
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
				if ($this -> modele -> getAVote($publication[4], $_SESSION['id']) != 0) {
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

			$identifie = '';

			$listePublications .= $this -> vue -> publication($publication, $content, $this -> listeAmis($identifie));
		}
		return $listePublications == '' ? $this -> vue -> pasPublication($this -> modele -> getNomPhotoEtId($utilisateur)) : $listePublications;
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

	// Affichage de la page amis
	function amis($alert, $content) {
		$badge = '';
		if ($this -> modele -> compteDemande($_SESSION['id']) != 0)
			$badge = $this -> vue -> badgeDemandeAmi($this -> modele -> compteDemande($_SESSION['id']));
		$this -> vue -> afficheAmis($this ->listeAmis(), $badge, $alert, $content);
	}

	// Affichage ajout d'un ami
	function ajoutAmi($alert) {
		$this -> amis('', $this -> vue -> afficheAjoutAmi($this -> listeDemandeAmi(), $this -> listeUtilisateursBloques(), $alert));
	}

	// Affichage profil d'un ami
	function profilAmi($utilisateur) {
		$this -> amis('', $this -> vue -> afficheProfil($this -> modele -> getNomPhotoEtId($utilisateur), $this -> modele -> getRename($_SESSION['id'], $utilisateur), $this -> listePublications($utilisateur)));
	}

	// Ajouter un ami
	function ajouter() {
		if (isset($_POST['add'])) {
			if ($this -> modele -> mailExiste($_POST['add'])) {
				if ($this -> modele -> verifBlock($this -> modele ->getId($_POST['add']), $_SESSION['id']) == 1)
					$this -> ajoutAmi($this -> vue -> etreBloque());
				else if ($this -> modele -> verifBlock($_SESSION['id'], $this -> modele ->getId($_POST['add'])) == 1)
					$this -> ajoutAmi($this -> vue -> userBloque());
				else if ($_SESSION['id'] == $this -> modele -> getId($_POST['add']))
					$this -> ajoutAmi($this -> vue -> ajoutSoiMeme());
				else if ($this -> modele -> sontAmis($_SESSION['id'], $this -> modele -> getId($_POST['add'])))
					$this -> ajoutAmi($this -> vue -> dejaAmi($this -> modele -> getIdNom($_POST['add'])));
				else if ($this -> modele -> demandeReciproque($_SESSION['id'], $this -> modele -> getId($_POST['add']))) {
					if ($this -> modele -> insertAmi($_SESSION['id'], $this -> modele -> getId($_POST['add'])) == 2)
						$this -> ajoutAmi($this -> vue -> confirmAjoutAmi($this -> modele -> getNomPhotoEtId($this -> modele -> getId($_POST['add']))));
				}
				else if ($this -> modele -> insertionDemandeAmi($_SESSION['id'], $this -> modele -> getId($_POST['add'])) != 0)
					$this -> ajoutAmi($this -> vue -> confirmAjout($this -> modele -> getIdNom($_POST['add'])));
				else
					$this -> ajoutAmi($this -> vue -> demandeDejaFaite($this -> modele -> getIdNom($_POST['add'])));
			}
			else
				$this -> ajoutAmi($this -> vue -> ajoutEmailInutilise());
		}
		else if (isset($_GET['id']) && $this -> modele -> getCompte($_GET['id']) != null) {
			if($_SESSION['id'] != $_GET['id'])
				$this -> ajoutAmi($this -> vue -> vouloirAjouter($this -> modele -> getCompte($_GET['id'])));
			else
				$this -> ajoutAmi($this -> vue -> ajoutSoiMeme());
		}
		else
			$this -> ajoutAmi($this -> vue -> errorAjoutPartage());
	}

	// Accepter une demande d'ami
	function accepterDemande() {
		if (isset($_GET['id']) && $this -> modele -> verifDemande($_SESSION['id'], $_GET['id']) == 1) {
			if ($this -> modele -> insertAmi($_SESSION['id'], $_GET['id']) != 0)
				$this -> ajoutAmi($this -> vue -> confirmAjoutAmi($this -> modele -> getNomPhotoEtId($_GET['id'])));
			else
				$this -> ajoutAmi($this -> vue -> errorAmi());
		}
		else
			$this -> ajoutAmi($this -> vue -> errorAmi());
	}

	// Refuser une demande d'ami
	function refuserDemande() {
		if (isset($_GET['id']) && $this -> modele -> verifDemande($_SESSION['id'], $_GET['id']) == 1) {
			if ($this -> modele -> deleteDemandeAmi($_SESSION['id'], $_GET['id']) != 0) {
				$this -> ajoutAmi($this -> vue -> confirmRefusAmi($this -> modele -> getNomPhotoEtId($_GET['id'])));
			}
		}
		else
			$this -> ajoutAmi($this -> vue -> errorAmi());
	}

	// Annuler une demande d'ami envoyée
	function annulerDemande() {
		if (isset($_GET['id']) && $this -> modele -> verifDemande($_SESSION['id'], $_GET['id']) == 1) {
			if ($this -> modele -> deleteDemandeAmi($_SESSION['id'], $_GET['id']) != 0)
				$this -> ajoutAmi($this -> vue -> confirmAnnuleDemandeAmi($this -> modele -> getNomPhotoEtId($_GET['id'])));
		}
		else
			$this -> ajoutAmi($this -> vue -> errorAmi());
	}

	// Supprimer un ami
	function supprimer() {
		if (isset($_GET['delete']) && $this -> modele -> deleteAmi($_SESSION['id'] ,$_GET['delete']) == 1)
			$this -> amis($this -> vue -> confirmDelete($this-> modele -> getNomPhotoEtId($_GET['delete'])), '');
		else
			$this -> amis($this -> vue -> errorDelete(), '');
	}

	// Renommer un ami
	function renommer() {
		if (isset($_GET['rename']) && isset($_POST['name'])) {
			if (trim($_POST['name']) == $this -> modele -> getNomPhotoEtId($_GET['rename'])[0] || trim($_POST['name']) == '') {
				if ($this -> modele -> updateAlias($_GET['rename'], $_SESSION['id'], '') != 0)
					$this -> amis($this -> vue -> confirmDeleteRename($this-> modele -> getNomPhotoEtId($_GET['rename'])), '');
				else
					$this -> amis('', '');
			}
			elseif ($this -> modele -> updateAlias($_GET['rename'], $_SESSION['id'], trim($_POST['name'])) == 1)
				$this -> amis($this -> vue -> confirmRename($this-> modele -> getNomPhotoEtId($_GET['rename']), trim($_POST['name'])), '');
			else
				$this -> amis($this -> vue -> errorRename(), '');
		}
		else
			$this -> amis($this -> vue -> errorRename(), '');
	}

	// Bloquer un utilisateur
	function bloquer() {
		if (isset($_GET['block']) && $this -> modele -> sontAmis($_SESSION['id'], $_GET['block'])) {
			if ($this -> modele -> blockUser($_SESSION['id'], $_GET['block']) == 2)
				$this -> amis($this -> vue -> confirmBloquer($this -> modele -> getNomPhotoEtId($_GET['block'])), '');
			else
				$this -> amis($this -> vue -> errorBloquer(), '');
		}
		else
			$this -> amis($this -> vue -> errorBloquer(), '');
	}

	// Debloquer un utilisateur
	function debloquer() {
		if (isset($_GET['id']) && $this -> modele -> verifBlock($_SESSION['id'], $_GET['id'])) {
			if ($this -> modele -> unblockUser($_SESSION['id'], $_GET['id']) == 1)
				$this -> ajoutAmi($this -> vue -> confirmDebloquer($this -> modele -> getNomPhotoEtId($_GET['id'])), '');
			else
				$this -> ajoutAmi($this -> vue -> errorDebloquer(), '');
		}
		else
			$this -> ajoutAmi($this -> vue -> errorDebloquer(), '');
	}

	// Signaler un ami
	function signaler() {
		if (isset($_GET['report']) && isset($_POST['raison']) && $this -> modele -> insertSignalement($_POST['raison'], $_SESSION['id'], $_GET['report']) != 0)
			$this -> amis($this -> vue -> confirmReport($this-> modele -> getNomPhotoEtId($_GET['report'])), '');
		else
			$this -> amis($this -> vue -> errorReport(), '');
	}

	// Affiche le profil d'un ami
	function profil() {
		if (isset($_GET['id']) && $this -> modele -> sontAmis($_SESSION['id'], $_GET['id']))
			$this -> profilAmi($_GET['id']);
		else
			$this -> amis($this -> vue -> errorAmi(), '');
	}

	// Affichage de la page action incorrecte
	function pasAction() {
		$this -> vue -> pasAction();
	}
}
?>