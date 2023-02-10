<?php

class Recommendation
{
    private $name;
    private $desc;
    private $img;

    private $owner_id;
    private $id;


    public function __construct($name, $desc, $img, $owner_id)
    {
        $this->name = $name;
        $this->desc = $desc;
        $this->img = $img;
        $this->owner_id = $owner_id;
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

    public function getOwnerId()
    {
        return $this->owner_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}