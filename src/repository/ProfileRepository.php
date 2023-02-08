<?php

require_once __DIR__.'/../models/Profile.php';
require_once __DIR__.'/../models/User.php';

class ProfileRepository extends Repository
{
    public function getProfile(User $user) {

        $stat = $this->database->connect()->prepare('
            SELECT profiles.*
            FROM profiles
            INNER JOIN users ON profiles.id = users.profile
            WHERE users.id = :id;
        ');


        $id = $user->getId();
        $stat->bindParam("id", $id, PDO::PARAM_INT);
        $stat->execute();

        $profileDict = $stat->fetch(PDO::FETCH_ASSOC);

        if($profileDict == false) {
            return null;
        }

        return new Profile(
            $profileDict["story"],
            $profileDict["gameplay"],
            $profileDict["graphics"],
            $profileDict["climate"],
            $profileDict["music"]
        );
    }

    //update or insert new if doesn't exist
    public function upsertProfile(User $user, Profile $profile) {
        $stat = $this->database->connect()->prepare('
            SELECT profile FROM users WHERE id = :user_id;
        ');

        $id = $user->getId();
        $stat->bindParam("user_id", $id, PDO::PARAM_STR);
        $stat->execute();

        $id_profile = $stat->fetchColumn();

        $story = $profile->getStory();
        $gameplay = $profile->getGameplay();
        $graphics = $profile->getGraphics();
        $climate = $profile->getClimate();
        $music = $profile->getMusic();

        if(empty($id_profile)) {
            //add profile, then take newly created profile id and assign it to user's profile
                $stat = $this->database->connect()->prepare('
                    WITH new_profile AS (
                        INSERT INTO public.profiles (story, gameplay, graphics, climate, music)
                        VALUES (:story, :gameplay, :graphics, :climate, :music)
                        RETURNING id
                    )
                    UPDATE public.users
                    SET profile = (SELECT id FROM new_profile)
                    WHERE id = :id;
                ');

            $stat->bindParam("story", $story, PDO::PARAM_STR);
            $stat->bindParam("gameplay", $gameplay, PDO::PARAM_STR);
            $stat->bindParam("graphics", $graphics, PDO::PARAM_STR);
            $stat->bindParam("climate", $climate, PDO::PARAM_STR);
            $stat->bindParam("music", $music, PDO::PARAM_STR);
            $stat->bindParam("id", $id, PDO::PARAM_INT);

            $stat->execute();

        } else {
            //update user's profile
            $stat = $this->database->connect()->prepare('
                UPDATE public.profiles
                SET story = :story, gameplay = :gameplay, graphics = :graphics, climate = :climate, music = :music
                WHERE id = :id;

                ');

            $stat->bindParam("story", $story, PDO::PARAM_STR);
            $stat->bindParam("gameplay", $gameplay, PDO::PARAM_STR);
            $stat->bindParam("graphics", $graphics, PDO::PARAM_STR);
            $stat->bindParam("climate", $climate, PDO::PARAM_STR);
            $stat->bindParam("music", $music, PDO::PARAM_STR);
            $stat->bindParam("id", $id_profile, PDO::PARAM_INT);

            $stat->execute();

        }
    }
}