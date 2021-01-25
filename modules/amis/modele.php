<?php

class ModeleAmis extends Connexion {
	
	function __construct() {
	}

	// Ajouter un ami
	function insertAmi($id1, $id2) {
		$selectPrepa = self::$bdd -> prepare("INSERT INTO etreamis (idUtilisateur1, idUtilisateur2) VALUES (:id1, :id2)");
		$selectPrepa -> execute(array('id1' => $id1, 'id2' => $id2));

		return $selectPrepa->rowCount() != 0 ? $selectPrepa->rowCount() + $this -> deleteDemandeAmi($id1, $id2) : 0;
	}

	// Suppression un ami
	function deleteAmi($id, $idDeleted) {
		$selectPrepa = self::$bdd -> prepare("DELETE FROM etreamis WHERE (idUtilisateur1 = '$id' AND idUtilisateur2 = '$idDeleted') OR (idUtilisateur2 = '$id' AND idUtilisateur1 = '$idDeleted')");
		$selectPrepa -> execute();
		return $selectPrepa->rowCount();
	}

	// Bloque un utilisateur
	function blockUser($id, $idBlocked) {
		$selectPrepa = self::$bdd -> prepare("INSERT INTO bloquer (bloqueur, bloque) VALUES (:id, :idBlocked)");
		$selectPrepa -> execute(array('id' => $id, 'idBlocked' => $idBlocked));

		return $selectPrepa->rowCount() != 0 ? $selectPrepa->rowCount() + $this -> deleteAmi($id, $idBlocked) : 0;
	}

	// Debloque un utilisateur
	function unblockUser($id, $idBlocked) {
		$selectPrepa = self::$bdd -> prepare("DELETE FROM bloquer WHERE bloqueur = '$id' AND bloque = '$idBlocked'");
		$selectPrepa -> execute();

		return $selectPrepa->rowCount();
	}

	// Mise à jour du nom d'un ami
	function updateAlias($id1, $id2, $alias) {
		$selectPrepa1 = self::$bdd -> prepare("UPDATE etreamis SET renameUser1 = :alias WHERE idUtilisateur1 = :id1 AND idUtilisateur2 = :id2");
		$selectPrepa2 = self::$bdd -> prepare("UPDATE etreamis SET renameUser2 = :alias WHERE idUtilisateur1 = :id2 AND idUtilisateur2 = :id1");
		$selectPrepa1 -> execute(array('alias' => $alias, 'id1' => $id1, 'id2' => $id2));
		$selectPrepa2 -> execute(array('alias' => $alias, 'id1' => $id1, 'id2' => $id2));
		return $selectPrepa1 -> rowCount() + $selectPrepa2 -> rowCount();
	}

