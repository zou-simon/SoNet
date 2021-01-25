<?php

class VueAmis {

	function __construct() {
	}

	// Affichage de la page amis
	function afficheAmis($content, $badge, $alert, $column2) {
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
						<a class="nav-link p-0 my-lg-5" href="?module=messages" title="Messages">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
								class="bi bi-chat" viewBox="0 0 16 16">
								<path
									d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
							</svg>
						</a>
					</li>

					<li class="nav-item mt-lg-9">
						<a class="nav-link p-0 my-lg-5 actived" href="?module=amis" title="Amis">
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

				<div>

					<div class="pt-4">

						<div class="d-flex justify-content-between">

							<h1>Amis</h1>

							<a class="bg-transparent border-0" href="?module=amis&action=ajout" style="line-height: 3; padding: 0 6px;">
								' . $badge . '
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
									class="bi bi-person-plus" viewBox="0 0 16 16">
									<path
										d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
									<path fill-rule="evenodd"
										d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
								</svg>
							</a>

						</div>

						<input id="input-name" class="form-control" type="text" placeholder="Rechercher...">
						' . $alert . '
					</div>

					<div class="pt-4" style="margin-bottom:100px;">
						<ul class="list-group" id="liste-amis">
						' . $content . '
						</ul>

						<script>
							$(document).ready(function() {
								$("#liste-amis").children("li").sort(function(a, b) { 
									var A = $(a).find(".nom").text().toUpperCase(); 
									var B = $(b).find(".nom").text().toUpperCase(); 
									return (A < B) ? -1 : (A > B) ? 1 : 0; 
								}).appendTo("#liste-amis");
							});

							$("#input-name").on("keyup", function() {
								var value = $(this).val().toLowerCase().trim();
								$("#liste-amis li").filter(function() {
									$(this).toggle($(this).find(".nom").text().toLowerCase().indexOf(value) > -1);
								});
							});
						</script>
					</div>
				</div>
			
			</div>

			<!-- Affichage -->
			<div class="col-lg-7" style="overflow-y: auto;">
			
			' . $column2 . '

			</div>
		</div>
		';
	}

	// Affichage d'un ami
	function ami($utilisateur, $alias) {
		$rename = (strcmp($alias, $utilisateur[0]) == 0) ? $alias : "<i>" . $alias . "</i>";
		$rand = rand();
		return '<li class="list-group-item p-0 border-0">
				<div class="border rounded p-3 mb-3 row m-0">

					<img src="' . $utilisateur[1] . '?' . rand() . '" width="40" height="40" class="mr-3" alt="portrait">

					<div class="col p-0 d-flex justify-content-between">
					
						<a href="?module=amis&action=profil&id=' . $utilisateur[2] . '">
						<div class="nom">
							<h5 class="mb-0 text-break mt-2 d-inline">' . $rename . '</h5><span class="badge font-weight-normal text-secondary p-0" style="font-size:16px;">#' . $utilisateur[2] . '</span>
						</div>
						</a>

						<div class="dropdown">
						
							<button class="bg-transparent border-0 float-right" type="button" id="dropdownMenuButton' . $utilisateur[0] . $rand . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
									<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
								</svg>
							</button>

							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton' . $utilisateur[0] . $rand . '">
								<a class="dropdown-item" href="?module=amis&action=profil&id='. $utilisateur[2] . '">Profil</a>
								<button type="button" class="bg-transparent border-0 py-1 px-4 w-100 text-left" data-toggle="modal" data-target="#modalRename' . $utilisateur[2] . '">Renommer</button>
								<a class="dropdown-item text-danger" href="?module=amis&action=bloquer&block='. $utilisateur[2] . '">Bloquer</a>
								<a class="dropdown-item text-danger" href="?module=amis&action=supprimer&delete=' . $utilisateur[2] . '">Supprimer</a>
								<button type="button" class="bg-transparent border-0 py-1 px-4 w-100 text-left" data-toggle="modal" data-target="#modalReport' . $utilisateur[2] . '">Signaler</button>
							</div>
						</div>
						
					</div>
				</div>
			</li>
			<div class="modal fade" id="modalRename' . $utilisateur[2] . '" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Renommer</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p class="text-secondary">Renommer votre ami ' . $utilisateur[0] . '#' . $utilisateur[2] . '. <br>(Laissez vide pour supprimer le renommage)</p>
							<form action="?module=amis&action=renommer&rename=' . $utilisateur[2] . '" method="post">
								<div class="form-group">
									<label for="name">Nom</label>
									<input maxlength=32 type="text" class="form-control" name="name" placeholder="' . $alias . '">
								</div>
								<button type="submit" class="btn btn-secondary">Enregistrer</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modalReport' . $utilisateur[2] . '" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Signaler</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p class="text-secondary">Signaler ' . $utilisateur[0] . '#' . $utilisateur[2] . '. <br></p>
							<form action="?module=amis&action=signaler&report=' . $utilisateur[2] . '" method="post">
								<div class="form-group">
									<label for="raison">Raison</label>
									<textarea class="form-control" name="raison" rows="3" placeholder="Saisissez la raison ici ..." style="min-height: 62px;" required></textarea>
								</div>
								<button type="submit" class="btn btn-secondary">Envoyer</button>
							</form>
						</div>
					</div>
				</div>
			</div>';
	}

