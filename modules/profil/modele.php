<?php

class ModeleProfil extends Connexion {
	
	function __construct() {
	}

	// Selection d'un utilisateur avec id
	function getCompte($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM utilisateur WHERE id = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return $result;
	}

	// Selection de l'id de l'utilisateur
	function getId($email) {
		$selectPrepa = self::$bdd -> prepare("SELECT id FROM utilisateur WHERE email = '$email'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return $result[0];
	}

	// Selection des amis avec id
	function getAmis($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM etreamis WHERE idUtilisateur1 = '$id' OR idUtilisateur2 = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetchAll();
		return $result;
	}

	// Selection des publications
	function getPublications($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM publication WHERE utilisateur = '$id' ORDER BY date DESC");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetchAll();
		return $result;
	}

	// Selection de tous les publications d'un utilisateur
	function getPublicationsId($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT id FROM publication WHERE utilisateur = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetchAll();
		return $result;
	}

	// Selection un utilisateur avec id pour avoir Nom, Photo et Id
	function getNomPhotoEtId($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT nom, photoProfil, id FROM utilisateur WHERE id = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return $result;
	}

	// Mise à jour d'une publication
	function updatePublication($id, $message, $file, $locate) {
		$sql = "UPDATE publication SET message = :message, fichier = :file, localisation = :locate WHERE id = :id";
		$selectPrepa = self::$bdd -> prepare($sql);
		$result = $selectPrepa -> execute(array('message' => $message, 'file' => $file, 'locate' => $locate, 'id' => $id));
		return ($result) ? true : false;
	}

	// Insertion d'une identification
	function insertIdentification($idPublication, $idUtilisateurs) {
		foreach ($idUtilisateurs as $friend) {
			$sql = "INSERT INTO identification (idPublication, idIdentifie) VALUES (:idPublication, :idIdentifie)";
			$selectPrepa = self::$bdd -> prepare($sql);
			$selectPrepa -> execute(array('idPublication' => $idPublication, 'idIdentifie' => $friend));
		}
		$result = $selectPrepa -> rowCount();
		return $result != 0 ? true : false;
	}

	// Suppression des identification d'une publication
	function deleteIdentificationPublication($idPublication) {
		$sql = "DELETE FROM identification WHERE idPublication = '$idPublication'";
		$selectPrepa = self::$bdd -> prepare($sql);
		$result = $selectPrepa -> execute();
		return ($result) ? true : false;
	}

	// Suppression des identifications de l'utilisateur
	function deleteIdentificationUtilisateur($idUtilisateur) {
		$sql = "DELETE FROM identification WHERE idIdentifie = '$idUtilisateur'";
		$selectPrepa = self::$bdd -> prepare($sql);
		$result = $selectPrepa -> execute();
		return ($result) ? true : false;
	}

	// Suppression d'une publication
	function deletePublication($idPublication) {
		$sql = "DELETE FROM publication WHERE id = '$idPublication'";
		$selectPrepa = self::$bdd -> prepare($sql);
		$result = $selectPrepa -> execute();
		return ($result) ? true : false;
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

	// Verification de l'existance du compte
	function verifExist($email) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM utilisateur WHERE email = '$email'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return ($result) ? true : false;
	}

	// Mise à jour du nom, email, date de naissance ou photo de profil
	function update($compte, $name, $email, $birthday, $file) {
		$sql = "UPDATE utilisateur SET nom = :name, email = :email, dateNaissance = :birthday, photoProfil = :file WHERE id = :id";
		$selectPrepa = self::$bdd -> prepare($sql);
		$result = $selectPrepa -> execute(array('name' => $name, 'email' => $email, 'birthday' => $birthday, 'id' => $compte[0], 'file' => $file));
		return ($result) ? true : false;
	}

	// Suppression du compte
	function deleteCompte($id) {
		$sql = "DELETE FROM utilisateur WHERE id = '$id'";
		$selectPrepa = self::$bdd -> prepare($sql);
		$result = $selectPrepa -> execute();

		$sql2 = "DELETE FROM etreamis WHERE idUtilisateur1 = '$id' OR idUtilisateur2 = '$id'";
		$selectPrepa2 = self::$bdd -> prepare($sql2);
		$result2 = $selectPrepa2 -> execute();

		$sql3 = "DELETE FROM demandeami WHERE envoyeur = '$id' OR receveur = '$id'";
		$selectPrepa3 = self::$bdd -> prepare($sql3);
		$result3 = $selectPrepa3 -> execute();

		$sql4 = "DELETE FROM signalement WHERE signaleur = '$id' OR signale = '$id'";
		$selectPrepa4 = self::$bdd -> prepare($sql4);
		$result4 = $selectPrepa4 -> execute();

		$sql5 = "DELETE FROM bloquer WHERE bloqueur = '$id' OR bloque = '$id'";
		$selectPrepa5 = self::$bdd -> prepare($sql5);
		$result5 = $selectPrepa5 -> execute();

		$sql6 = "DELETE FROM commentaire WHERE idUtilisateur = '$id'";
		$selectPrepa6 = self::$bdd -> prepare($sql6);
		$result6 = $selectPrepa6 -> execute();

		return ($result && $result2 && $result3 && $result4 && $result5 && $result6) ? true : false;
	}

	// Verification du mot de passe
	function verifMdp($id, $password) {
		$selectPrepa = self::$bdd -> prepare("SELECT motDePasse FROM utilisateur WHERE id='$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return (password_verify($password, $result['motDePasse'])) ? true : false;
	}

	// Mise à jour du mot de passe
	function updateMdp($id, $password) {
		$hashPwd = crypt($password, '$1$somethin$');
		$sql = "UPDATE utilisateur SET motDePasse = :hashPwd WHERE id = :id";
		$selectPrepa = self::$bdd -> prepare($sql);
		$result = $selectPrepa -> execute(array('hashPwd' => $hashPwd, 'id' => $id));
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
