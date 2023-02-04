<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function index() {
        $this->render('index');

    }

    public function recommendation_form() {
        $this->render('recommendation_form');
    }

    public function login() {
        $this->render("login", ['message'=>"Hello World"]);
    }

    public function recommendations() {
        $this->render("recommendations");
    }

    public function registration() {
        $this->render("registration");
    }

    public function dashboard() {
        $this->render("dashboard");
    }

    public function creator() {
        $this->render("creator");
    }

}