	// Affichage du badge de notification de demande d'ami
	function badgeDemandeAmi($quantite) {
		return '<span class="badge badge-pill badge-danger">' . $quantite . '</span>';
	}

	// Affichage ajout ami
	function afficheAjoutAmi($content1, $content2, $alert) {
		return '<div class="px-4 vh-100">

			<div class="pt-4">

				<div class="d-flex justify-content-start">

					<a class="mr-3 d-lg-none d-flex" href="?module=amis" style="align-items: center;">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
						</svg>
					</a>

					<h2 class="mb-0">Ajouter un ami</h2>
					
				</div>

			</div>

			<div class="my-4">

				' . $alert . '

				<form class="mt-3" action="?module=amis&action=ajouter" method="post">
					<div class="form-group">
						<input class="form-control" type="email" name="add" id="email-demande" rows="3" placeholder="Saisissez l\'email de votre ami..." required>
					</div>
					<button type="submit" class="btn btn-secondary">Envoyer</button>
				</form>

			</div>

			<div class="border-top pt-4" style="padding-bottom: 100px;">

				<h5>Demande d\'ami</h5>

				<div class="mb-5">
					' . $content1 . '
				</div>

				<h5>Utilisateur bloqué</h5>

				<div class="mb-5">
					' . $content2 . '
				</div>
			</div>

		</div>';
	}

	// Affichage d'un message pour un suggestion d'ami 
	function vouloirAjouter($utilisateur) {
		return '<div class="alert alert-primary" role="alert">
			Ajoutez <b>' . $utilisateur[2] . '</b> en ami pour voir ces publications.
		</div>
		<script>
			$(document).ready(function() {
				$("#email-demande").val("' . $utilisateur[2] . '");
			});
		</script>';
	}

	// Affichage d'une demande d'ami recue
	function demandeAmiRecue($utilisateur) {
		return '<div class="border rounded p-3 mb-3 row m-0">

			<img src="' . $utilisateur[1] . '?' . rand() . '" width="40" height="40" class="mr-3" alt="portrait">

			<div class="col p-0 d-flex justify-content-between">
							
				<div>
					<h5 class="mb-0 text-break mt-2 d-inline">' . $utilisateur[0] . '</h5>
					<span class="badge font-weight-normal text-secondary p-0" style="font-size:16px;">#' . $utilisateur[2] . '</span>
				</div>
				<div>

					<a class="bg-transparent border-0 float-right ml-3" type="button" href="?module=amis&action=refuser_demande&id=' . $utilisateur[2] . '">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
							<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
						</svg>
					</a>
					<a class="bg-transparent border-0 float-right" type="button" href="?module=amis&action=accepter_demande&id=' . $utilisateur[2] . '">
						<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2 text-success" viewBox="0 0 16 16">
							<path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
						</svg>
					</a>
				</div>
				
			</div>
		</div>';
	}

