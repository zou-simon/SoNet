<?php

class ModeleMessages extends Connexion {
	
	function __construct() {
	}

	// Suppression un chat privé
	function deleteChatPrive($idChatPrive) {
		$selectPrepa1 = self::$bdd -> prepare("DELETE FROM appartientchat WHERE idChat = '$idChatPrive'");
		$selectPrepa1 -> execute();
		$selectPrepa2 = self::$bdd -> prepare("DELETE FROM chatprive WHERE id = '$idChatPrive'");
		$selectPrepa2 -> execute();
		$selectPrepa3 = self::$bdd -> prepare("DELETE FROM message WHERE idChat = '$idChatPrive'");
		$selectPrepa3 -> execute();

		return $selectPrepa1 -> rowCount() + $selectPrepa2 -> rowCount() + $selectPrepa3 -> rowCount();
	}

	// Insertion d'un chat privé
	function insertChatPrive($listeUtilisateurs, $nom, $me, $utilisateurSeul) {
		if(count($listeUtilisateurs) == 1) {
			$selectPrepa = self::$bdd -> prepare("INSERT INTO chatprive (nom, photo) VALUES (:nom, :photo)");
			$selectPrepa -> execute(array('nom' => $nom, 'photo' => $utilisateurSeul[1]));
		}
		else {
			$selectPrepa = self::$bdd -> prepare("INSERT INTO chatprive (nom, photo) VALUES (:nom, :photo)");
			$selectPrepa -> execute(array('nom' => $nom, 'photo' => 'img/chatprive.png'));
		}

		$idChatPrive = self::$bdd -> lastInsertId();

		if($selectPrepa->rowCount() > 0) {
			$selectPrepa = self::$bdd -> prepare("INSERT INTO appartientchat VALUES (:idChatPrive, :me)");
			$selectPrepa -> execute(array('idChatPrive' => $idChatPrive, 'me' => $me));
			foreach($listeUtilisateurs as $utilisateur) {
				$selectPrepa = self::$bdd -> prepare("INSERT INTO appartientchat VALUES (:idChatPrive, :utilisateur)");
				$selectPrepa -> execute(array('idChatPrive' => $idChatPrive, 'utilisateur' => $utilisateur));
			}
		}
	}

	// Mise a jour du nom d'un chat privé
	function updateNom($idChatPrive, $nouveauNom) {
		$selectPrepa = self::$bdd -> prepare("UPDATE chatprive SET nom = :nouveauNom WHERE id = :idChatPrive");
		$selectPrepa -> execute(array('nouveauNom' => $nouveauNom, 'idChatPrive' => $idChatPrive));

		return $selectPrepa -> rowCount();
	}

	// Verifie si un chat existe avec lui dedans
	function verifChatExiste($id, $user) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM appartientchat WHERE idChat = '$id' AND  idUtilisateur = '$user'");
		$selectPrepa -> execute();

		return $selectPrepa -> rowCount();
	}

	// Compte participants au chat privé
	function countParticipants($idChatPrive) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM appartientchat WHERE idChat = '$idChatPrive'");
		$selectPrepa -> execute();

		return $selectPrepa -> rowCount();
	}

	// Selection les chat privés
	function getChatPrives($utilisateur) {
		$selectPrepa = self::$bdd -> prepare("SELECT idChat FROM appartientchat WHERE idUtilisateur = '$utilisateur'");
		$selectPrepa -> execute();

		return $selectPrepa -> fetchAll();
	}

	// Selection les utilisateurs participant a un chat prive precis
	function getParticipants($idChatPrive) {
		$selectPrepa = self::$bdd -> prepare("SELECT idUtilisateur FROM appartientchat WHERE idChat = '$idChatPrive'");
		$selectPrepa -> execute();

		return $selectPrepa -> fetchAll();
	}

	// Selection l'utilisateur du chat privé (pas nous)
	function getUserChatPrive($id, $utilisateur) {
		$selectPrepa = self::$bdd -> prepare("SELECT idUtilisateur FROM appartientchat WHERE idChat = '$id' AND idUtilisateur <> '$utilisateur'");
		$selectPrepa -> execute();

		return $selectPrepa -> fetchColumn();
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

	// Insert un message
	function insertMessage($utilisateur, $contenu, $date, $idChat) {
		$selectPrepa = self::$bdd -> prepare("INSERT INTO message (contenu, date, idEnvoyeur, idChat) VALUES (:contenu, :date, :utilisateur, :chatprive)");
		$selectPrepa -> execute(array('contenu' => $contenu, 'date' => $date, 'utilisateur' => $utilisateur, 'chatprive' => $idChat));

		return $selectPrepa->rowCount();
	}

	// Selection un utilisateur avec id pour avoir Nom, Photo et Id
	function getNomPhotoEtId($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT nom, photoProfil, id FROM utilisateur WHERE id = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return $result;
	}

	// Selection les messages d'un chat privé
	function getMessages($idChatPrive) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM message WHERE idChat = '$idChatPrive' ORDER BY date ASC");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetchAll();
		return $result;
	}

	// Selection le message le plus récent d'un chat privé
	function getLastMessage($chat) {
		$selectPrepa = self::$bdd -> prepare("SELECT contenu, date FROM message WHERE idChat = '$chat' AND date = (SELECT MAX(date) FROM message WHERE idChat = '$chat')");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return $result;
	}

	// Selection nom et photo d'un chat prive
	function getNomPhotoChatPrive($idChatPrive) {
		$selectPrepa = self::$bdd -> prepare("SELECT id, nom, photo FROM chatprive WHERE id = '$idChatPrive'");
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

	// Selection d'un utilisateur avec id
	function getCompte($id) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM utilisateur WHERE id = '$id'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return $result;
	}
}	
