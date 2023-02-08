<?php


require_once "AppController.php";
require_once __DIR__ . "/../models/Recommendation.php";
class RecommendationController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ["image/jpg", "image/png"];
    const UPLOAD_DIRECTORY = "/../public/uploads/";
    private $messages = [];

    private $recommendationRepository;
    public function addRecommendation() {

        if($this->isPost() && is_uploaded_file($_FILES["file"]["tmp_name"]) && $this->validate($_FILES["file"])) {
            move_uploaded_file(
              $_FILES["file"]["tmp_name"],
              dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES["file"]["name"]
            );

            $recommendation = new Recommendation($_POST["name"], $_POST["desc"], $_FILES["file"]["name"]);





            return $this->render("dashboard", ["messages" => $this->messages, "game"=>$game]);
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
}