	// Affichage d'une demande d'ami envoyée
	function demandeAmiEnvoyee($utilisateur) {
		return '<div class="border rounded p-3 mb-3 row m-0">

			<img src="' . $utilisateur[1] . '?' . rand() . '" width="40" height="40" class="mr-3" alt="portrait">

			<div class="col p-0 d-flex justify-content-between">
							
				<div>
					<h5 class="mb-0 text-break mt-2 d-inline">' . $utilisateur[0] . '</h5>
					<span class="badge font-weight-normal text-secondary p-0" style="font-size:16px;">#' . $utilisateur[2] . '</span>
				</div>
				<div>

					<a class="bg-transparent border-0 float-right ml-3" type="button" href="?module=amis&action=annuler_demande&id=' . $utilisateur[2] . '">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
							<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
						</svg>
					</a>
				</div>
				
			</div>
		</div>';
	}

	// Affichage d'un utilisateur bloqué
	function utilisateurBloque($utilisateur) {
		return '<div class="border rounded p-3 mb-3 row m-0">

			<img src="' . $utilisateur[1] . '?' . rand() . '" width="40" height="40" class="mr-3" alt="portrait">

			<div class="col p-0 d-flex justify-content-between">
							
				<div>
					<h5 class="mb-0 text-break mt-2 d-inline">' . $utilisateur[0] . '</h5>
					<span class="badge font-weight-normal text-secondary p-0" style="font-size:16px;">#' . $utilisateur[2] . '</span>
				</div>
				<div>

					<a class="bg-transparent border-0 float-right ml-3" type="button" href="?module=amis&action=debloquer&id=' . $utilisateur[2] . '">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
							<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
						</svg>
					</a>
				</div>
				
			</div>
		</div>';
	}

	// Affichage d'une publication
	function publication($publication, $content) {
		setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
		$date = strftime("%A %e %B %Y, %H:%M", strtotime($publication[2]));
		$rand = rand();
		return '<div class="border rounded p-3 m-0 mb-3 row" id="publication' . $publication[0] . '">

			<div class="col p-0">

				<h5 class="mb-0 d-inline text-break">' . $date . '</h5>
				<p class="text-break mb-2">' . $publication[1] . '</p>

				' . $content . '

				<button class="bg-transparent border-0 float-right mt-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
						<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
					</svg>
				</button>

				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<button type="button" class="bg-transparent border-0 py-1 px-4 w-100 text-left" data-toggle="modal" data-target="#modalReport' . $publication[6] . '">Signaler</button>
					<div class="dropdown-divider"></div>
					<div class="input-group px-3">
						<input type="text" class="form-control" id="lien' . $publication[0] . $rand . '" value="sonet.freeboxos.fr/?module=accueil&action=publication&id=' . $publication[0] . '" aria-describedby="partager' . $rand . '">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button" id="partager' . $rand . '">Copier le lien</button>
						</div>
					</div>
				</div>

			</div>
		</div>';
	}

