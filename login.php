<?php
$correctLogin = false;

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Achte auf eine gesicherte Verbindung!"');
    header('HTTP/1.0 401 Unauthorized');
    echo '<p>Fehler beim Login!</p>';
    echo '<p><a href="/index.php"> Zurück zur Startseite</a> </p>';
    exit;
} else {
    $name = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];
    if ($correctLogin === false) {

        include_once __DIR__ . '/database/Db.php';
        $connection = Db::getConnection();

        $sql = "SELECT password FROM users WHERE name = :name";
        $preparedStatement = $connection->prepare($sql);
        $preparedStatement->bindParam(':name', $name, PDO::PARAM_STR);
        $preparedStatement->execute();
        $hashArray = $preparedStatement->fetch();
        $hash = $hashArray["password"];

        $sql = "SELECT unlocked FROM users WHERE name = :name";
        $preparedStatement = $connection->prepare($sql);
        $preparedStatement->bindParam(':name', $name, PDO::PARAM_STR);
        $preparedStatement->execute();
        $checkUnlocked = $preparedStatement->fetch();

        //var_dump($checkUnlocked);

        if (password_verify($password, $hash)) {
            $correctLogin = true;
            echo "<p>Hallo {$_SERVER['PHP_AUTH_USER']}.</p>";
        } else {
            echo "<p>Falscher Benutzername oder falsches Passwort!</p>";
            header('WWW-Authenticate: Basic realm="Falsches Passwort oder falscher Nutzername!"');
            header('HTTP/1.0 401 Unauthorized');
            die();
        }
    }
}
?>