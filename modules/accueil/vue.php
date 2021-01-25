<?php

class VueAccueil {

	function __construct() {
	}

	// Affichage de la page accueil
	function afficheAccueil($filActualite, $column2) {
		echo '<script src="https://cdn.jsdelivr.net/npm/places.js"></script>
		<div class="row m-0 flex-lg-row d-flex flex-column-reverse">

			<!-- Navigation -->
			<div class="col-lg-1 border-top" id="nav-bottom">

				<a href="?module=accueil" class="d-none d-lg-block" id="logo">
					<img src="img/SoNet_logo.png" alt="SoNet_logo">
				</a>

				<ul class="nav flex-lg-column justify-content-around py-3 py-lg-0">

					<li class="nav-item">
						<a class="nav-link p-0 my-lg-5 actived" href="?module=accueil" title="Accueil">
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

				' . $filActualite . '
			
			</div>

			<!-- Affichage droite -->
			<div class="col-lg-7" style="overflow-y: auto;">
				
				' . $column2 . '

			</div>
		</div>';
	}

	// Affichage du fil d'actualité
	function filActualite($compte, $alert, $listeAmis, $publications) {
		return '<!-- Bonjour, date -->
		<div class="pt-4">
			<h1 class="text-break">Bonjour ' . $compte[1] . '&nbsp;!</h1>
			<span>
				<script>
					var date = new Date();
					var options = { weekday: \'long\', year: \'numeric\', month: \'long\', day: \'numeric\' };
					document.write(date.toLocaleDateString(\'fr-FR\', options));
				</script>
			</span>
		</div>
		
		<!-- Formulaire de publication -->
		<form class="pt-3 border-bottom position-sticky" style="top: 0px; background-color: white; z-index: 1;" action="?module=accueil&action=publier" method="POST" enctype="multipart/form-data">

			' . $alert . '
		
			<div class="input-group">
				<textarea class="form-control" name="message" placeholder="Publier un message..." style="min-height: 62px;" required></textarea>
				<div class="input-group-append">
					<button type="submit" class="btn btn-secondary">Publier</button>
				</div>
			</div>

			<!-- Affichage fichier -->
			<div id="affichage-fichier" class="my-2">
				
			</div>
			<button type="button" class="btn btn-danger" id="delete-file" style="display: none;">Supprimer le fichier</button>

			<!-- Affichage sondage -->
			<div id="affichage-sondage" class="mt-2">
				
			</div>

			<div id="affichage-location" class="mt-2" style="display: none;">
				<input type="text" name="locate" id="location-search" class="form-control" placeholder="Saisissez une localisation"/>
			</div>
		
			<div class="d-flex justify-content-around">

				<!-- Bouton identification -->
				<div class="my-2">
					<button type="button" class="bg-transparent border-0" id="dropdownAmis" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" title="Identification">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
							<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
							<path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
						</svg>
					</button>
					<div class="dropdown-menu p-2 allow-focus w-100" aria-labelledby="dropdownAmis" id="group-checkbox" style="overflow-y: auto; max-height: 100px;">
						' . $listeAmis . '
					</div>
				</div>

				<!-- Bouton fichier -->
				<div class="my-2">
					<label class="text-break" for="file" style="cursor: pointer;" id="file-icon" title="Fichier">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
							<path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
							<path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
						</svg>
					</label>
					<input type="file" name="file" class="form-control-file d-none" id="file">
				</div>

				<!-- Bouton sondage -->
				<div class="my-2">
					<button type="button" class="bg-transparent border-0" id="sondage-icon" title="Sondage">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
						</svg>
					</button>
				</div>

				<!-- Bouton localisation -->
				<div class="my-2">
					<button class="bg-transparent border-0" type="button" id="location-icon" title="Localisation">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
							<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
							<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
						</svg>
					</button>
				</div>

			</div>
		</form>

		<!-- Fil d\'actualité -->
		<div class="pt-4 mb-5" style="padding-bottom:100px;">
			' . $publications . '
		</div>
		
		<script>
			$(document).on("click", ".allow-focus", function (e) {
				e.stopPropagation();
				var checked = $("#group-checkbox input[type=checkbox]:checked").length;
				if (checked > 0)
					$("#dropdownAmis").html(\'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16"><path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/></svg><span class="badge badge-pill badge-secondary ml-1">\' + checked + \'</span>\');
				else
					$("#dropdownAmis").html(\'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/></svg>\');
			});
			// Bouton fichier
			$("#file").change(function() {
				if ($(this)[0].files[0] != null) {
					$(this).prev("label").text($("#file")[0].files[0].name);
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
						$("#affichage-fichier").empty();
						if (type == "image")
							$("#affichage-fichier").append(\'<div class="mt-2"><img src="\' + e.target.result + \'" class="w-100" alt="Image"></div>\');
						else if (type == "audio")
							$("#affichage-fichier").append(\'<div class="mt-2"><audio src="\' + e.target.result + \'" class="w-100" controls>Votre navigateur ne prend pas en charge la balise audio.</audio></div>\');
						else if (type == "video")
							$("#affichage-fichier").append(\'<div class="mt-2"><video src="\' + e.target.result + \'" class="w-100" height="400" controls>Votre navigateur ne prend pas en charge la balise vidéo.</video></div>\');
						else
							$("#affichage-fichier").append(\'<div class="border rounded p-3 m-0 bg-light"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark mr-2 mb-1" viewBox="0 0 16 16"><path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/></svg><a href="\' + e.target.result + \'" class="d-inline text-break" download>\' + fileName + \'</a> <span class="text-muted">\' + fileSize + \'</span></div>\');
					}
					reader.readAsDataURL(this.files[0]);
					$("#delete-file").css("display", "block");
				}
				else {
					$(this).prev("label").html(\'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16"><path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/><path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/></svg>\');
					$("#file").val("");
					$("#affichage-fichier").empty();
					$("#delete-file").css("display", "none");
				}
			});

			$("#delete-file").on("click", function() {
				$("#file").prev("label").html(\'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16"><path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/><path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/></svg>\');
				$("#file").val("");
				$("#affichage-fichier").empty();
				$("#delete-file").css("display", "none");
			});

			// Bouton sondage
			$("#sondage-icon").on("click", function() {
				if ($.trim($("#affichage-sondage").html()).length)
					$("#affichage-sondage").empty();
				else
					$("#affichage-sondage").html(\'<div class="form-group mb-2"><input type="text" class="form-control" name="choix1" placeholder="Choix 1" required></div><div class="form-group mb-2"><input type="text" class="form-control" name="choix2" placeholder="Choix 2" required></div><div class="form-group mb-2"><input type="text" class="form-control" name="choix3" placeholder="Choix 3 (facultatif)"></div><div class="form-group mb-2"><input type="text" class="form-control" name="choix4" placeholder="Choix 4 (facultatif)"></div><button type="button" class="btn btn-danger" onclick="delSondage()">Supprimer le sondage</button>\');
			});

			function delSondage() {
				$("#affichage-sondage").empty();
			}

			// Bouton localisation
			$("#location-icon").on("click", function() {
				$("#affichage-location").toggle();
			});
			(function() {
				var placesAutocomplete = places({
					appId: "plERBPO2DJP7",
					apiKey: "edf012f3e5419e1d8bfa03052742f3fb",
					container: document.querySelector("#location-search")
				});
				
				placesAutocomplete.on("change", function(e) {
					$("#location-icon").html(\'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg>\');
					$("#location-search").val(e.suggestion.value);
				});
				
				placesAutocomplete.on("clear", function() {
					$("#location-icon").html(\'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16"><path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>\');
				});
			})();
		</script>';
	}

	// Affichage des amis pour l'identification
	function ami($utilisateur, $alias, $checked) {
		if (strcmp($alias, $utilisateur[0]) == 0)
			$name = $alias;
		else
			$name = "<i>" . $alias . "</i>";
		$rand = rand();
		$idAmi = $utilisateur[2];
		return '<div class="form-check p-0">
				<input class="m-2" type="checkbox" class="chb" name="friends[]" value="' . $idAmi . '" id="check' . $idAmi . $rand . '" ' . $checked . '>
				<label class="form-check-label" for="check' . $idAmi . $rand . '"><img src="' . $utilisateur[1] . '?' . rand() . '" alt="Photo de profil" class="mr-1" style="width: 30px; height: 30px;">' . $name . ' <i class="text-secondary">#' . $idAmi . '</i></label>
			</div>
			';
	}

	// Affichage d'un message pour aucun ami
	function pasAmi() {
		return '<div class="alert alert-secondary mb-0" role="alert">
				Vous n\'avez pas encore d\'ami.
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

	// Affichage d'un message pour la publication
	function publie() {
		return '<div class="alert alert-success" role="alert">
				La publication est publiée.
			</div>';
	}

	// Affichage d'une erreur d'identification
	function erreurIdentification() {
		return '<div class="alert alert-danger" role="alert">
			Un problème s\'est produit lors de l\'identification d\'un ami. Veuillez réessayer.
		</div>';
	}

	// Affichage d'une erreur de publication
	function erreurPublication() {
		return '<div class="alert alert-danger" role="alert">
			Un problème s\'est produit lors de la publication. Veuillez réessayer.
		</div>';
	}

	// Affichage d'une publication
	function publication($publication, $utilisateur, $content, $boutons, $modal) {
		$rand = rand();
		if (strlen($publication[1]) > 280)
			$message = substr($publication[1], 0, 280) . '...';
		else
			$message = $publication[1];
		return '<div class="border rounded p-3 m-0 mb-3 row" id="publication' . $publication[0] . '">

				<img src="' . $utilisateur[6] . '?' . rand() . '" width="40" height="40" class="mr-3 mb-3" alt="Photo de profil">

				<div class="col p-0">

					<h5 class="mb-0 d-inline text-break">' . $utilisateur[1] . '</h5>
					<span class="badge font-weight-normal text-secondary p-0">' . date_format(date_create($publication[2]), 'd/m/Y, H:i') . '</span>
					<p class="text-break mb-2">' . $message . '</p>

					' . $content . '

					<button class="bg-transparent border-0 float-right" type="button" id="dropdownMenuButton' . $publication[0] . $rand . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
							<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
						</svg>
					</button>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton' . $publication[0] . $rand . '">
						' . $boutons . '
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
			<script>
				$("#publication' . $publication[0] . '").on("click", "#dropdownMenuButton' . $publication[0] . $rand . '", function (e) {
					e.preventDefault();
				});

				$("#publication' . $publication[0] . '").on("click", function() {
					$(".column2Publication").hide();
					$("#column2Publication' . $publication[0] . '").show();
				});

				$(document).ready(function(){
					$("#partager' . $rand . '").click(function(){
						$("#lien' . $publication[0] . $rand . '").select();
					  	document.execCommand("copy");
					});
				});

				
			</script>
			' . $modal;
	}

	// Affichage d'une modal pour modifier une publication
	function modalModifier($publication, $listeAmis) {
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
		return '<div class="modal fade" id="modalEdit' . $publication[0] . '" tabindex="-1">
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
						<form action="?module=accueil&action=modification_publication&id=' . $publication[0] . '" method="post" enctype="multipart/form-data">
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

	// Affichage d'une modal pour signaler une publication
	function modalSignalerPublication($utilisateur, $idPublication) {
		return '<div class="modal fade" id="modalReportPost' . $utilisateur[0] . '" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Signaler</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p class="text-secondary">Signaler la publication de ' . $utilisateur[1] . '#' . $utilisateur[0] . '. <br></p>
						<form action="?module=accueil&action=signaler&id=' . $utilisateur[0] . '&contenu=P' . $idPublication . '" method="post">
							<div class="form-group">
								<label for="raison">Raison</label>
								<textarea class="form-control" name="raison" placeholder="Saisissez la raison ici ..." style="min-height: 62px;" required></textarea>
							</div>
							<button type="submit" class="btn btn-secondary">Envoyer</button>
						</form>
					</div>
				</div>
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
				xmlhttp.open("GET", "?module=accueil&action=voter&id=' . $id . '&vote=" + reponse, true);
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

	// Affichage des boutons pour mes publications
	function mesBoutonsPublication($id) {
		return '<button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalEdit' . $id . '">Modifier</button>
		<a class="dropdown-item text-danger" href="?module=accueil&action=suppression_publication&id=' . $id . '">Supprimer</a>';
	}

	// Affichage des boutons pour les autres publications
	function autresBoutonsPublication($id) {
		return '<a class="dropdown-item" href="?module=amis&action=profil&id=' . $id . '">Profil</a>
		<button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalReportPost' . $id . '">Signaler</button>';
	}

	// Affichage d'une publication à droite en grand
	function affichagePublication($publication, $utilisateur, $content, $boutons, $display, $commentaires) {
		$rand = rand();
		return '<div class="px-4 vh-100 column2Publication" style="display: ' . $display . ';" id="column2Publication' . $publication[0] . '">

			<div class="d-flex justify-content-between border-bottom">

				<div class="d-flex justify-content-start py-4">

					<a class="mr-3 d-lg-none d-flex" href="?module=accueil" style="align-items: center;">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
						</svg>
					</a>

					<div class="d-sm-flex">
						<img src="' . $utilisateur[6] . '?' . rand() . '" width="40" height="40" class="mr-2" alt="Photo de profil">
						<h2 class="mb-0 mr-2 text-break">' . $utilisateur[1] . '</h2>
						<span class="badge font-weight-normal text-secondary mt-auto mb-1">' . date_format(date_create($publication[2]), 'd/m/Y, H:i') . '</span>
					</div>

				</div>

				<button class="bg-transparent border-0" type="button" id="dropdownMenuButton' . $publication[0] . $rand . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
						<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
					</svg>
				</button>

				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton' . $publication[0] . $rand . '">
					' . $boutons . '
					<div class="dropdown-divider"></div>
					<div class="input-group px-3">
						<input type="text" class="form-control" id="lien' . $publication[0] . $rand . '" value="sonet.freeboxos.fr/?module=accueil&action=publication&id=' . $publication[0] . '" aria-describedby="partager' . $rand . '">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button" id="partager' . $rand . '">Copier le lien</button>
						</div>
					</div>
				</div>

			</div>

			<div class="mt-4 pb-5">
				<p class="text-break mb-2">' . $publication[1] . '</p>

				' . $content . '

				<div class="pb-5 pt-4 border-top mt-3">
					<form action="?module=accueil&action=commenter&id=' . $publication[0] . '" method="post" class="input-group col-lg-7 position-fixed input-comment" style="bottom: 15px; right: 0; z-index: 100;">
						<textarea class="form-control" name="commentaire" placeholder="Commenter la publication..." style="resize: none; min-height: 62px;" required></textarea>
						<div class="input-group-append">
							<button type="submit" class="btn btn-secondary">Commenter</button>
						</div>
					</form>

					<h5 class="pb-2">Commentaires</h5>

					' . $commentaires . '

				</div>
				<div class="pb-5 pb-lg-0"></div>
			</div>
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

	// Affichage d'un message pour la confirmation de signalement
	function confirmationSignalement($utilisateur) {
		return '<div class="alert alert-success" role="alert">
				<b>' . $utilisateur[1] . '#' . $utilisateur[0] . '</b> a été signalé.
			</div>';
	}

	// Affichage d'un message pour une erreur de signalement
	function erreurSignalement() {
		return '<div class="alert alert-danger" role="alert">
				Le signalement n\'a pas été possible.
			</div>';
	}

	// Affichage d'un message pour une erreur de commentaire
	function erreurCommentaire() {
		return '<div class="alert alert-danger" role="alert">
			Le commentaire n\'a pas été possible.
		</div>';
	}

	// Affichage d'un commentaire sous une publication
	function commentaire($commentaire, $utilisateur, $boutons, $modal) {
		$rand = rand();
		return '<div class="border rounded p-3 m-0 mb-3 row">

			<img src="' . $utilisateur[6] . '?' . rand() . '" width="40" height="40" class="mr-3" alt="Photo de profil">

			<div class="col p-0">

				<div>
					<h5 class="mb-0 d-inline text-break">' . $utilisateur[1] . '</h5>
					<span class="badge font-weight-normal text-secondary p-0">' . date_format(date_create($commentaire[2]), 'd/m/Y, H:i') . '</span>
				</div>
				<p class="text-break d-inline">' . $commentaire[1] . '</p>

				<button class="bg-transparent border-0 float-right" type="button" id="dropdownMenuButton' . $commentaire[0] . $rand . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
						<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
					</svg>
				</button>

				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton' . $commentaire[0] . $rand . '">
					' . $boutons . '
				</div>
			</div>
		</div>
		' . $modal;
	}

	// Affichage des boutons pour mes publications
	function mesBoutonsCommentaire($id) {
		return '<button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalEdit' . $id . '">Modifier</button>
		<a class="dropdown-item text-danger" href="?module=accueil&action=suppression_commentaire&id=' . $id . '">Supprimer</a>';
	}

	// Affichage des boutons pour les autres publications
	function autresBoutonsCommentaire($id) {
		return '<a class="dropdown-item" href="?module=amis&action=profil&id=' . $id . '">Profil</a>
		<button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalReportComment' . $id . '">Signaler</button>';
	}

	// Affichage d'une modal pour modifier un commentaire
	function modalModifierCommentaire($commentaire) {
		return '<div class="modal fade" id="modalEdit' . $commentaire[0] . '" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Modifier</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p class="text-secondary">Modifier votre commentaire</p>
							<form action="?module=accueil&action=modification_commentaire&id=' . $commentaire[0] . '" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="name">Commentaire</label>
									<textarea class="form-control" name="message" placeholder="' . $commentaire[1] . '" style="min-height: 62px;" required></textarea>
								</div>
								<button type="submit" class="btn btn-secondary">Enregistrer</button>
							</form>
						</div>
					</div>
				</div>
			</div>';
	}

	// Affichage d'une modal pour signaler un commentaire
	function modalSignalerCommentaire($utilisateur, $idCommentaire) {
		return '<div class="modal fade" id="modalReportComment' . $utilisateur[0] . '" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Signaler</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p class="text-secondary">Signaler le commentaire de ' . $utilisateur[1] . '#' . $utilisateur[0] . '. <br></p>
						<form action="?module=accueil&action=signaler&id=' . $utilisateur[0] . '&contenu=C' . $idCommentaire . '" method="post">
							<div class="form-group">
								<label for="raison">Raison</label>
								<textarea class="form-control" name="raison" placeholder="Saisissez la raison ici ..." style="min-height: 62px;" required></textarea>
							</div>
							<button type="submit" class="btn btn-secondary">Envoyer</button>
						</form>
					</div>
				</div>
			</div>
		</div>';
	}

	// Affichage d'un message pour la suppression d'un commentaire
	function suppressionCommentaire() {
		return '<div class="alert alert-success" role="alert">
				Votre commentaire a été supprimé.
			</div>';
	}

	// Affichage d'une erreur de suppression de commentaire
	function pasVotreCommentaire() {
		return '<div class="alert alert-danger" role="alert">
			Vous ne pouvez pas supprimer le commentaire d\'un autre utilisateur.
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
