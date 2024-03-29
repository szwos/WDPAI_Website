<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);



Router::get('', 'DefaultController');
Router::get('recommendation_form', 'DefaultController');
//Router::get("login", "DefaultController");
Router::post("login", "SecurityController");
Router::post("registration", "SecurityController");
Router::post("recommendations", "RecommendationController");
Router::post("dashboard", "RecommendationController");
Router::post("creator", "DefaultController");
Router::post("addRecommendation", "RecommendationController");
Router::get("recommendation_show", "RecommendationController");
Router::get("header", "DefaultController");
Router::post("logout", "SessionController");

Router::run($path);