	// Affichage profil d'un ami
	function afficheProfil($utilisateur, $alias, $content) {
		$nom = ($alias != '' ) ? "<i>" . $alias . "</i>" : $utilisateur[0];
		$rand = rand();
		return '<div class="px-4 vh-100">

				<div class="pt-4">
					
					<div class="d-flex justify-content-between">

						<div class="d-flex justify-content-start mb-4">

							<a class="mr-3 d-lg-none d-flex" href="?module=amis" style="align-items: center;">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
								</svg>
							</a>

							<h2 class="mb-0">Profil de ' . $utilisateur[0] . '</h2>
						
						</div>

						<button class="bg-transparent border-0" type="button" id="dropdownMenuButton' . $utilisateur[0] . $rand . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
								<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
							</svg>
						</button>

						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton' . $utilisateur[0] . $rand . '">
							<button type="button" class="bg-transparent border-0 py-1 px-4 w-100 text-left" data-toggle="modal" data-target="#modalRename' . $utilisateur[2] . '">Renommer</button>
							<a class="dropdown-item text-danger" href="?module=amis&action=bloquer&block='. $utilisateur[2] . '">Bloquer</a>
							<a class="dropdown-item text-danger" href="?module=amis&action=supprimer&delete=' . $utilisateur[2] . '">Supprimer</a>
							<button type="button" class="bg-transparent border-0 py-1 px-4 w-100 text-left" data-toggle="modal" data-target="#modalReport' . $utilisateur[2] . '">Signaler</button>
						</div>

					</div>

					<img src="' . $utilisateur[1] . '?' . rand() . '" width="160" height="160" class="mr-3" alt="portrait">
					<h5 class="mb-0 text-break mt-2 d-inline">' . $nom . '</h5><span class="badge font-weight-normal text-secondary p-0" style="font-size:16px;">#' . $utilisateur[2] . '</span>

				</div>

				<div class="pt-4">
					' . $content . '
				</div>
			</div>';
	}

	// Affichage d'une image
	function image($chemin) {
		return '<div class="d-flex justify-content-center">
			<img src="' . $chemin . '?' . rand() . '" class="w-100 mb-2" alt="Image publication" style="max-width: 700px;">
		</div>
		';
	}

	// Affichage d'une video
	function video($chemin) {
		return '<div>
			<video src="' . $chemin . '?' . rand() . '" class="w-100 mb-2" height="400" controls>
				Votre navigateur ne prend pas en charge la balise vidéo.
			</video>
		</div>
		';
	}

	// Affichage d'un audio
	function audio($chemin) {
		return '<div>
			<audio src="' . $chemin . '?' . rand() . '" class=" mb-2" style="width: 100%" controls>
				Votre navigateur ne prend pas en charge la balise audio.
			</audio>
		</div>
		';
	}

	// Affichage d'un fichier
	function fichier($chemin) {
		$tailleFichier = filesize($chemin);
		if ($tailleFichier >= 1073741824)
          		$tailleFichier = number_format($tailleFichier / 1073741824, 2) . ' GB';
		elseif ($tailleFichier >= 1048576)
			$tailleFichier = number_format($tailleFichier / 1048576, 2) . ' MB';
		elseif ($tailleFichier >= 1024)
			$tailleFichier = number_format($tailleFichier / 1024, 2) . ' kB';
		elseif ($tailleFichier > 1)
			$tailleFichier = $tailleFichier . ' bits';
		elseif ($tailleFichier == 1)
			$tailleFichier = $tailleFichier . ' bit';
		else
			$tailleFichier = '0 bit';
		return '<div class="border rounded p-3 mb-2 bg-light">
			<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark mr-2 mb-1" viewBox="0 0 16 16">
				<path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
			</svg>
			<a href="' . $chemin . '" class="d-inline text-break" download>
				' .  substr(strrchr($chemin, '/'), 1) . '
			</a>
			<span class="text-muted">' . $tailleFichier . '</span>
		</div>';
	}

	// Affichage d'erreur de fichier
	function problemeFichier() {
		return '<div class="alert alert-warning" role="alert">
				Ce fichier n\'est pas disponible.
			</div>';
	}

