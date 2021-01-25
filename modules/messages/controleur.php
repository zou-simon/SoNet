<?php
require 'modele.php';
require 'vue.php';

class ContMessages {

	private $modele, $vue;
	
	function __construct() {
		$this -> modele = new ModeleMessages();
		$this -> vue = new VueMessages();
	}

	// Verifie l'existence d'un compte
	function verifExist($id) {
		return $this -> modele -> getCompte($id);
	}

	// Retoune la liste des chats privés
	function listeChatsPrives() {
		$listeChatsPrives = $this -> modele -> getChatPrives($_SESSION['id']);
		$content = '';
		foreach($listeChatsPrives as $chatPrive) {
			$content.=$this -> vue -> chatPrive($this -> modele -> getNomPhotoChatPrive($chatPrive[0]), $this -> modele -> getNomPhotoEtId($this -> modele -> getUserChatPrive($chatPrive[0], $_SESSION['id'])), $this -> modele -> getRename($_SESSION['id'], $this -> modele -> getUserChatPrive($chatPrive[0], $_SESSION['id'])), $this -> modele -> getLastMessage($chatPrive[0]), $this -> modele -> countParticipants($chatPrive[0]));
		}
		return $content == '' ? $this -> vue -> pasChatPrive() : $content;
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

	// Affichage messages
	function messages($alert) {
		$this -> vue -> afficheMessages($this -> listeChatsPrives(), '', $this -> listeAmis(), $alert);
	}

	// Affichage messages + chat privé avec les messages
	function chatPriveEtMessages($alert, $idChatPrive) {
		$column2 = $this -> vue -> afficheChatPriveMessages($this -> modele -> getNomPhotoChatPrive($idChatPrive), $this -> modele -> getNomPhotoEtId($this -> modele -> getUserChatPrive($idChatPrive, $_SESSION['id'])), $this -> modele -> getRename($_SESSION['id'], $this -> modele -> getUserChatPrive($idChatPrive, $_SESSION['id'])), $this -> modele -> countParticipants($idChatPrive), $this -> listeMessages(), $this -> listeParticipants($idChatPrive));
		$this -> vue -> afficheMessages($this -> listeChatsPrives(), $column2, $this -> listeAmis(), $alert);
	}

	// Retourne la liste des participants
	function listeParticipants($idChat) {
		$listeParticipants = $this -> modele -> getParticipants($idChat);
		$content = '';
		foreach($listeParticipants as $participant) {
			$content .= $this -> vue -> participant($this -> modele -> getNomPhotoEtId($participant[0]), $this -> modele -> getRename($_SESSION['id'], $participant[0]));
		}

		return $content;
	}

	// Retoune la liste des messages d'un chat privé
	function listeMessages() {
		$listeMessages = $this -> modele -> getMessages($_GET['id']);
		$content = '';
		foreach($listeMessages as $key => $message) {
				$content .= $this -> vue -> message($message, $this -> modele -> getNomPhotoEtId($message[3]), $_SESSION['id'], $key);
		}
		return $content;
	}

	// Supprime un chat privé
	function supprimer() {
		if(isset($_GET['delete']) && $this -> modele -> verifChatExiste($_GET['delete'], $_SESSION['id'])) {
			$utilisateur = $this -> modele -> getUserChatPrive($_GET['delete'], $_SESSION['id']);
			$nombreParticipants = $this -> modele -> countParticipants($_GET['delete']);
			if($this -> modele -> deleteChatPrive($_GET['delete']) > 1)
				$this -> messages($this -> vue -> confirmDeleteChatPrive($this -> modele -> getNomPhotoEtId($utilisateur), $nombreParticipants));
			else
				$this -> messages($this -> vue -> errorDeleteChatPrive());
		}
		else
			$this -> messages($this -> vue -> errorDeleteChatPrive());
	}

	// Créer un chat privé
	function creerChatPrive() {
		$peutEtreCree = true;
		if(isset($_POST['friends'])) {
			if(count($_POST['friends']) == 1) {
				$listeChatsPrives = $this -> modele -> getChatPrives($_SESSION['id']);
				foreach($listeChatsPrives as $chatPrive) {
					if($this -> modele -> countParticipants($chatPrive[0]) == 2) {
						if($this -> modele -> getUserChatPrive($chatPrive[0], $_SESSION['id']) == $_POST['friends'][0]) {
							$this -> messages($this -> vue -> chatPriveDejaExistant($this -> modele -> getNomPhotoEtId($_POST['friends'][0])));
							$peutEtreCree = false;
						}
					}
				}
			}
			if($peutEtreCree)
				$this -> modele -> insertChatPrive($_POST['friends'], $_POST['name'], $_SESSION['id'], $this -> modele -> getNomPhotoEtId($_POST['friends'][0]));
		}
		$this -> messages('');
	}

	// Renommer un chat prive
	function renommer() {
		if (isset($_GET['rename']) && isset($_POST['name'])) {
			if($this -> modele -> updateNom($_GET['rename'], $_POST['name']) == 1)
				$this -> messages($this -> vue -> confirmRename($_POST['name']));
			else
				$this -> messages($this -> vue -> errorRename());
		}
		else
			$this -> messages($this -> vue -> errorMessages());
	}

	// Envoie un message
	function envoyerMessage() {
		if(isset($_POST['message']) && isset($_GET['id'])) {
			if($this -> modele -> insertMessage($_SESSION['id'], $_POST['message'], date("Y-m-d H:i:s"), $_GET['id']) == 1)
				$this -> chatPriveEtMessages('', $_GET['id']);
			else
				$this -> messages($this -> vue -> echecEnvoie());
		}
		else
			$this -> messages($this -> vue -> errorMessages());
	}

	// Affichage d'un chat privé et de ces messages
	function chatPrive() {
		if(isset($_GET['id']) && $this -> modele -> verifChatExiste($_GET['id'], $_SESSION['id']))
			$this -> chatPriveEtMessages('', $_GET['id']);
		else
			$this -> messages($this -> vue -> errorMessages());
	}

	// Affichage erreur action inexistant
	function pasAction() {
		$this -> vue -> pasAction();
	}
}
?>