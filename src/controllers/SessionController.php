<?php

require_once __DIR__ .'/../repository/SessionRepository.php';
require_once __DIR__ .'/../repository/UserRepository.php';
require_once "AppController.php";

class SessionController extends AppController {

    public function logout() {
        $sessionRepository = new SessionRepository();
        $userRepository = new UserRepository();

        if (!isset($_COOKIE['id_user'])) {
            die("user not logged in");
        }

        $user = $userRepository->getUser($_COOKIE['id_user']);

        setcookie("id_user", "", time() - 3600);

        $sessionRepository->logout($user->getId());

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}");
    }
}
