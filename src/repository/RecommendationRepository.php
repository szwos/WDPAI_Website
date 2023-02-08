<?php

require_once __DIR__.'/../models/Recommendation.php';
require_once __DIR__.'/../models/User.php';
require_once 'Repository.php';

class RecommendationRepository extends Repository
{
    public function addRecommendation(Recommendation $recommendation, User $user) {

        $stmt = $this->database->connect()->prepare( '
            INSERT INTO recommendations (owner, name, "desc", img)
            VALUES (?, ?, ?, ?);
        ');

        $stmt->execute([
            $user->getId(),
            $recommendation->getName(),
            $recommendation->getDesc(),
            $recommendation->getImg()
        ]);
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
        }


        return $results;
    }
}