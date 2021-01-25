<?php

class ModeleAccueil extends Connexion {
	
	function __construct() {
	}

	// Selection d'un utilisateur avec id
	function getCompte($idUtilisateur) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM utilisateur WHERE id = '$idUtilisateur'");
		$selectPrepa -> execute();
		return $selectPrepa -> fetch();
	}

	// Selection des amis avec id
	function getAmis($idUtilisateur) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM etreamis WHERE idUtilisateur1 = '$idUtilisateur' OR idUtilisateur2 = '$idUtilisateur'");
		$selectPrepa -> execute();
		return $selectPrepa -> fetchAll();
	}

	// Selection un utilisateur avec id pour avoir Nom, Photo et Id
	function getNomPhotoEtId($idUtilisateur) {
		$selectPrepa = self::$bdd -> prepare("SELECT nom, photoProfil, id FROM utilisateur WHERE id = '$idUtilisateur'");
		$selectPrepa -> execute();
		return $selectPrepa -> fetch();
	}

	// Insertion une publication
	function insertPublication($message, $date, $fichier, $sondage, $lieu, $idUtilisateur) {
		$sql = "INSERT INTO publication (message, date, fichier, sondage, localisation, utilisateur) VALUES (:message, :date, :fichier, :sondage, :lieu, :idUtilisateur)";
		$selectPrepa = self::$bdd -> prepare($sql);
		$selectPrepa -> execute(array('message' => $message, 'date' => $date, 'fichier' => $fichier, 'sondage' => $sondage, 'lieu' => $lieu, 'idUtilisateur' => $idUtilisateur));
		return self::$bdd -> lastInsertId();
	}

	// Insertion un sondage
	function insertSondage($choix1, $choix2, $choix3, $choix4) {
		$sql = "INSERT INTO sondage (choix1, choix2, choix3, choix4) VALUES (:choix1, :choix2, :choix3, :choix4)";
		$selectPrepa = self::$bdd -> prepare($sql);
		$selectPrepa -> execute(array('choix1' => $choix1, 'choix2' => $choix2, 'choix3' => $choix3, 'choix4' => $choix4));
		return self::$bdd -> lastInsertId();
	}

	// Insertion d'une identification
	function insertIdentification($idPublication, $idUtilisateurs) {
		foreach ($idUtilisateurs as $ami) {
			$sql = "INSERT INTO identification (idPublication, idIdentifie) VALUES (:idPublication, :idIdentifie)";
			$selectPrepa = self::$bdd -> prepare($sql);
			$selectPrepa -> execute(array('idPublication' => $idPublication, 'idIdentifie' => $ami));
		}
		return $selectPrepa -> rowCount() != 0 ? true : false;
	}

	// Selection de tous les publications
	function getPublications($idUtilisateur) {
		$selectPrepa = self::$bdd -> prepare("SELECT publication.* FROM publication WHERE utilisateur = '$idUtilisateur' 
		OR publication.utilisateur in (SELECT idUtilisateur2 FROM etreamis WHERE idUtilisateur1 = '$idUtilisateur') 
		OR publication.utilisateur in (SELECT idUtilisateur1 FROM etreamis WHERE idUtilisateur2 = '$idUtilisateur')
		ORDER BY date DESC");
		$selectPrepa -> execute();
		return $selectPrepa -> fetchAll();
	}

	// Selection d'un sondage
	function getSondage($idSondage) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM sondage WHERE id = '$idSondage'");
		$selectPrepa -> execute();
		return $selectPrepa -> fetch();
	}

	// Selection des identifications
	function getIdentifications($idPublication) {
		$selectPrepa = self::$bdd -> prepare("SELECT idIdentifie FROM identification WHERE idPublication = '$idPublication'");
		$selectPrepa -> execute();
		return $selectPrepa -> fetchAll(PDO::FETCH_COLUMN, 0);
	}

	// Recupere le renommage d'un utilisateur
	function getRename($renommeur, $renomme) {
		$selectPrepa = self::$bdd -> prepare("SELECT renameUser1 FROM etreamis WHERE idUtilisateur1 = '$renomme' AND idUtilisateur2 = '$renommeur'");
		$selectPrepa -> execute();

		if ($selectPrepa -> rowCount() == 0) {
			$selectPrepa = self::$bdd -> prepare("SELECT renameUser2 FROM etreamis WHERE idUtilisateur1 = '$renommeur' AND idUtilisateur2 = '$renomme'");
			$selectPrepa -> execute();
		}

		return $selectPrepa -> rowCount() == 0 ? null : $selectPrepa -> fetchColumn();
	}

	// Mise à jour d'une publication
	function updatePublication($idPublication, $message, $fichier, $lieu) {
		$sql = "UPDATE publication SET message = :message, fichier = :fichier, localisation = :lieu WHERE id = :id";
		$selectPrepa = self::$bdd -> prepare($sql);
		$result = $selectPrepa -> execute(array('message' => $message, 'fichier' => $fichier, 'lieu' => $lieu, 'id' => $idPublication));
		return ($result) ? true : false;
	}

	// Suppression des identifications d'une publication
	function deleteIdentification($idPublication) {
		$sql = "DELETE FROM identification WHERE idPublication = '$idPublication'";
		$selectPrepa = self::$bdd -> prepare($sql);
		return ($selectPrepa -> execute()) ? true : false;
	}

	// Suppresion d'une publication
	function deletePublication($idPublication) {
		$sql = "DELETE FROM publication WHERE id = '$idPublication'";
		$selectPrepa = self::$bdd -> prepare($sql);
		return ($selectPrepa -> execute()) ? true : false;
	}

	// Selection d'une publication
	function getPublication($idPublication) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM publication WHERE id = '$idPublication'");
		$selectPrepa -> execute();
		return $selectPrepa -> fetch();
	}

	// Insertion d'un signalement
	function insertSignalement($raison, $signaleur ,$signale, $contenu) {
		$selectPrepa = self::$bdd -> prepare("INSERT INTO signalement (raison, signaleur, signale, contenu) VALUES (:raison, :signaleur, :signale, :contenu)");
		$selectPrepa -> execute(array('raison' => $raison, 'signaleur' => $signaleur, 'signale' => $signale, 'contenu' => $contenu));
		return $selectPrepa->rowCount();
	}

	// Insertion d'un commentaire
	function insertCommentaire($message, $date, $idUtilisateur, $idPublication) {
		$selectPrepa = self::$bdd -> prepare("INSERT INTO commentaire (message, date, idUtilisateur, idPublication) VALUES (:message, :date, :idUtilisateur, :idPublication)");
		$selectPrepa -> execute(array('message' => $message, 'date' => $date, 'idUtilisateur' => $idUtilisateur, 'idPublication' => $idPublication));
		return $selectPrepa->rowCount();
	}

	// Selection des commentaires d'une publication
	function getCommentaires($idPublication) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM commentaire WHERE idPublication = '$idPublication' ORDER BY date DESC");
		$selectPrepa -> execute();
		return $selectPrepa -> fetchAll();
	}

	// Selection de l'utilisateur d'un commentaire
	function getCommentaireUtilisateur($idCommentaire) {
		$selectPrepa = self::$bdd -> prepare("SELECT idUtilisateur FROM commentaire WHERE id = '$idCommentaire'");
		$selectPrepa -> execute();
		return $selectPrepa -> fetchColumn();
	}

	// Suppresion d'un commentaire
	function deleteCommentaire($idCommentaire) {
		$sql = "DELETE FROM commentaire WHERE id = '$idCommentaire'";
		$selectPrepa = self::$bdd -> prepare($sql);
		return ($selectPrepa -> execute()) ? true : false;
	}

	// Mise à jour d'un commentaire
	function updateCommentaire($idCommentaire, $message) {
		$sql = "UPDATE commentaire SET message = :message WHERE id = :id";
		$selectPrepa = self::$bdd -> prepare($sql);
		$result = $selectPrepa -> execute(array('message' => $message, 'id' => $idCommentaire));
		return ($result) ? true : false;
	}

	// Mise à jour d'un sondage, rajouter une voie
	function updateSondage($choix, $idSondage) {
		$sql = "UPDATE sondage SET vote" . $choix . " = vote" . $choix . " + 1 WHERE id = :id";
		$selectPrepa = self::$bdd -> prepare($sql);
		$result = $selectPrepa -> execute(array('id' => $idSondage));
		return ($result) ? true : false;
	}

	// Insertion d'un vote pour un sondage
	function insertAVote($idSondage, $idUtilisateur, $vote) {
		$selectPrepa = self::$bdd -> prepare("INSERT INTO avote (idSondage, idUtilisateur, vote) VALUES (:idSondage, :idUtilisateur, :vote)");
		$selectPrepa -> execute(array('idSondage' => $idSondage, 'idUtilisateur' => $idUtilisateur, 'vote' => $vote));
		return $selectPrepa->rowCount();
	}

	// Selection d'un vote
	function getAVote($idSondage, $idUtilisateur) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM avote WHERE idSondage = '$idSondage' AND idUtilisateur = '$idUtilisateur'");
		$selectPrepa -> execute();
		return $selectPrepa -> fetch();
	}
}