	// Affichage d'un sondage
	function sondage($id, $reponses) {
		return '<form class="poll' . $id . '">
			' . $reponses . '
		</form>
		<script>
			function getVote(reponse) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						$(".poll' . $id . '").html(this.responseText);
					}
				}
				xmlhttp.open("GET", "?module=amis&action=voter&id=' . $id . '&vote=" + reponse, true);
				xmlhttp.send();
			}
		</script>';
	}

	// Affichage d'une reponse d'un sondage
	function reponse($id, $value, $reponse) {
		return '<div class="form-check">
			<label class="form-check-label">
				<input class="form-check-input" type="radio" name="sondage' . $id . '" value="' . $value . '" onclick="getVote(this.value)">
				' . $reponse . '
			</label>
		</div>
		';
	}

	// Affichage d'un seul resultat du sondage
	function resultat($reponse, $resultat) {
		return '<li class="list-group-item border-0 p-0 mb-2 text-secondary">
			' . $reponse . '
			<div class="progress p-0">
				<div class="progress-bar bg-dark" role="progressbar" style="width: ' . $resultat . '%;" aria-valuenow="' . $resultat . '" aria-valuemin="0" aria-valuemax="100">' . $resultat . '</div>
			</div>
		</li>';
	}

	// Affichage de tous les resultats du sondage
	function resultatSondage($resultats) {
		return '<ul class="list-group">
			' . $resultats . '
		</ul>';
	}

	// Affichage d'une identification
	function identification($identifie) {
		return '<p class="text-secondary mb-2 mr-2 d-inline-block text-break">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
					<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
				</svg>
				' . $identifie . '
			</p>';
	}

	// Affichage d'une localisation
	function localisation($lieu) {
		return '<p class="text-secondary mb-2 mr-2 d-inline-block text-break">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
					<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
					<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
				</svg>
				' . $lieu . '
			</p>';
	}

	// Affichage d'un message pour aucun ami
	function pasAmi() {
		return '<div class="alert alert-secondary" role="alert">
			Vous n\'avez pas encore d\'ami.
			</div>';
	}

	// Affichage d'un message pour aucun utilisateur bloqué
	function pasUtilisateurBloque() {
		return '<div class="alert alert-secondary" role="alert">
			Vous n\'avez bloqué aucun utilisateur.
			</div>';
	}

	// Affichage d'un message pour aucune demande d'ami
	function pasDemandeAmi() {
		return '<div class="alert alert-secondary" role="alert">
			Vous n\'avez aucune demande d\'ami.
			</div>';
	}

	// Affichage d'un message pour aucune publication
	function pasPublication($utilisateur) {
		return '<div class="alert alert-secondary" role="alert">
			<b>' . $utilisateur[0] . '</b>#' . $utilisateur[2] . ' n\'a pas encore de publication.
			</div>';
	}

	// Affichage d'un message pour la confirmation de suppression
	function confirmDelete($utilisateur) {
		return '<div class="alert alert-success mt-3 mb-0" role="alert">
				<b>' . $utilisateur[0] . '</b>#' . $utilisateur[2] . ' a été supprimé de vos amis.
			</div>';
		
	}

	// Affichage d'un message pour une erreur de suppression
	function errorDelete() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				La suppression n\'a pas été possible.
			</div>';
	}

	// Affichage d'un message pour la confirmation de renommage
	function confirmRename($utilisateur, $alias) {
		return '<div class="alert alert-success mt-3 mb-0" role="alert">
				<b>' . $utilisateur[0] . '</b>#' . $utilisateur[2] . ' a été renommé en <i>' . $alias . '</i>.
			</div>';
		
	}

	// Affichage d'un message pour la confirmation de suppression du renommage
	function confirmDeleteRename($utilisateur) {
		return '<div class="alert alert-success mt-3 mb-0" role="alert">
				L\'alias de <b>' . $utilisateur[0] . '</b>#' . $utilisateur[2] . ' a été supprimé.
			</div>';
		
	}

	// Affichage d'un message pour une erreur de renommage
	function errorRename() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				La renommage n\'a pas été possible.
			</div>';
	}

	// Affichage d'un message pour la confirmation de signalement
	function confirmReport($utilisateur) {
		return '<div class="alert alert-success mt-3 mb-0" role="alert">
				<b>' . $utilisateur[0] . '</b>#' . $utilisateur[2] . ' a été signalé.
			</div>';
	}

	// Affichage d'un message pour une erreur de signalement
	function errorReport() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Le signalement n\'a pas été possible.
			</div>';
	}

	// Affichage d'un message pour la confirmation de demande d'ami
	function confirmAjout($utilisateur) {
		return '<div class="alert alert-success mt-3 mb-0" role="alert">
				Votre demande d\'ami à <b>' . $utilisateur[1] . '</b>#' . $utilisateur[0] . ' a été effectuée.
			</div>';
	}

	// Affichage d'un message pour une demande d'ajout d'un email inutilisé
	function ajoutEmailInutilise() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Cet email n\'est pas utilisé.
			</div>';
	}

	// Affichage d'un message pour une demande d'ajout deja faite
	function demandeDejaFaite($utilisateur) {
		return '<div class="alert alert-warning mt-3 mb-0" role="alert">
				Vous avez déjà demandé <b>' . $utilisateur[1] . '</b>#' . $utilisateur[0] . ' en ami.
			</div>';
	}

	// Affichage d'un message s'ils sont deja amis
	function dejaAmi($utilisateur) {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Vous êtes déjà ami avec <b>' . $utilisateur[1] . '</b>#' . $utilisateur[0] . '.
			</div>';
	}

	// Affichage d'un message s'il s'ajoute lui meme
	function ajoutSoiMeme() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Vous ne pouvez pas vous ajouter en ami.
			</div>';
	}

	// Affichage d'un message confirmation ajout
	function confirmAjoutAmi($utilisateur) {
		return '<div class="alert alert-success mt-3 mb-0" role="alert">
				Vous êtes désormais ami avec <b>' . $utilisateur[0] . '</b>#' . $utilisateur[2] . '.
			</div>';
	}

	// Affiche un message de refus d'une demande d'ami
	function confirmRefusAmi($utilisateur) {
		return '<div class="alert alert-success mt-3 mb-0" role="alert">
				La demande d\'ami de <b>' . $utilisateur[0] . '</b>#' . $utilisateur[2] . ' a été refusée.
			</div>';
	}

	// Affiche d'un message d'erreur pour ami
	function errorAmi() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Vous n\'avez pas l\'autorisation.
			</div>';
	}

	// Affiche un message pour confirmer l'annulation d'une demande d'ami
	function confirmAnnuleDemandeAmi($utilisateur) {
		return '<div class="alert alert-success mt-3 mb-0" role="alert">
				La demande d\'ami à <b>' . $utilisateur[0] . '</b>#' . $utilisateur[2] . ' a été annulée.
			</div>';
	}

	// Affiche un message pour confirmer le bloquage d'un ami
	function confirmBloquer($utilisateur) {
		return '<div class="alert alert-success mt-3 mb-0" role="alert">
				<b>' . $utilisateur[0] . '</b>#' . $utilisateur[2] . ' a été bloqué.
			</div>';
	}

	// Affiche d'un message d'erreur pour bloquer
	function errorBloquer() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Le blocage n\'a pas été possible.
			</div>';
	}

	// Affiche d'un message pour dire que l'utilisateur vous a bloqué
	function etreBloque() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Vous avez été bloqué par cet utilisateur.
			</div>';
	}

	// Affiche d'un message pour dire que vous avez bloqué l'utilisateur
	function userBloque() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Vous avez bloqué cet utilisateur.
			</div>';
	}

	// Affiche d'un message pour confirmer un déblocage
	function confirmDebloquer($utilisateur) {
		return '<div class="alert alert-success mt-3 mb-0" role="alert">
			<b>' . $utilisateur[0] . '</b>#' . $utilisateur[2] . ' a été débloqué.
			</div>';
	}

	// Affiche d'un message d'erreur pour débloquer
	function errorDebloquer() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Le déblocage n\'a pas été possible.
			</div>';
	}

	// Affiche d'un message d'erreur pour l'ajout d'un ami par partage
	function errorAjoutPartage() {
		return '<div class="alert alert-danger mt-3 mb-0" role="alert">
				Ce compte n\'existe pas.
			</div>';
	}

	// Affichage d'une page quand l'action est incorrecte
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
