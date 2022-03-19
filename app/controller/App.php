<?php

class App {

	public $found = false;

	public function route($route, $controller, $action) {
		if (!($this->found)) {
			if (!isset($_GET['route'])) {
				$_GET['route'] = "home";
			}
			if (isset($_GET["route"]) && $_GET["route"] == $route) {
				(new $controller())->$action();
				$this->found = true;
			}
		}	
	}

	public function notfound() {
		if (!($this->found)) {
			(new HomeController())->notfound();
		}
	}

}
