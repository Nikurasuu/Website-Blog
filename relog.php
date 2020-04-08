<?php
$correctLogin = false;

    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo '<p>Erfolgreich abgemeldet!</p>';
    echo '<p><a href="/index.php"> Zurück zur Startseite</a> </p>';
    exit;

    $name = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];
    if ($correctLogin === false) {

        include_once __DIR__ . '/database/Db.php';
        $connection = Db::getConnection();

        $sql = "SELECT password FROM users WHERE name = :name AND password = :password";
        $preparedStatement = $connection->prepare($sql);
        $preparedStatement->bindParam(':name', $name, PDO::PARAM_STR);
        $preparedStatement->bindParam(':password', $password, PDO::PARAM_STR);
        $preparedStatement->execute();
        $checkLogin = $preparedStatement->fetch();
        //var_dump($checkLogin);

        if ($checkLogin == true ) {
            $correctLogin = true;
            echo "<p>Hallo {$_SERVER['PHP_AUTH_USER']}.</p>";
            die();
        } else {
            echo "<p>Falscher Benutzername oder falsches Passwort!</p>";
            echo '<p><a href="/index.php"> Zurück zur Startseite</a> </p>';
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');

        }
    }

?>