<?php

class VueMessages {

	function __construct() {
	}

	// Affichage de la page messages
	function afficheMessages($content, $column2, $listeAmis, $alert) {
		echo '<div class="row m-0 flex-lg-row d-flex flex-column-reverse">

		<!-- Navigation -->
		<div class="col-lg-1 border-top" id="nav-bottom">

		<a href="?module=accueil" class="d-none d-lg-block" id="logo">
			<img src="img/SoNet_logo.png" alt="SoNet_logo">
		</a>

		<ul class="nav flex-lg-column justify-content-around py-3 py-lg-0">

			<li class="nav-item">
			<a class="nav-link p-0 my-lg-5" href="?module=accueil" title="Accueil">
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
				class="bi bi-house" viewBox="0 0 16 16">
				<path fill-rule="evenodd"
					d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
				<path fill-rule="evenodd"
					d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
				</svg>
			</a>
			</li>

			<li class="nav-item mt-lg-9">
			<a class="nav-link p-0 my-lg-5 actived" href="?module=messages" title="Messages">
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
				class="bi bi-chat" viewBox="0 0 16 16">
				<path
					d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
				</svg>
			</a>
			</li>

			<li class="nav-item mt-lg-9">
			<a class="nav-link p-0 my-lg-5" href="?module=amis" title="Amis">
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
				class="bi bi-people" viewBox="0 0 16 16">
				<path
					d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
				</svg>
			</a>
			</li>

			<li class="nav-item mt-lg-9">
			<a class="nav-link p-0 my-lg-5" href="?module=profil" title="Profil">
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
				<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
				</svg>
			</a>
			</li>
		</ul>
		</div>

		<!-- Colonne principale -->
		<div class="col-lg-4 border-left border-right px-4 vh-100" style="overflow-y: auto;">

			<div class="pt-4">

				<div class="d-flex justify-content-between">

					<h1>Messages</h1>

					<button type="button" class="bg-transparent border-0" data-toggle="modal" data-target="#modalChatPrive">
						<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
							class="bi bi-plus-square" viewBox="0 0 16 16">
							<path
								d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
							<path
								d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
						</svg>
					</button>

				</div>

				<input id="input-chat" class="form-control" type="text" placeholder="Rechercher...">
				' . $alert . '
			</div>

			<div class="pt-4 mb-5">

				<ul class="list-group" id="liste-chat">
					' . $content . '
				</ul>

				<script>
					$(document).ready(function() {
						$("#liste-chat").children("li").sort(function(a, b) { 
							var A = $(a).find(".nom-chat").text().toUpperCase();
							var B = $(b).find(".nom-chat").text().toUpperCase();
							return (A < B) ? -1 : (A > B) ? 1 : 0; 
						}).appendTo("#liste-chat");
					});

					$("#input-chat").on("keyup", function() {
						var value = $(this).val().toLowerCase().trim();
						$("#liste-chat li").filter(function() {
							$(this).toggle($(this).find(".nom-chat").text().toLowerCase().indexOf(value) > -1);
						});
					});
				</script>

			</div>
		</div>

		<div class="modal fade" id="modalChatPrive" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Créer chat privé</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="?module=messages&action=creer" method="post">
							<input maxlength=32 type="text" class="form-control mb-2" name="name" placeholder="Entrez le nom du chat privé">
							<p>Participants<br></p>
							<div style="overflow-y: auto; max-height: 500px;">
								' . $listeAmis . '
							</div>
							<button type="submit" class="btn btn-secondary mt-2">Créer</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Affichage -->
		<div class="col-lg-7" style="overflow-y: auto;">
		
		' . $column2 . '

		</div>
	</div>';
	}

