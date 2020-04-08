<?php
$titleError = false;
$success = false;

include __DIR__ . '/../vendor/autoload.php';

if ($_POST !== []) {
    $title = $_POST['title'];
    $text = $_POST['text'];
    $username = $_SERVER['PHP_AUTH_USER'];

    if ($title === '' or $text === '') {
        $titleError = true;
    } else {
        include __DIR__ . '/../database/Db.php';
        $connection = Db::getConnection();
        $preparedStatement = $connection->prepare('INSERT INTO `entries` ( `title`, `text`, `author`) VALUES (:title, :text, :author);');
        $preparedStatement->bindParam(':title', $title, PDO::PARAM_STR);
        $preparedStatement->bindParam(':text', $text, PDO::PARAM_STR);
        $preparedStatement->bindParam(':author', $username, PDO::PARAM_STR);
        $preparedStatement->execute();
        $pictureId = $connection->lastInsertId();
        move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__. '../uploadedImages/'.$pictureId );
        $success = true;
    }


}