	// Verifie si l'email est utilisée par un utilisateur
	function mailExiste($email) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM utilisateur WHERE email = :email");
		$selectPrepa -> execute(array('email' => $email));
		$result = $selectPrepa -> fetch();
		return ($result) ? true : false;
	}

	// Verifie si 2 utilisateurs sont deja ami
	function sontAmis($id1, $id2) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM etreamis WHERE (idUtilisateur1 = '$id1' AND idUtilisateur2 = '$id2') OR (idUtilisateur1 = '$id2' AND idUtilisateur2 = '$id1')");
		$selectPrepa -> execute();
		$result = $selectPrepa -> rowCount();
		return ($result) ? true : false;
	}

	// Demande reciproque
	function demandeReciproque($id1, $id2) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM demandeami WHERE (envoyeur = '$id2' AND receveur = '$id1')");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return ($result) ? true : false;
	}

	// Insertion d'un signalement
	function insertSignalement($raison, $user ,$userReported) {
		$selectPrepa = self::$bdd -> prepare("INSERT INTO signalement (raison, signaleur, signale) VALUES (:raison, :user, :userReported)");
		$selectPrepa -> execute(array('raison' => $raison, 'user' => $user, 'userReported' => $userReported));
		return $selectPrepa -> rowCount();
	}

	// Insertion d'une demande d'ami
	function insertionDemandeAmi($envoyeur, $receveur) {
		$selectPrepa = self::$bdd -> prepare("INSERT INTO demandeami (envoyeur, receveur) VALUES (:envoyeur, :receveur)");
		$selectPrepa -> execute(array('envoyeur' => $envoyeur, 'receveur' => $receveur));
		return $selectPrepa -> rowCount();
	}

	// Supprime une demande d'ami
	function deleteDemandeAmi($id1, $id2) {
		$selectPrepa = self::$bdd -> prepare("DELETE FROM demandeami WHERE (envoyeur = '$id1' AND receveur = '$id2') OR (envoyeur = '$id2' AND receveur = '$id1')");
		$selectPrepa -> execute();
		return $selectPrepa -> rowCount();
	}

	// Verifie si la demande existe
	function verifDemande($id1, $id2) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM demandeami WHERE (envoyeur = '$id2' AND receveur = '$id1') OR (envoyeur = '$id1' AND receveur = '$id2')");
		$selectPrepa -> execute();
		return $selectPrepa -> rowCount();
	}

	// Compte le nombre de demande d'un utilisateur
	function compteDemande($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM demandeami WHERE receveur = '$id'");
		$selectPrepa -> execute();
		return $selectPrepa -> rowCount();
	}

	// Verifie si l'utilisateur l'a bloqué
	function verifBlock($idBloqueur, $idBloque) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM bloquer WHERE bloqueur = '$idBloqueur' AND bloque = '$idBloque'");
		$selectPrepa -> execute();
		return $selectPrepa -> rowCount();
	}

	// Selection un utilisateur avec id pour avoir Nom, Photo et Id
	function getNomPhotoEtId($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT nom, photoProfil, id FROM utilisateur WHERE id = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return $result;
	}

	// Selection des amis avec id
	function getAmis($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM etreamis WHERE idUtilisateur1 = '$id' OR idUtilisateur2 = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetchAll();
		return $result;
	}

	// Selection demandes d'ami recue
	function getDemandesAmiRecue($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT envoyeur FROM demandeami WHERE receveur = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetchAll();
		return $result;
	}

	// Selection demandes d'ami envoyée
	function getDemandesAmiEnvoyee($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT receveur FROM demandeami WHERE envoyeur = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetchAll();
		return $result;
	}

	// Selection utilisateurs bloqué
	function getUtilisateursBloques($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT bloque FROM bloquer WHERE bloqueur = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetchAll();
		return $result;
	}

	// Selection de l'id de l'utilisateur
	function getId($email) {
		$selectPrepa = self::$bdd -> prepare("SELECT id FROM utilisateur WHERE email = '$email'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return $result[0];
	}

	// Selection de nom de l'utilisateur
	function getIdNom($email) {
		$selectPrepa = self::$bdd -> prepare("SELECT id, nom FROM utilisateur WHERE email = '$email'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return $result;
	}

	// Selection publications
	function getPublications($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM publication WHERE utilisateur = '$id' ORDER BY date DESC");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetchAll();
		return $result;
	}

	// Selection d'un utilisateur avec id
	function getCompte($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM utilisateur WHERE id = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return $result;
	}

	// Selection d'un sondage
	function getSondage($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM sondage WHERE id = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return $result;
	}

	// Selection des identifications
	function getIdentification($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT idIdentifie FROM identification WHERE idPublication = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetchAll(PDO::FETCH_COLUMN, 0);
		return $result;
	}

	// Recupere le renommage d'un utilisateur
	function getRename($id1, $id2) {
		$selectPrepa = self::$bdd -> prepare("SELECT renameUser1 FROM etreamis WHERE idUtilisateur1 = '$id2' AND idUtilisateur2 = '$id1'");
		$selectPrepa -> execute();

		if($selectPrepa -> rowCount() == 0) {
			$selectPrepa = self::$bdd -> prepare("SELECT renameUser2 FROM etreamis WHERE idUtilisateur1 = '$id1' AND idUtilisateur2 = '$id2'");
			$selectPrepa -> execute();
		}

		return $selectPrepa -> rowCount() == 0 ? null : $selectPrepa -> fetchColumn();
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
