<?php

$imageData = null;

class ImageController {

	public function index() {
		$imageData = I::all();
		include_once "csp/image.php";
		include_once "view/header.php";
		include_once "view/image.php";
		include_once "view/footer.php";
	}

    public function clear() {
        I::clear();
        $this->index();
    }

    public function insert() {
        // check if form is submited
        if (isset($_POST['imageSrc']) && !empty($_POST['imageSrc'])) {
            $inserted = [
                "src" => $_POST['imageSrc']
            ];
            I::insert($inserted);
        }
        $this->index();
    }

}