	// Affichage d'un chat privé
	function chatPrive($chatPrive, $utilisateur, $alias, $lastMessage, $nombreParticipants) {
		if($nombreParticipants == 2) {
			if($chatPrive[1] == '') {
				if($alias == '')
					$nom = $utilisateur[0] . '<span class="badge font-weight-normal text-secondary p-0" style="font-size:16px;">#' . $utilisateur[2] . '</span>';
				else
					$nom = '<i>' . $alias . '</i><span class="badge font-weight-normal text-secondary p-0" style="font-size:16px;">#' . $utilisateur[2] . '</span>';
			}
			else {
				if($alias == '')
					$nom = $chatPrive[1] . ' (<span class="text-secondary">' . $utilisateur[0] . '</span>)';
				else
					$nom = $chatPrive[1] . ' (<i class="text-secondary">' . $alias . '</i>)';
			}
		}
		else {
			$nombreParticipants-=2;
			if($chatPrive[1] == '') {
				$nom = $utilisateur[0] . ' et ' . $nombreParticipants . ' autre(s) personne(s)';
			}
			else {
				if($alias == '')
					$nom = $chatPrive[1] . ' (<span class="text-secondary">' . $utilisateur[0] . ' et ' . $nombreParticipants . ' autre(s) personne(s)</span>)';
				else
					$nom = $chatPrive[1] . ' (<i class="text-secondary">' . $alias . ' et ' . $nombreParticipants . ' autre(s) personne(s)</i>)';
			}
		}

		$date = ($lastMessage[1] == '') ? '' : date_format(date_create($lastMessage[1]), 'd/m/Y, H:i');

		if(strlen($lastMessage[0]) > 30) {
			$lastMessage[0] = substr($lastMessage[0], 0, 24) . '...';
		}


		$rand = rand();
		return '<li class="list-group-item p-0 border-0">
				<div class="border rounded p-3 mb-3 row m-0">

					<img src="' . $chatPrive[2] . '" width="40" height="40" class="mr-3 mb-3" alt="Photo du chat privé">

					<div class="col p-0">

						<div class="d-flex justify-content-between">
							<a href="?module=messages&action=chatprive&id=' . $chatPrive[0] . '"><h5 class="mb-0 d-inline text-break nom-chat">' . $nom . '</h5></a>
							
							<button class="bg-transparent border-0 float-right" type="button" id="dropdownMenuButton' . $chatPrive[0] . $rand . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
									<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
								</svg>
							</button>

							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton' . $chatPrive[0] . $rand . '">
								<button type="button" class="bg-transparent border-0 py-1 px-4 w-100 text-left" data-toggle="modal" data-target="#modalRename' . $chatPrive[0] . '">Renommer</button>
								<a class="dropdown-item text-danger" href="?module=messages&action=supprimer&delete=' . $chatPrive[0] . '">Supprimer</a>
							</div>
							
							<div class="modal fade" id="modalRename' . $chatPrive[0] . '" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Renommer</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p class="text-secondary">Renommer le chat privé.<br>(Laissez vide pour supprimer le renommage)</p>
											<form action="?module=messages&action=renommer&rename=' . $chatPrive[0] . '" method="post">
												<div class="form-group">
													<label for="name">Nom</label>
													<input maxlength=32 type="text" class="form-control" name="name">
												</div>
												<button type="submit" class="btn btn-secondary">Enregistrer</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div>
							<p class="mb-0 d-inline text-break">' . $lastMessage[0] . '</p>
							<span class="text-secondary float-right">' . $date . '</span>
						</div>
					</div>
				</div>
			</li>';
	}
	
