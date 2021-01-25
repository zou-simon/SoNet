<?php

class ModeleCompte extends Connexion {
	
	function __construct() {
	}

	// Verification du mot de passe
	function verifMdp($email, $password) {
		$selectPrepa = self::$bdd -> prepare("SELECT motDePasse FROM utilisateur WHERE email='$email'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return (password_verify($password, $result['motDePasse'])) ? true : false;
	}

	// Verification de l'existance du compte
	function verifExist($email) {
		$selectPrepa = self::$bdd -> prepare("SELECT * FROM utilisateur WHERE email='$email'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return ($result) ? true : false;
	}

	// Insertion d'un utilisateur
	function insert($name, $email, $password, $birthday) {
		$id = uniqid();
		$hashPwd = crypt($password, '$1$somethin$');
		$role = "utilisateur";
		$photoProfil = "img/portrait.png";
		$sql = "INSERT INTO utilisateur (id, nom, email, motDePasse, dateNaissance, role, photoProfil) VALUES (:id, :name, :email, :hashPwd, :birthday, :role, :photoProfil)";
		$selectPrepa = self::$bdd -> prepare($sql);
		$result = $selectPrepa -> execute(array('id' => $id, 'name' => $name, 'email' => $email, 'hashPwd' => $hashPwd, 'birthday' => $birthday, 'role' => $role, 'photoProfil' => $photoProfil));
		return ($result) ? true : false;
	}

	// Selection de l'id d'un utilisateur
	function getId($email) {
		$selectPrepa = self::$bdd -> prepare("SELECT id FROM utilisateur WHERE email = '$email'");
		$selectPrepa -> execute();
		$result = $selectPrepa -> fetch();
		return $result[0];
	}
}
?>