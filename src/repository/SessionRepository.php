<?php

class SessionRepository extends Repository
{
    public function login($user) {
        //TODO insert user id or email to db
    }

    public function update($user) {
        //TODO update time on user by id or email
    }

    public function isLogged($user) {
        //TODO: check if matching record is in db
    }

    public function logout($user) {
        //TODO: delete matching record from db
    }
}