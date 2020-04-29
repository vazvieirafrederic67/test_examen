<?php


namespace App\Models;


class User
{
    private $id;
    private $name;
    private $house;

 
    public function getHouse()
    {
        return $this->house;
    }


    

  
    public function setHouse($house)
    {
        $this->house = $house;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


}