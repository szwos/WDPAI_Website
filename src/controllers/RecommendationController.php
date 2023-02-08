<?php


require_once "AppController.php";
require_once __DIR__ . "/../models/Recommendation.php";
require_once __DIR__ . "/../repository/RecommendationRepository.php";
require_once __DIR__ . "/../repository/UserRepository.php";
class RecommendationController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ["image/jpg", "image/png"];
    const UPLOAD_DIRECTORY = "/../public/uploads/";
    private $messages = [];

    private $recommendationRepository;
    private $userRepository;
    public function __construct() {
        parent::__construct();
        $this->recommendationRepository = new RecommendationRepository();
        $this->userRepository = new UserRepository();
    }

    public function addRecommendation() {

        if (!isset($_COOKIE['id_user'])) {
            die("user not logged in");
        }

        if($this->isPost() && is_uploaded_file($_FILES["img"]["tmp_name"]) && $this->validate($_FILES["img"])) {
            move_uploaded_file(
              $_FILES["img"]["tmp_name"],
              dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES["img"]["name"]
            );

            $user = $this->userRepository->getUser($_COOKIE['id_user']);

            $owner = $user->getId();
            $recommendation = new Recommendation($_POST["name"], $_POST["desc"], $_FILES["img"]["name"], $owner);


            $this->recommendationRepository->addRecommendation($recommendation, $user);

            return $this->render("creator", ["messages" =>["recommendation added successfully!"]]);
        }

        $this->render("creator", ["messages" => $this->messages]);

    }

    private function validate(array $file) : bool
    {
        if($file["size"] > self::MAX_FILE_SIZE) {
            $this->messages[] = "File is too large for destination file system.";
            return false;
        }

        if(!isset($file["type"]) && !in_array($file["type"], self::SUPPORTED_TYPES)) {
            $this->messages[] = "File type is not supported.";
            return false;
        }

        return true;
    }


    //TODO: remove
    public function recommendations() {

        $recommendations = $this->recommendationRepository->getRecommendations();
        $this->render("recommendations", ["recommendations"=>$recommendations]);
    }

    public function dashboard() {

        $recommendations = $this->recommendationRepository->getRecommendations();
        $this->render("dashboard", ["recommendations"=>$recommendations]);
    }
}