	// Affichage chat privé avec les messages
	function afficheChatPriveMessages($chatPrive, $utilisateur, $alias, $nombreParticipants, $messages, $listeParticipants) {
		if($nombreParticipants == 2) {
			if($chatPrive[1] == '') {
				if($alias == '')
					$nom = $utilisateur[0] . '<span class="badge font-weight-normal text-secondary p-0">#' . $utilisateur[2] . '</span>';
				else
					$nom = '<i>' . $alias . '</i><span class="badge font-weight-normal text-secondary p-0">#' . $utilisateur[2] . '</span>';
			}
			else {
				if($alias == '')
					$nom = $chatPrive[1] . ' (<span class="text-secondary">' . $utilisateur[0] . '</span>)';
				else
					$nom = $chatPrive[1] . ' (<i class="text-secondary">' . $alias . '</i>)';
			}
		}
		else {
			$nombreParticipants-=2;
			if($chatPrive[1] == '') {
				$nom = $utilisateur[0] . ' et ' . $nombreParticipants . ' autre(s) personne(s)';
			}
			else {
				if($alias == '')
					$nom = $chatPrive[1] . ' (<span class="text-secondary">' . $utilisateur[0] . ' et ' . $nombreParticipants . ' autre(s) personne(s)</span>)';
				else
					$nom = $chatPrive[1] . ' (<i class="text-secondary">' . $alias . ' et ' . $nombreParticipants . ' autre(s) personne(s)</i>)';
			}
		}
		$rand = rand();
		return '<div class="px-4 vh-100">
			<div class="d-flex justify-content-between border-bottom">

				<div class="d-flex justify-content-start py-4">

					<a class="mr-3 d-lg-none d-flex" href="?module=messages" style="align-items: center;">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
						</svg>
					</a>

					<div class="d-sm-flex">
						<img src="' . $chatPrive[2] . '" width="40" height="40" class="mr-3 mb-3" alt="Photo du chat privé">
						<h2 class="mb-0 mr-2 text-break">' . $nom . '</h2>
					</div>
				</div>

				<button class="bg-transparent border-0" type="button" id="dropdownMenuButton' . $chatPrive[0] . $rand . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
						<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
					</svg>
				</button>

				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton' . $chatPrive[0] . $rand . '">
					<button type="button" class="bg-transparent border-0 py-1 px-4 w-100 text-left" data-toggle="modal" data-target="#modalParticipants">Participants</button>
					<button type="button" class="bg-transparent border-0 py-1 px-4 w-100 text-left" data-toggle="modal" data-target="#modalRename' . $chatPrive[0] . '">Renommer</button>
					<a class="dropdown-item text-danger" href="?module=messages&action=supprimer&delete=' . $chatPrive[0] . '">Supprimer</a>
				</div>
				
				<div class="modal fade" id="modalRename' . $chatPrive[0] . '" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Renommer</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p class="text-secondary">Renommer le chat privé.<br>(Laissez vide pour supprimer le renommage)</p>
								<form action="?module=messages&action=renommer&rename=' . $chatPrive[0] . '" method="post">
									<div class="form-group">
										<label for="name">Nom</label>
										<input maxlength=32 type="text" class="form-control" name="name">
									</div>
									<button type="submit" class="btn btn-secondary">Enregistrer</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="modalParticipants" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Liste des participants</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>Participants<br></p>
								<div style="overflow-y: auto; max-height: 500px;">
									' . $listeParticipants . '
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="espace-messages d-flex align-items-start flex-column" style="overflow-y: scroll; height : calc(100% - 200px);">
				' . $messages . '
			</div>

			<script>
				$(".espace-messages").scrollTop($(".espace-messages")[0].scrollHeight);
			</script>

			<form action="?module=messages&action=envoyer_message&id=' . $chatPrive[0] . '" method="post" class="input-group">
				<textarea class="form-control" name="message" placeholder="Envoyez un message ..." style="resize:none; min-height: 62px;" required></textarea>
				<div class="input-group-append">
					<button type="submit" class="btn btn-secondary">Envoyez</button>
				</div>
			</form>
		</div>';
	}

	// Affichage d'un message
	function message($message, $utilisateur, $me, $key) {
		$style = '';
		$nom = $utilisateur[0];
		if($key == 0) {
			if($utilisateur[2] == $me) {
				$style = 'ml-auto mt-auto';
				$nom = 'Moi';
			}
			else 
				$style = 'mt-auto';
		} else {
			if($utilisateur[2] == $me) {
				$style = 'ml-auto';
				$nom = 'Moi';
			}
		}

		$date = date_format(date_create($message[2]), 'd/m/Y, H:i');
		return '<div class="border rounded p-3 m-0 my-2 ' . $style . '" style="max-width: 48%;">
			<div>
				<b>' . $nom . '</b> : ' . $message[1] . '
			</div>
			<span class="text-secondary" style="font-size: 13px;">' . $date . '</span>
		</div>';
	}

	// Affichage des amis pour un chat privé
	function ami($utilisateur, $alias) {
		if (strcmp($alias, $utilisateur[0]) == 0)
			$name = $alias;
		else
			$name = "<i>" . $alias . "</i>";
		$rand = rand();
		$idAmi = $utilisateur[2];
		return '<div class="form-check p-0">
				<input class="m-2" type="checkbox" class="chb" name="friends[]" value="' . $idAmi . '">
				<label class="form-check-label" for="check' . $idAmi . $rand . '"><img src="' . $utilisateur[1] . '?' . rand() . '" alt="Photo de profil" class="mr-1" style="width: 30px; height: 30px;">' . $name . ' <i class="text-secondary">#' . $idAmi . '</i></label>
			</div>';
	}

