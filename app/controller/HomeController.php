<?php

$data = null;

class HomeController {

	public function index() {
		$data = Commentaire::all();
		include_once "csp/default.php";
		include_once "view/header.php";
		include_once "view/welcome.php";
		include_once "view/footer.php";
	}

	public function notfound() {
		include_once "csp/default.php";
		include_once "view/header.php";
		include_once "view/404.php";
		include_once "view/footer.php";
	}

	public function jsonp() {
		include_once "csp/default.php";
		include_once "view/header.php";
		include_once "view/not_implemented.php";
		include_once "view/footer.php";
	}

	public function image() {
		include_once "csp/default.php";
		include_once "view/header.php";
		include_once "view/not_implemented.php";
		include_once "view/footer.php";
	}

	public function dangling() {
		$data = Commentaire::all();
		include_once "csp/default.php";
		include_once "view/header.php";
		include_once "view/not_implemented.php";
		include_once "view/show_commentaires.php";
		include_once "view/footer.php";
	}

}