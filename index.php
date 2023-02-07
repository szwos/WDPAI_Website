<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);



Router::get('', 'DefaultController');
Router::get('recommendation_form', 'DefaultController');
//Router::get("login", "DefaultController");
Router::post("login", "SecurityController");
Router::post("registration", "SecurityController");
Router::get("recommendations", "DefaultController");
Router::post("dashboard", "SecurityController");
Router::post("creator", "DefaultController");
Router::post("addRecommendation", "RecommendationController");

Router::run($path);