	// Affichage d'un participant pour un chat privé
	function participant($utilisateur, $alias) {
		$nom = ($alias != '' ) ? "<i>" . $alias . "</i>" : $utilisateur[0];
		return '<div class="form-check p-0">
				<img src="' . $utilisateur[1] . '?' . rand() . '" alt="Photo de profil" class="mr-1" style="width: 30px; height: 30px;">' . $nom . ' <i class="text-secondary">#' . $utilisateur[2] . '</i></label>
			</div>';
	}

	// Affichage d'un message pour aucun ami
	function pasAmi() {
		return '<div class="alert alert-secondary mb-0" role="alert">
				Vous n\'avez pas encore d\'ami.
			</div>';
	}

	// Affichage d'un message pour aucun chat privé
	function pasChatPrive() {
		return '<div class="alert alert-secondary mb-0" role="alert">
				Vous n\'avez pas encore de chat privé.
			</div>';
	}

	// Affichage d'un message pour un chat privé deja existant avec un ami
	function chatPriveDejaExistant($utilisateur) {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Vous avez déjà un chat privé avec <b>' . $utilisateur[0] . '</b>#' . $utilisateur[2] . '
			</div>';
	}

	// Affichage d'un message de confirmation pour la suppression d'un chat privé
	function confirmDeleteChatPrive($utilisateur, $nombreParticipants) {
		if($nombreParticipants == 2)
			$phrase = 'Le chat privé avec <b>' . $utilisateur[0] . '</b>#' . $utilisateur[2] . ' a été supprimé.';
		else
			$phrase = 'Le chat privé avec <b>' . $utilisateur[0] . '</b> et ' . ($nombreParticipants-2) . ' autre(s) personne(s) a été supprimé.';
		return '<div class="alert alert-success mt-3 mb-0" role="alert">
				' . $phrase . '
			</div>';
	}

	// Affichage d'un message d'erreur pour la suppression d'un chat privé
	function errorDeleteChatPrive() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				La suppression n\'a pas été possible.
			</div>';
	}

	// Affiche d'un message d'erreur pour messages
	function errorMessages() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Vous n\'avez pas l\'autorisation.
			</div>';
	}

	// Affichage d'un message pour la confirmation de renommage
	function confirmRename($nomChatPrive) {
		return '<div class="alert alert-success mt-3 mb-0" role="alert">
				Le chat privé a été renommé en <i>' . $nomChatPrive . '</i>.
			</div>';
	}

	// Affichage d'un message pour une erreur de renommage
	function errorRename() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				La renommage n\'a pas été possible.
			</div>';
	}

	// Affiche message d'echec envoie de message
	function echecEnvoie() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Échec lors de l\'envoi du message.
			</div>';
	}

	// Affichage page - Pas d'action
	function pasAction() {
		echo '<div class="container p-5" style="min-width: 320px;">

			<div class="py-5 px-md-5" style="max-width: 500px;" action="?module=compte&action=connexion" method="post">

				<img src="img/SoNet_logo.png" alt="SoNet_logo" width="75" height="75" class="my-3">

				<h1 class="mb-3">Action incorrecte !</h1>
				<p class="text-secondary">Revenir à la page précédente. <a href="javascript:history.back();" class="text-dark">Cliquez ici</a></p>

				<div class="mt-5">
					<a class="p-1" href="?module=accueil" title="Accueil">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
							class="bi bi-house" viewBox="0 0 16 16">
							<path fill-rule="evenodd"
								d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
							<path fill-rule="evenodd"
								d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
						</svg>
						Accueil
					</a>
					<a class="p-1" href="?module=messages" title="Messages">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
							class="bi bi-chat" viewBox="0 0 16 16">
							<path
								d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
						</svg>
						Messages
					</a>
					
					<a class="p-1" href="?module=amis" title="Amis">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
							class="bi bi-people" viewBox="0 0 16 16">
							<path
								d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
						</svg>
						Amis
					</a>
					<a class="p-1" href="?module=profil" title="Profil">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
							<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
						</svg>
						Profil
					</a>
				</div>
			</div>
		</div>';
	}
}
