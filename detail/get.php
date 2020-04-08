<?php
include __DIR__ . '/../database/Db.php';
$connection = Db::getConnection();
$number = (int) $_GET['id'];
$sql = "SELECT title,text,author FROM entries WHERE id = :number";
$preparedStatement = $connection->prepare($sql);
$preparedStatement->bindParam(':number', $number, PDO::PARAM_INT);
$preparedStatement->execute();
$result = $preparedStatement->fetch();

$sql = "SELECT username,text FROM comments WHERE entries_id = :number";
$preparedStatement = $connection->prepare($sql);
$preparedStatement->bindParam(':number', $number, PDO::PARAM_INT);
$preparedStatement->execute();
$comments = $preparedStatement->fetchAll();

$noStars = false;

$sql = "SELECT stars FROM stars WHERE entries_id = :number";
$preparedStatement = $connection->prepare($sql);
$preparedStatement->bindParam(':number', $number, PDO::PARAM_INT);
$preparedStatement->execute();
$stars = $preparedStatement->fetchAll();
$allStars = 0;
$howManyStars = 0;

foreach($stars as $star){
    $allStars = $allStars + $star['stars'];
    $howManyStars++;
}

if($allStars == 0){
    $noStars = true;
} else {
    $averageStars = $allStars / $howManyStars;
    $averageStars = round($averageStars);
}

$sql = "SELECT clicks FROM entries WHERE id = :number";
$preparedStatement = $connection->prepare($sql);
$preparedStatement->bindParam(':number', $number, PDO::PARAM_INT);
$preparedStatement->execute();
$oldClicks = $preparedStatement->fetch();
$oldClicks = intval($oldClicks['clicks']);
$newClick = $oldClicks + 1;
$sql = "UPDATE `entries` SET `clicks` = $newClick WHERE `entries`.`id` = :number";
$preparedStatement = $connection->prepare($sql);
$preparedStatement->bindParam('number', $number, PDO::PARAM_INT);
$preparedStatement->execute();

if(empty($result)){
    http_response_code(404);
    die();
}