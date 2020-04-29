<?php


namespace App\Models;

class HouseTools
{


    private $databaseTools;

    public function __construct($databaseTools)
    {
        $this->databaseTools = $databaseTools;
    }

    public function getAllHouses(){
        $results = $this->databaseTools->executeQuery('SELECT * FROM house');
        
        $houses = [];
        foreach ($results as $result) {
            $house = new House();
            $house->setId($result['house_id']);
            $house->setName($result['house_name']);
            $house->setAdress($result['house_adress']);
            $house->setRooms($result['house_rooms']);
    
            array_push($houses, $house);
        }
        return $houses;
        
    }








}