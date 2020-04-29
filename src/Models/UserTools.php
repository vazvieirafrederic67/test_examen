<?php


namespace App\Models;

class UserTools
{

    private $databaseTools;

    public function __construct($databaseTools)
    {
        $this->databaseTools = $databaseTools;
    }

    public function addNewUser($user){
        $params = ["name" => $user->getName()];
        $this->databaseTools->insertQuery('INSERT INTO User (user_name) VALUES (:name)', $params);
    }

    public function getAllUsers(){
        $results = $this->databaseTools->executeQuery('SELECT * FROM User INNER JOIN House ON User.user_house = House.house_id');
        $users = [];
        foreach ($results as $result) {
            $user = new User();
            $user->setId($result['user_id']);
            $user->setName($result['user_name']);

            $house = new House();
            $house->setId($result['house_id']);
            $house->setName($result['house_name']);
            $house->setAdress($result['house_adress']);
            $house->setRooms($result['house_rooms']);

            $user->setHouse($house);

            array_push($users, $user);
        }
        return $users;
    }

    public function getUserByName($name){
        $result = $this->databaseTools->selectByNameInTable('User', $name);
        $user = new User();
        $user->setName($result['user_name']);
        $user->setId($result['user_id']);
        return $user;
    }
}