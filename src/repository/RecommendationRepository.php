<?php

require_once __DIR__.'/../models/Recommendation.php';
require_once __DIR__.'/../models/Profile.php';
require_once __DIR__.'/../models/User.php';
require_once 'Repository.php';

class RecommendationRepository extends Repository
{
    public function addRecommendation(Recommendation $recommendation, Profile $profile, User $user) {

        $stmt = $this->database->connect()->prepare( '
            INSERT INTO recommendations (owner, name, "desc", img, story, gameplay, graphics, climate, music)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);
        ');

        $stmt->execute([
            $user->getId(),
            $recommendation->getName(),
            $recommendation->getDesc(),
            $recommendation->getImg(),
            $profile->getStory(),
            $profile->getGameplay(),
            $profile->getGraphics(),
            $profile->getClimate(),
            $profile->getMusic()
        ]);
    }

    public function getRecommendation($id) : Recommendation {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recommendations WHERE id = :id;
        ');

        $stmt->bindParam("id", $id, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $result = $result[0];

        $recommendation = new Recommendation(
            $result["name"],
            $result["desc"],
            $result["img"],
            $result["owner"]
        );
        $recommendation->setId($result["id"]);


        return $recommendation;
    }

    public function getProfile($id) : Profile {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recommendations WHERE id = :id;
        ');

        $stmt->bindParam("id", $id, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $result = $result[0];

        $profile = new Profile(
            $result["story"],
            $result["gameplay"],
            $result["graphics"],
            $result["climate"],
            $result["music"]

        );


        return $profile;
    }

    public function getRecommendations() : array {
        $results = [];

        $stmt = $this->database->connect()->prepare( '
            SELECT * FROM recommendations;
        ');
        $stmt->execute();
        $recommendations = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($recommendations as $recommendation) {
            $results[] = new Recommendation(
                $recommendation["name"],
                $recommendation["desc"],
                $recommendation["img"],
                $recommendation["owner"]
            );
            $results[count($results) - 1]->setId($recommendation["id"]);
        }


        return $results;
    }
}