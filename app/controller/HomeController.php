<?php

$data = null;

class HomeController {

	public function index() {
		$data = Commentaire::all();
		include_once "view/header.php";
		include_once "view/welcome.php";
		include_once "view/footer.php";
	}

	public function notfound() {
		include_once "view/header.php";
		include_once "view/404.php";
		include_once "view/footer.php";
	}

	public function jsonp() {
		$data = Commentaire::all();
		include_once "csp/none.php";
		include_once "view/header.php";
		include_once "view/show_data.php";
		include_once "view/footer.php";
	}

	public function image() {
		$data = Commentaire::all();
		include_once "csp/default.php";
		include_once "view/header.php";
		include_once "view/show_data.php";
		include_once "view/footer.php";
	}

	public function dangling() {
		$data = Commentaire::all();
		include_once "csp/default.php";
		include_once "view/header.php";
		include_once "view/show_data.php";
		include_once "view/footer.php";
	}

}