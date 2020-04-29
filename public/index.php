<?php

use App\Models\HouseTools;
use App\Models\UserTools;
use App\Tools\DevTools;
use App\Tools\LibsLoader;
use App\Tools\DatabaseTools;
use App\Models\User;

$loader = require '../vendor/autoload.php';

//instancier et appeller les librairies externes
$libsLoader = new LibsLoader();
$libsLoader->loadLibraries();

//instancier un devTool
$tools = new DevTools();

//instancier un tool pour pouvoir utiliser la BDD
$dbTools = new DatabaseTools("127.0.0.1", "poo", "root", "");

//instancier un tool qui fera référence à un model User
$userTools = new UserTools($dbTools);
$houseTools = new HouseTools($dbTools);

$users = $userTools->getAllUsers();
$houses = $houseTools->getAllHouses();

//$tools->prettyVarDump($houses);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css" >
    <title>Document</title>
</head>
<body>
<h4>les gens qui sont dans la maison du plaisir</h4>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">House name</th>
        <th scope="col">House adress</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($users as $user) {
        if($user->getHouse()->getName() === 'Le ranch du plaisir') {?>
        <tr>
            <td><?= $user->getId() ?></td>
            <td><?= $user->getName() ?></td>
            <td><?= $user->getHouse()->getName() ?></td>
            <td><?= $user->getHouse()->getAdress() ?></td>
        </tr>
    <?php }} ?>
    </tbody>
</table>

<h4>les gens qui sont dans le donjond des suplices</h4>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">House name</th>
        <th scope="col">House adress</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($users as $user) {
        if($user->getHouse()->getName() === 'Le donjon de la souffrance') {?>
            <tr>
                <td><?= $user->getId() ?></td>
                <td><?= $user->getName() ?></td>
                <td><?= $user->getHouse()->getName() ?></td>
                <td><?= $user->getHouse()->getAdress() ?></td>
            </tr>
        <?php }} ?>
    </tbody>
</table>

<h4>Les maisons disponibles</h4>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Adresse</th>
        <th scope="col">Rooms</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($houses as $house) {
        ?>
            <tr>
                <td><?= $house->getId() ?></td>
                <td><?= $house->getName() ?></td>
                <td><?= $house->getAdress() ?></td>
                <td><?= $house->getRooms() ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
