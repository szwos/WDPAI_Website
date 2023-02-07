<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {
    public function getUser(string $email) {
        $stat = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email;
        ');

        $stat->bindParam("email", $email, PDO::PARAM_STR);
        $stat->execute();

        $user = $stat->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user["email"],
            $user["password"],
            $user["name"],
            $user["surname"]
        );

    }

    public function addUser(string $name, string $surname, string $email, string $password) {

        $stmt = $this->database->connect()->prepare("
            INSERT INTO users (name, surname, email, password)
            VALUES (?, ?, ?, ?)
        ");

        $stmt->execute([
           $name, $surname, $email, $password
        ]);


    }
}