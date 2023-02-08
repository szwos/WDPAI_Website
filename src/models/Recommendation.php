<?php

class Recommendation
{
    private $name;
    private $desc;
    private $img;

    //TODO: some data type deciding on simliarity to other games
    //TODO: up /\ maybe a dict, which key is UUID of other game from DB, and value is array of similiarity weights [music, gameplay...]
    //TODO: up /\ e.g   {1:[1, 5, 8, 2, 4], 2:[4, 2, 7, 3, 5] ...}


    public function __construct($name, $desc, $img)
    {
        $this->name = $name;
        $this->desc = $desc;
        $this->img = $img;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }


    public function getDesc() : string
    {
        return $this->desc;
    }

    public function setDesc(string $desc)
    {
        $this->desc = $desc;
    }

    public function getImg() : string
    {
        return $this->img;
    }

    public function setImg(string $img)
    {
        $this->img = $img;
    }


}