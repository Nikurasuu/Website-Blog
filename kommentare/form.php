<?php
$titleError = false;
$success = false;

if ($_POST !== []) {
    $username = $_SERVER['PHP_AUTH_USER'];
    $text = $_POST['text'];
    $entries_id = $_GET['id'];

    if ($username === '' or $text === '') {
        $titleError = true;
    } else  {
        include_once __DIR__ . '/../database/Db.php';
        $connection = Db::getConnection();
        $preparedStatement = $connection->prepare('INSERT INTO `comments` ( `entries_id`, `username`, `text`) VALUES (:entries_id, :username, :text);');
        $preparedStatement->bindParam(':entries_id', $entries_id, PDO::PARAM_INT);
        $preparedStatement->bindParam(':username', $username, PDO::PARAM_STR);
        $preparedStatement->bindParam(':text', $text, PDO::PARAM_STR);
        $preparedStatement->execute();
        $success = true;
    }


}
