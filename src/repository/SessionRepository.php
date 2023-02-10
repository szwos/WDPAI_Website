<?php

class SessionRepository extends Repository
{
    public function login(int $user) {
        $stmt = $this->database->connect()->prepare( '
            INSERT INTO public.sessions (id, time)
            VALUES (?, ?);
        ');

        $stmt->execute([
            $user,
            date('Y-m-d H:i:s')
        ]);
    }

    public function update($user) {
        $stmt = $this->database->connect()->prepare('
        UPDATE public.sessions
        SET "time" = current_timestamp
        WHERE id = :id;
        ');

        $stmt->bindParam("id", $user);
        $stmt->execute();
    }

    public function isLogged($user) : bool {
        $stmt = $this->database->connect()->prepare('
            SELECT EXISTS (SELECT 1 FROM public.sessions WHERE id = ?)
        ');

        $stmt->execute([$user]);
        $result = $stmt->fetchColumn();

        return $result;
    }

    public function logout($user) {
        $stmt = $this->database->connect()->prepare( '
            DELETE FROM public.sessions WHERE id = ?;
        ');

        $stmt->execute([$user]);
        
    }
}