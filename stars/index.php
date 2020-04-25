<?php include 'form.php' ?>
<?php include('../login.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BlogProject</title>
    <?php include('../templates/assets.php') ?>
</head>
<body>
<h1 id="Titel">Bewertung abgeben:</h1>
<?php include ('../templates/navigation.php')?>
<form method="post" enctype="multipart/form-data">
    <div>
        <label for="bewertung">Bewertung:</label>
    </div>
    <div>
        <p>Achtung! Du kannst nur einmal pro Beitrag Bewerten. Alle weiteren Bewertungen werden von der Datenbank ignoriert!</p>
    </div>
    <div>
        <input type="range" id="bewertung" name="bewertung" min="1" max="5"></input>
    </div>
    <div>
    <?= $success ? '<span class="success">Gespeichert!</span>' : '' ?>
    </div>
    <button type="submit">Speichern</button>
</form>
</body>
</html>
