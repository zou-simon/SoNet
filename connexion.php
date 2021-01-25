<?php

class Connexion {

	protected static $bdd;

	function __construct() {
	}

	public static function initConnexion() {
		self::$bdd = new PDO('mysql:host=localhost;dbname=sonet;charset=utf8', 'sonet', 'NoNoNo');
		self::$bdd -> exec('SET NAMES utf8');
	}

}
?>