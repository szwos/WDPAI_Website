<?php

class Profile
{
    private $story;
    private $gameplay;
    private $graphics;
    private $climate;
    private $music;


    public function getStory()
    {
        return $this->story;
    }

    public function getGameplay()
    {
        return $this->gameplay;
    }

    public function getGraphics()
    {
        return $this->graphics;
    }

    public function getClimate()
    {
        return $this->climate;
    }

    public function getMusic()
    {
        return $this->music;
    }

    public function __construct($story, $gameplay, $graphics, $climate, $music)
    {
        $this->story = $story;
        $this->gameplay = $gameplay;
        $this->graphics = $graphics;
        $this->climate = $climate;
        $this->music = $music;
    }


}