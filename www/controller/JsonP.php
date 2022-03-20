<?php

$data = null;

class DanglingMarkupController {

	public function index() {

        if (isset($_SESSION['pseudo'])) {
            // user is connected
            $data = Dmjsonp::all();
            include_once "csp/dangling_markup.php";
            include_once "view/header.php";
            include_once "view/dangling_menu.php";
            include_once "view/dangling_markup.php";
            include_once "view/footer.php";
        } else {
            // user is not connected
            $this->login();
        }
	}

    public function clear() {
        Dmjsonp::clear();
        $this->index();
    }

    public function insert() {
        // check if form is submited
        if (isset($_POST['comment']) && !empty($_POST['comment'])) {
            $inserted = [
                "comment" => $_POST['comment']
            ];
            Dmjsonp::insert($inserted);
        }
        $this->index();
    }

    public function register() {


        // check form submission
        if (isset($_POST['pseudo'])) {
            // form has been submited

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $secret_key = "";
            for ($i = 0; $i < 30; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $secret_key .= $characters[$index];
            }

            $data = [
                "pseudo" => $_POST['pseudo'],
                "mail" => $_POST['mail'],
                "password" => $_POST['password'],
                "secret_key" => $secret_key
            ];
            User::insert($data);

        }

        include_once "csp/jsonp.php";
		include_once "view/header.php";
        include_once "view/dangling_menu.php";
		include_once "view/dangling_register.php";
		include_once "view/footer.php";
    }

    public function login() {

        // check user login

        if (isset($_POST['pseudo'])) {
            $pseudo = $_POST['pseudo'];
            $pass = $_POST['password'];
            
            $all_users = User::all();

            foreach ($all_users as $u) {
                if ($u->pseudo == $pseudo && $u->password == $pass) {
                
                    $_SESSION["pseudo"] = $pseudo;
                    $_SESSION["mail"] = $u->mail;
                    $_SESSION["key"] = $u->secret_key;
                }
            }
        }

        if (isset($_SESSION['pseudo'])) {
            $this->index();
        } else {
            include_once "csp/dangling_markup.php";
            include_once "view/header.php";
            include_once "view/dangling_menu.php";
            include_once "view/dangling_login.php";
            include_once "view/footer.php";
        }
    }

    public function disconnect() {    
        session_unset();
        session_destroy(); 
        $this->index();
    }

}