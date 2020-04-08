<?php
$titleError = false;
$success = false;

if ($_POST !== []) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if ($name === '' or $password === '') {
        $titleError = true;
    } else if($password === $password2) {
        include __DIR__ . '/../database/Db.php';
        $connection = Db::getConnection();
        $sql = "SELECT name FROM users WHERE name = :name";
        $preparedStatement = $connection->prepare($sql);
        $preparedStatement->bindParam(':name', $name, PDO::PARAM_STR);
        $preparedStatement->execute();
        $result = $preparedStatement->fetch();

        if($result === false) {
            $preparedStatement = $connection->prepare('INSERT INTO `users` ( `name`, `password`, `email`) VALUES (:name, :passwordHash,:email);');
            $preparedStatement->bindParam(':name', $name, PDO::PARAM_STR);
            $preparedStatement->bindParam(':passwordHash', $passwordHash, PDO::PARAM_STR);
            $preparedStatement->bindParam(':email', $email, PDO::PARAM_STR);
            $preparedStatement->execute();
            move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . '/avatars/' .$name );
            $success = true;
        } else {
            echo ('Benutzername ist schon vorhanden!');
        }
    } else {
        echo("<p>Passwörter stimmen nicht überein!</p>");
    }


}
