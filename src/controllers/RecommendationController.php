<?php


require_once "AppController.php";
require_once __DIR__ . "/../models/Recommendation.php";
require_once __DIR__ . "/../models/Profile.php";
require_once __DIR__ . "/../repository/RecommendationRepository.php";
require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/../repository/SessionRepository.php";
class RecommendationController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ["image/jpg", "image/png"];
    const UPLOAD_DIRECTORY = "/../public/uploads/";
    private $messages = [];

    private $recommendationRepository;
    private $userRepository;
    private $sessionRepository;
    public function __construct() {
        parent::__construct();
        $this->recommendationRepository = new RecommendationRepository();
        $this->userRepository = new UserRepository();
        $this->sessionRepository = new SessionRepository();
    }

    public function addRecommendation() {

        if (!isset($_COOKIE['id_user'])) {
            die("user not logged in");
        }

        $user = $this->userRepository->getUser($_COOKIE['id_user']);

        if(!$this->sessionRepository->isLogged($user->getId())) {
            die("user not logged in");
        }

        $this->sessionRepository->update($user->getId());

        if($this->isPost() && is_uploaded_file($_FILES["img"]["tmp_name"]) && $this->validate($_FILES["img"])) {
            move_uploaded_file(
              $_FILES["img"]["tmp_name"],
              dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES["img"]["name"]
            );


            $owner = $user->getId();

            $recommendation = new Recommendation(
                $_POST["name"],
                $_POST["desc"],
                $_FILES["img"]["name"],
                $owner);
            $profile = new Profile(
                $_POST["story"],
                $_POST["gameplay"],
                $_POST["graphics"],
                $_POST["climate"],
                $_POST["music"]
            );


            $this->recommendationRepository->addRecommendation($recommendation, $profile, $user);
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


    public function dashboard() {

        if (!isset($_COOKIE['id_user'])) {
            die("user not logged in");
        }

        $user = $this->userRepository->getUser($_COOKIE['id_user']);

        if(!$this->sessionRepository->isLogged($user->getId())) {
            die("user not logged in");
        }

        $this->sessionRepository->update($user->getId());

        $recommendations = $this->recommendationRepository->getRecommendations();
        $this->render("dashboard", ["recommendations"=>$recommendations]);
    }

    public function recommendation_show() {

        if (!isset($_COOKIE['id_user'])) {
            die("user not logged in");
        }

        $user = $this->userRepository->getUser($_COOKIE['id_user']);

        if(!$this->sessionRepository->isLogged($user->getId())) {
            die("user not logged in");
        }

        $this->sessionRepository->update($user->getId());

        $recommendation = $this->recommendationRepository->getRecommendation($_POST["recommendation"]);
        $profile = $this->recommendationRepository->getProfile($_POST["recommendation"]);

        $this->render("recommendation_show", [
            "recommendation"=>[
                $recommendation->getName(),
                $this->userRepository->getUserById($recommendation->getOwnerId())->getName(),
                $this->userRepository->getUserById($recommendation->getOwnerId())->getSurname(),
                $recommendation->getImg(),
                $profile->getStory(),
                $profile->getGameplay(),
                $profile->getGraphics(),
                $profile->getClimate(),
                $profile->getMusic(),
                $recommendation->getDesc()
            ]
        ]);
    }
}