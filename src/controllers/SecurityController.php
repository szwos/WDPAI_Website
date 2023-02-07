<?php


require_once "AppController.php";
require_once __DIR__ .'/../models/User.php';
require_once __DIR__ .'/../repository/UserRepository.php';
class SecurityController extends AppController {


    public function login() {

        if(!$this->isPost()) {
            return $this->render("login");
        }



        //$user = new User("jankowalski@gmail.com", "password", "Jan", "Kowalski");
        $userRepository = new UserRepository();
        $email = $_POST["email"];
        $password = md5($_POST["password"]);

        $user = $userRepository->getUser($email);

        if(!$user){
            return $this->render("login", ["messages"=>["user does not exist!"]]);
        }

        if($user->getEmail() !== $email) {
            return $this->render("login", ["messages" => ["User with this email does not exist."]]);
        }

        if($user->getPassword() !== $password) {
            return $this->render("login", ["messages" => ["Wrong password."]]);
        }

        setcookie('id_user', $user->getEmail(), time() + (60 * 30), "/");

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");

 //       return $this->render("dashboard", ["values" => [1, 2, 3, 4, 5]]);
    }

    public function registration() {

        //TODO enforce that form is complete


        if(!$this->isPost()) {
            return $this->render("registration");
        }


        $userRepository = new UserRepository();
        $password = $_POST["password"];
        $password_repeat = $_POST["password-repeat"];
        $email = $_POST["email"];

        if($password !== $password_repeat) {
            return $this->render("registration", ["messages" => ["Passwords doesn't match!"]]);
        }

        //TODO: change this into something like findIfUserExists()
        $user = $userRepository->getUser($email);

        if($user) {
            return $this->render("registration", ["messages"=>["This email address is allready taken!"]]);
        }

        $name = $_POST["name"];
        $surname = $_POST["surname"];

        $userRepository->addUser($name, $surname, $email, md5($password));

        return $this->render("login", ["messages"=>["You have been succesfully registered."]]);
    }

    public function dashboard() {

        if (!isset($_COOKIE['id_user'])) {
            die("user not logged in");
        }

        return $this->render("dashboard");
    }

}