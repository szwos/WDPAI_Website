<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function index() {
        $this->render('index');

    }

    public function recommendation_form() {
        $this->render('recommendation_form');
    }





    public function creator() {
        $this->render("creator");
    }


    public function header() {
        header('Content-Type: text/html');
        readfile(__DIR__.'/../../public/views/header.html');
        exit();
    }
}