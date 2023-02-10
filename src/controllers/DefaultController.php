<?php

require_once 'AppController.php';
require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/../repository/SessionRepository.php";
class DefaultController extends AppController{
    public function index() {
        $this->render('index');

    }


    public function creator() {
        $userRepository = new UserRepository();
        $sessionRepository = new SessionRepository();

        if (!isset($_COOKIE['id_user'])) {
            die("user not logged in");
        }

        $user = $userRepository->getUser($_COOKIE['id_user']);

        if(!$sessionRepository->isLogged($user->getId())) {
            die("user not logged in");
        }

        $sessionRepository->update($user->getId());

        $this->render("creator");
    }


    public function header() {
        header('Content-Type: text/html');
        readfile(__DIR__.'/../../public/views/header.html');
        exit();
    }
}