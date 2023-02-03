<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function index() {
        //TODO display index.html
        $this->render('index');

    }

    public function recomendation_form() {
        //TODO display recomendation-form.html
        $this->render('recomendation_form');
    }
}