<?php

class VueProfil {

	function __construct() {
	}

	// Affichage de la page profil
	function afficheProfil($compte, $column2) {
		setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
		$birthday = strftime("%A %e %B %Y", strtotime($compte[4]));
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
								<path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
								<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
							</svg>
						</a>
					</li>

					<li class="nav-item mt-lg-9">
						<a class="nav-link p-0 my-lg-5" href="?module=messages" title="Messages">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
								class="bi bi-chat" viewBox="0 0 16 16">
								<path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
							</svg>
						</a>
					</li>

					<li class="nav-item mt-lg-9">
						<a class="nav-link p-0 my-lg-5" href="?module=amis" title="Amis">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
								class="bi bi-people" viewBox="0 0 16 16">
								<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
							</svg>
						</a>
					</li>

					<li class="nav-item mt-lg-9">
						<a class="nav-link p-0 my-lg-5 actived" href="?module=profil" title="Profil">
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

					<h1>Profil</h1>

					<div>
						<img src="' . $compte[6] . '?' . rand() . '" width="100" height="100" class="m-3" alt="Photo de profil">
					</div>

					<h2 class="mb-3 d-inline text-break">' . $compte[1] . '</h2>
					<span class="badge font-weight-normal d-inline text-secondary p-0" style="font-size: 25px;">#' . $compte[0] . '</span>

					<div class="border rounded w-100 px-3 pt-3 mt-3">
						<h5>Email</h5>
						<p>' . $compte[2] . '</p>
						<h5>Date de naissance</h5>
						<p>' . $birthday . '</p>
					</div>

				</div>

				<div class="pt-2" style="margin-bottom:120px;">
					<div class="row">
						<div class="col-12 col-sm-6 col-lg-12 col-xxl-6">
							<a class="btn btn-light border rounded py-4 my-2 w-100" href="?module=profil&action=publications">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-post" viewBox="0 0 16 16">
									<path d="M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8z"/>
									<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
								</svg>
								Publications
							</a>
						</div>
						<div class="col-12 col-sm-6 col-lg-12 col-xxl-6">
							<a class="btn btn-light border rounded py-4 my-2 w-100" href="?module=profil&action=compte">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
									<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
								</svg>
								Compte
							</a>
						</div>
						<div class="col-12 col-sm-6 col-lg-12 col-xxl-6">
							<a class="btn btn-light border rounded py-4 my-2 w-100" href="?module=profil&action=securite">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-shield" viewBox="0 0 16 16">
									<path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
								</svg>
								Sécurité
							</a>
						</div>
						<div class="col-12 col-sm-6 col-lg-12 col-xxl-6">
							<a class="btn btn-light border rounded py-4 my-2 w-100" href="?module=profil&action=deconnexion">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
									<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
								</svg>
								Se&nbsp;déconnecter
							</a>
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

	// ----- Publications -----
	// Affichage de la section pour les publications d'un utilisateur
	function affichePublications($alert, $publications) {
		return '<script src="https://cdn.jsdelivr.net/npm/places.js"></script>
		<div class="vh-100">

			<div class="pt-4 px-4">

				<div class="d-flex justify-content-start">

					<a class="mr-3 d-lg-none d-flex" href="?module=profil" style="align-items: center;">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
						</svg>
					</a>

					<h2 class="mb-0">Publications</h2>

				</div>

				<p class="text-secondary">Vos publications.</p>

				' . $alert . '

			</div>

			<div class="m-4" style="padding-bottom: 150px;">

			' . $publications . '
				
			</div>
		</div>';
	}

	// Affichage des amis pour l'identification
	function ami($utilisateur, $alias, $checked) {
		if (strcmp($alias, $utilisateur[0]) == 0)
			$name = $alias;
		else
			$name = "<i>" . $alias . "</i>";
		$idAmi = $utilisateur[2];
		return '<div class="form-check p-0">
				<input class="m-2" type="checkbox" name="friends[]" value="' . $idAmi . '" id="check' . $idAmi . '" ' . $checked . '>
				<label class="form-check-label" for="check' . $idAmi . '"><img src="' . $utilisateur[1] . '?' . rand() . '" alt="Photo de profil" class="mr-1" style="width: 30px; height: 30px;">' . $name . ' <i class="text-secondary">#' . $idAmi . '</i></label>
			</div>
			';
	}

	// Affichage d'un message pour aucun ami
	function pasAmi() {
		return '<div class="alert alert-secondary mb-0" role="alert">
				Vous n\'avez pas encore d\'ami.
			</div>';
	}

	// Affichage d'une publication
	function publication($publication, $content, $listeAmis) {
		if ($publication[3] != '' && file_exists($publication[3])) {
			if (strstr(mime_content_type($publication[3]), '/', true) == "image")
				$fichier = $this -> image($publication[3]);
			else if (strstr(mime_content_type($publication[3]), '/', true) == "video")
				$fichier = $this -> video($publication[3]);
			else if (strstr(mime_content_type($publication[3]), '/', true) == "audio")
				$fichier = $this -> audio($publication[3]);
			else
				$fichier = $this -> fichier($publication[3]);
		}
		else
			$fichier = '';
		if ($publication[5] == '')
			$locate = '';
		else
			$locate = $publication[5];
		setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
		$date = strftime("%A %e %B %Y, %H:%M", strtotime($publication[2]));
		$rand = rand();
		return '<div class="border rounded p-3 m-0 mb-3 row" id="publication' . $publication[0] . '">

			<div class="col p-0">

				<h5 class="mb-0 d-inline text-break">' . $date . '</h5>
				<p class="text-break mb-2">' . $publication[1] . '</p>

				' . $content . '

				<button class="bg-transparent border-0 float-right" type="button" id="dropdownMenuButton' . $publication[0] . $rand . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
						<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
					</svg>
				</button>

				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton' . $publication[0] . $rand . '">
					<button type="button" class="bg-transparent border-0 py-1 px-4 w-100 text-left" data-toggle="modal" data-target="#modalEdit' . $publication[0] . '">Modifier</button>
					<a class="dropdown-item text-danger" href="?module=profil&action=suppression_publication&idPublication=' . $publication[0] . '">Supprimer</a>
					<div class="dropdown-divider"></div>
					<div class="input-group px-3">
						<input type="text" class="form-control" id="lien' . $publication[0] . $rand . '" value="sonet.freeboxos.fr/?module=accueil&action=publication&id=' . $publication[0] . '" aria-describedby="partager' . $rand . '">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button" id="partager' . $rand . '">Copier le lien</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modalEdit' . $publication[0] . '" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modifier</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p class="text-secondary">Modifier votre publication</p>
						<form action="?module=profil&action=modification_publication&idPublication=' . $publication[0] . '" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">Message</label>
								<textarea class="form-control" name="message" placeholder="' . $publication[1] . '" style="min-height: 62px;"></textarea>

								<div class="mt-3">
									<label for="update-file' . $publication[0] . '" id="file-label' . $publication[0] . '" style="cursor: pointer;">
										' . $fichier . '
									</label>
									<input type="file" name="update-file" class="form-control-file" id="update-file' . $publication[0] . '">
									<button type="button" class="btn btn-danger mt-1" id="delete-update-file' . $publication[0] . '">Supprimer le fichier</button>
									<input type="checkbox" name="file-is-delete" class="d-none" id="file-is-delete' . $publication[0] . '" value="1">
								</div>
								
								<div class="mt-3">
									<label for="update-location-search' . $publication[0] . '">Localisation</label>
									<input type="text" name="locate" id="update-location-search' . $publication[0] . '" class="form-control" placeholder="Saisissez une localisation" value="' . $locate . '"/>
								</div>

								<label class="mt-3">Identification</label>
								<div style="overflow-y: auto; max-height: 100px;">
									' . $listeAmis . '
								</div>
							</div>
							<button type="submit" class="btn btn-secondary">Enregistrer</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script>
			// Fichier
			$("#update-file' . $publication[0] . '").change(function() {
				if (this.files && this.files[0]) {
					var type = this.files[0].type.split("/")[0];
					var reader = new FileReader();
					var fileName = this.files[0].name;
					var fileSize = this.files[0].size;
					if (fileSize >= 1073741824)
						fileSize = parseFloat(fileSize / 1073741824).toFixed(2) + " GB";
					else if (fileSize >= 1048576)
						fileSize = parseFloat(fileSize / 1048576).toFixed(2) + " MB";
					else if (fileSize >= 1024)
						fileSize = parseFloat(fileSize / 1024).toFixed(2) + " kB";
					else if (fileSize > 1)
						fileSize = fileSize + " bits";
					else if (fileSize == 1)
						fileSize = fileSize + " bit";
					else
						fileSize = "0 bit";
					reader.onload = function(e) {
						if (type == "image")
							$("#file-label' . $publication[0] . '").html(\'<div><img src="\' + e.target.result + \'" class="w-100" alt="Image"></div>\');
						else if (type == "audio")
							$("#file-label' . $publication[0] . '").html(\'<div><audio src="\' + e.target.result + \'" controls>Votre navigateur ne prend pas en charge la balise audio.</audio></div>\');
						else if (type == "video")
							$("#file-label' . $publication[0] . '").html(\'<div><video src="\' + e.target.result + \'" class="w-100" height="400" controls>Votre navigateur ne prend pas en charge la balise vidéo.</video></div>\');
						else
							$("#file-label' . $publication[0] . '").html(\'<div class="border rounded p-3 m-0 bg-light"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark mr-2 mb-1" viewBox="0 0 16 16"><path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/></svg><a href="\' + e.target.result + \'" class="d-inline text-break" download>\' + fileName + \'</a> <span class="text-muted">\' + fileSize + \'</span></div>\');
					}
					reader.readAsDataURL(this.files[0]);
					$("#file-is-delete' . $publication[0] . '").prop("checked", false);
				}
				else
					$("#file-label' . $publication[0] . '").empty();
			});

			$("#delete-update-file' . $publication[0] . '").on("click", function() {
				$("#update-file' . $publication[0] . '").val("");
				$("#file-label' . $publication[0] . '").empty();
				$("#file-is-delete' . $publication[0] . '").prop("checked", true);
			});

			// Bouton localisation
			(function() {
				var placesAutocomplete = places({
					appId: \'plERBPO2DJP7\',
					apiKey: \'edf012f3e5419e1d8bfa03052742f3fb\',
					container: document.querySelector("#update-location-search' . $publication[0] . '")
				});
				
				placesAutocomplete.on("change", function(e) {
					$("#update-location-search' . $publication[0] . '").val(e.suggestion.value);
				});
				
				placesAutocomplete.on("clear", function() {
					$("#update-location-search' . $publication[0] . '").val("");
				});
			})();
		</script>';
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
			<audio src="' . $chemin . '?' . rand() . '" class="mb-2" style="width: 100%" controls>
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
				xmlhttp.open("GET", "?module=profil&action=voter&id=' . $id . '&vote=" + reponse, true);
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

	// Affichage d'un message pour aucune de publication
	function pasPublication() {
		return '<div class="alert alert-secondary" role="alert">
				Vous n\'avez pas encore de publication.
			</div>';
	}

	// Affichage d'un message de suppression de publication
	function modificationPublication() {
		return '<div class="alert alert-success" role="alert">
				Votre publication a été modifiée.
			</div>';
	}

	// Affichage d'une erreur de suppression de publication
	function erreurModificationPublication() {
		return '<div class="alert alert-danger" role="alert">
			La modification de la publication n\'est pas possible.
			</div>';
	}

	// Affichage d'un message pour un fichier volumineux
	function fichierVolumineux() {
		return '<div class="alert alert-warning" role="alert">
				Votre fichier est trop volumineux. (Taille maximale : 10MB)
			</div>';
	}

	// Affichage d'erreur lors du téléchargement d'un fichier
	function fichierEchec() {
		return '<div class="alert alert-warning" role="alert">
				Un problème s\'est produit lors du téléchargement de votre fichier. Veuillez réessayer.
			</div>';
	}

	// Affichage d'une erreur d'identification
	function erreurIdentification() {
		return '<div class="alert alert-danger" role="alert">
			Un problème s\'est produit lors de l\'identification d\'un ami. Veuillez réessayer.
		</div>';
	}

	// Affichage d'un message de suppression de publication
	function suppressionPublication() {
		return '<div class="alert alert-success" role="alert">
				Votre publication a été supprimée.
			</div>';
	}

	// Affichage d'une erreur de suppression de publication
	function erreurSuppressionPublication() {
		return '<div class="alert alert-danger" role="alert">
			La suppression de la publication n\'est pas possible.
			</div>';
	}

	// ----- Securité -----
	// Affichage de la section pour modifier le mot de passe
	function afficheSecurite($alert) {
		return '<div class="vh-100">

			<div class="pt-4 px-4">

				<div class="d-flex justify-content-start">

					<a class="mr-3 d-lg-none d-flex" href="?module=profil" style="align-items: center;">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
						</svg>
					</a>

					<h2 class="mb-0">Securité</h2>

				</div>

				<p class="text-secondary">Changer votre mot de passe.</p>

				' . $alert . '

			</div>

			<form class="m-4" action="?module=profil&action=change_password" method="post" style="padding-bottom: 100px;">

				<div class="input-group mb-3">
					<input type="password" class="form-control border-right-0" name="old-password"
						placeholder="Ancien mot de passe" id="old-password" required>
					<div class="input-group-append">
						<button class="btn border border-left-0 toggle-password" type="button"
							toggle="#old-password">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								class="bi bi-eye" viewBox="0 0 16 16">
								<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
								<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
							</svg>
						</button>
					</div>
				</div>

				<div class="input-group mb-3">
					<input type="password" class="form-control border-right-0" name="new-password"
						placeholder="Nouveau mot de passe" minlength="8"
						pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="new-password" required>
					<div class="input-group-append">
						<button class="btn border border-left-0 toggle-password" type="button"
							toggle="#new-password">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								class="bi bi-eye" viewBox="0 0 16 16">
								<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
								<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
							</svg>
						</button>
					</div>
				</div>

				<div class="d-sm-flex justify-content-around">
					<p class="mx-2" id="letter">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								class="bi bi-x" viewBox="0 0 16 16">
								<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
							</svg>
						</span>
						minuscule
					</p>
					<p class="mx-2" id="capital">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								class="bi bi-x" viewBox="0 0 16 16">
								<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
							</svg>
						</span>
						majuscule
					</p>
					<p class="mx-2" id="number">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								class="bi bi-x" viewBox="0 0 16 16">
								<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
							</svg>
						</span>
						chiffre
					</p>
					<p class="mx-2" id="length">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								class="bi bi-x" viewBox="0 0 16 16">
								<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
							</svg>
						</span>
						8 caractères
					</p>
				</div>

				<div class="input-group mb-3">
					<input type="password" class="form-control border-right-0" name="new-password-repeat"
						placeholder="Confirmation du mot de passe" minlength="8"
						pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="new-password-repeat" required>
					<div class="input-group-append">
						<button class="btn border border-left-0 toggle-password" type="button"
							toggle="#new-password-repeat">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								class="bi bi-eye" viewBox="0 0 16 16">
								<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
								<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
							</svg>
						</button>
					</div>
				</div>

				<button type="submit" class="btn btn-secondary">Enregistrer</button>
			</form>
		</div>
		<script>
			$(".toggle-password").click(function() {
				var input = $($(this).attr("toggle"));
				if (input.attr("type") == "password") {
					input.attr("type", "text");
					$(this).html("<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-eye-slash\" viewBox=\"0 0 16 16\"><path d=\"M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z\"/><path d=\"M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299l.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z\"/><path d=\"M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884l-12-12 .708-.708 12 12-.708.708z\"/></svg>");
				} else {
					input.attr("type", "password");
					$(this).html("<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-eye\" viewBox=\"0 0 16 16\"><path d=\"M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z\"/><path d=\"M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z\"/></svg>");
				}
			});

			function ValidatePassword() {
				var rules = [{ Pattern: "[A-Z]", Target: "capital" },
				{ Pattern: "[a-z]", Target: "letter" },
				{ Pattern: "[0-9]", Target: "number" }];
				var password = $(this).val();

				if (password.length >= 8) {
					$("#length").addClass("text-success");
					$("#length span").html("<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-check2\" viewBox=\"0 0 16 16\"><path d=\"M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z\"/></svg>");

				} else {
					$("#length").removeClass("text-success");
					$("#length span").html("<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-x\" viewBox=\"0 0 16 16\"><path d=\"M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z\"/></svg>");
				}

				for (var i = 0; i < rules.length; i++) {
					if (new RegExp(rules[i].Pattern).test(password)) {
						$("#" + rules[i].Target).addClass("text-success");
						$("#" + rules[i].Target + " span").html("<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-check2\" viewBox=\"0 0 16 16\"><path d=\"M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z\"/></svg>");
					} else {
						$("#" + rules[i].Target).removeClass("text-success");
						$("#" + rules[i].Target + " span").html("<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-x\" viewBox=\"0 0 16 16\"><path d=\"M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z\"/></svg>");
					}
				}
			}

			$(document).ready(function () {
				$("#new-password").on(\'keyup\', ValidatePassword)
			});
		</script>';
	}

	// Affichage d'un message pour mot de passe non identique
	function mdpPasIdentique() {
		return '<div class="alert alert-warning" role="alert">
				Les mots de passe ne sont pas identiques.
			</div>';
	}

	// Affichage d'un message pour mot de passe identique à l'ancien 
	function mdpIdentique() {
		return '<div class="alert alert-warning" role="alert">
				L\'ancien et le nouveau mot de passe sont identiques.
			</div>';
	}

	// Affichage d'un message pour mot de passe incorrect
	function mauvaisMdp() {
		return '<div class="alert alert-danger" role="alert">
				L\'ancien mot de passe est incorrect.
			</div>';
	}

	// Affichage d'un message pour la modification du mot de passe
	function modificationMdpFaite() {
		return '<div class="alert alert-success" role="alert">
				Votre mot de passe a bien été changé.
			</div>';
	}

	// Affichage d'une erreur de modification de mot de passe
	function erreurModificationMdp() {
		return '<div class="alert alert-danger" role="alert">
				Le changement de mot de passe n\'a pas été fait.
			</div>';
	}

	// ----- Compte -----
	// Affichage de la section pour modifier le nom, email, date de naissance ou photo de profil
	function afficheCompte($compte, $alert) {
		return '<div class="px-4 vh-100">

			<div class="pt-4">

				<div class="d-flex justify-content-start">

					<a class="mr-3 d-lg-none d-flex" href="?module=profil" style="align-items: center;">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
						</svg>
					</a>

					<h2 class="mb-0">Compte</h2>

				</div>

				<p class="text-secondary">Changer les informations de votre compte.</p>

				<div class="alert-message">
					' . $alert . '
				</div>

			</div>

			<form class="my-4" action="?module=profil&action=modification_compte" method="post" enctype="multipart/form-data">

				<div class="form-group row ml-0 d-flex align-items-center">
					<label class="my-0 text-break mr-3" for="photo" style="margin-top: 15px; cursor: pointer;">
						<div class="position-relative" id="portrait">
							<img src="' . $compte[6] . '?' . rand() . '" width="100" height="100" alt="Photo de profil" id="photoProfil">
							<div class="overlay position-absolute bg-light">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil position-absolute" viewBox="0 0 16 16">
									<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
								</svg>
							</div>
						</div>
					</label>
					<input type="file" class="d-none" name="photo" id="photo" accept=".jpg,.jpeg,.png">
				</div>
				<div class="form-group">
					<label for="name">Nom</label>
					<input type="text" class="form-control" name="name" placeholder="' . $compte[1] . '" maxlength="32" id="name">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" placeholder="' . $compte[2] . '" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email">
				</div>
				<div class="form-group">
					<label for="birthday">Date de naissance</label>
					<input type="date" class="form-control" name="birthday" value="' . $compte[4] . '" min="1900-01-01" max="' . date('Y-m-d') . '" id="birthday">
				</div>
				<button type="submit" class="btn btn-secondary">Enregistrer</button>
			</form>

			<div class="border-top pt-4" style="padding-bottom: 150px;">

				<h5>Suppression du compte</h5>
				<p class="text-secondary">Toutes les données de votre compte seront supprimées.</p>

				<a href="?module=profil&action=suppression_compte" class="btn btn-danger">Supprimer le compte</a>

			</div>
		</div>
		<script>
			// Photo de profil
			$("#photo").change(function() {
				var url = this.value;
				var ext = (/[.]/.exec(url)) ? /[^.]+$/.exec(url)[0] : undefined;
				if (this.files && this.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
					$("#photoProfil").attr("src", e.target.result);
					}
					reader.readAsDataURL(this.files[0]);
					$(".alert-message").empty();
				}
				else {
					$(".alert-message").html(\'<div class="alert alert-warning" role="alert">Seuls les fichiers JPG, JPEG et PNG sont autorisés.</div>\');
					$("#photoProfil").attr("src", "' . $compte[6] . '");
				}
			});
		</script>';
	}

	// Affichage d'un message pour une photo volumineux
	function photoVolumineux() {
		return '<div class="alert alert-warning" role="alert">
				<strong>Oh !</strong> Votre fichier est trop volumineux. (Taille maximale : 2MB)
			</div>';
	}

	// Affichage d'un message pour une photo avec un mauvais format
	function photoMauvaisFormat() {
		return '<div class="alert alert-warning" role="alert">
				Seuls les fichiers JPG, JPEG et PNG sont autorisés.
			</div>';
	}

	// Affichage d'un message pour une problème lors du téléchargement d'une image
	function photoEchec() {
		return '<div class="alert alert-warning" role="alert">
				<strong>Oups !</strong> Un problème s\'est produit lors du téléchargement de votre photo. Veuillez réessayer.
			</div>';
	}

	// Affichage d'un message pour un email déjà utilisé
	function existeDeja($email)	{
		return '<div class="alert alert-warning" role="alert">
				Cet email (<i>' . $email . '</i>) est déjà utilisé.
			</div>';
	}

	// Affichage d'erreur d'aucune modification
	function aucuneModification() {
		return '<div class="alert alert-danger" role="alert">
				Il n\'y a aucune modification.
			</div>';
	}

	// Affichage d'un message pour la modification du nom, email, date de naissance ou photo de profil
	function modificationFaite() {
		return '<div class="alert alert-success" role="alert">
				Les modifications ont été enregistrées.
			</div>';
	}

	// Affichage d'une erreur de modification
	function erreurModification() {
		return '<div class="alert alert-danger" role="alert">
				La modification n\'a pas été faite.
			</div>';
	}

	// Affichage d'une erreur de suppression de compte
	function erreurSuppressionCompte() {
		return '<div class="alert alert-danger" role="alert">
			Un problème s\'est produit lors de la suppression de votre compte.
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
							<path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
							<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
						</svg>
						Accueil
					</a>
					<a class="p-1" href="?module=messages" title="Messages">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
							class="bi bi-chat" viewBox="0 0 16 16">
							<path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
						</svg>
						Messages
					</a>
					
					<a class="p-1" href="?module=amis" title="Amis">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
							class="bi bi-people" viewBox="0 0 16 16">
							<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
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
