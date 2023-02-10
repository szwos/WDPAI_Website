<?php


require_once "AppController.php";
require_once __DIR__ .'/../models/User.php';
require_once __DIR__ .'/../repository/UserRepository.php';
require_once __DIR__ .'/../repository/SessionRepository.php';

class SecurityController extends AppController {


    public function login() {



        if (isset($_COOKIE['id_user'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard");
        }


        if(!$this->isPost()) {
            return $this->render("login");
        }

        $userRepository = new UserRepository();
        $sessionRepository = new SessionRepository();

        $email = $_POST["email"];
        $user = $userRepository->getUser($email);


        //$user = new User("jankowalski@gmail.com", "password", "Jan", "Kowalski");

        $password = md5($_POST["password"]);



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
        $sessionRepository->login($user->getId());


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");

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

        $user = $userRepository->getUser($email);

        if($user) {
            return $this->render("registration", ["messages"=>["This email address is allready taken!"]]);
        }

        $name = $_POST["name"];
        $surname = $_POST["surname"];

        $userRepository->addUser($name, $surname, $email, md5($password));

        return $this->render("login", ["messages"=>["You have been succesfully registered."]]);
    }

}