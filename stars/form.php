<?php
$titleError = false;
$success = false;

include_once __DIR__ . '/../database/Db.php';
$connection = Db::getConnection();

$username = $_SERVER['PHP_AUTH_USER'];
$entries_id = $_GET['id'];

$preparedStatement = $connection->prepare('SELECT `id` FROM `users` WHERE name = :name ');
$preparedStatement->bindParam(':name', $username, PDO::PARAM_STR);
$preparedStatement->execute();
$getUserId = $preparedStatement->fetch();
$userId = intval($getUserId["id"]);

if ($_POST !== []) {
    $stars = $_POST['bewertung'];
    $entries_id = $_GET['id'];



    if ($username === '' or $stars === '') {
        $titleError = true;
    } else  {
        $stars = intval($stars);
        $entries_id = intval($entries_id);
        $preparedStatement = $connection->prepare('INSERT INTO `stars` ( `entries_id`, `user_id`, `stars`) VALUES (:entries_id, :user_id, :stars);');
        $preparedStatement->bindParam(':entries_id', $entries_id, PDO::PARAM_INT);
        $preparedStatement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $preparedStatement->bindParam(':stars', $stars, PDO::PARAM_INT);
        $preparedStatement->execute();
        $success = true;
    }


}
