<?php

$data = null;

class DanglingMarkupController {

	public function index() {
		$data = Dm::all();
		include_once "csp/default.php";
		include_once "view/header.php";
		include_once "view/dangling_markup.php";
		include_once "view/footer.php";
	}

    public function clear() {
        Dm::clear();
        $this->index();
    }

    public function insert() {
        // check if form is submited
        if (isset($_POST['comment']) && !empty($_POST['comment'])) {
            $inserted = [
                "comment" => $_POST['comment']
            ];
            Dm::insert($inserted);
        }
        $this->index();
    }

}