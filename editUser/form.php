<?php
$titleError = false;
$success = false;

include __DIR__ . '/../database/Db.php';
$connection = Db::getConnection();

$oldName = $_SERVER['PHP_AUTH_USER'];

$sql = "SELECT id FROM users WHERE name = :name";
$preparedStatement = $connection->prepare($sql);
$preparedStatement->bindParam(':name', $oldName, PDO::PARAM_STR);
$preparedStatement->execute();
$userId = $preparedStatement->fetch();
$userId = intval($userId['id']);

if ($_POST !== []) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if ($name === '' or $password === '') {
        $titleError = true;
    } else if($password === $password2) {
        $connection = Db::getConnection();
        $sql = "SELECT name FROM users WHERE name = :name";
        $preparedStatement = $connection->prepare($sql);
        $preparedStatement->bindParam(':name', $name, PDO::PARAM_STR);
        $preparedStatement->execute();
        $result = $preparedStatement->fetch();

        if ($oldName === $name){
            $result = false;
        }

        if($result === false) {
            $connection = Db::getConnection();
            $preparedStatement = $connection->prepare('UPDATE `users` SET `name` = :name, `email` = :email, `password` = :passwordHash WHERE `users`.`id` = :userId;');
            $preparedStatement->bindParam(':name', $name, PDO::PARAM_STR);
            $preparedStatement->bindParam(':passwordHash', $passwordHash, PDO::PARAM_STR);
            $preparedStatement->bindParam(':email', $email, PDO::PARAM_STR);
            $preparedStatement->bindParam(':userId', $userId, PDO::PARAM_INT);
            $preparedStatement->execute();
            move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . '/../createUser/avatars/' .$name );
            $success = true;
            echo '<p>Erfolgreich Benutzer bearbeitet!</p>';
            echo '<p><a href="/index.php"> Zurück zur Startseite</a> </p>';
            exit();

        } else {
            echo ('Benutzername ist schon vorhanden!');
        }
    } else {
        echo("<p>Passwörter stimmen nicht überein!</p>");
    }


}
