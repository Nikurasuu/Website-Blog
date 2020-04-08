<?php include 'form.php' ?>
<?php include '../login.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BlogProject</title>
    <?php include('../templates/assets.php') ?>
</head>
<body>
<img id="logo" src="/assets/cat.jpg" alt="Logo" width="120px">
<h1 id="Titel">Nutzer bearbeiten:</h1>
<?php include ('../templates/navigation.php')?>
<form method="post" enctype="multipart/form-data">
    <div>
        <label for="avatarUpload">Profilbild</label>
    </div>
    <div>
        <input type="file" id="avatarUpload" name="avatar"/>
    </div>
    <div>
        <label for="name">Neuer Name oder alter Name:</label>
    </div>
    <div>
        <input type="text" id="name" name="name" placeholder="Namen eintragen"/>
    </div>
    <div>
        <label for="password">Neues Passwort oder altes Passwort:</label>
    </div>
    <div>
        <input type="password" id="password" name="password" placeholder="Passwort eingeben"></textarea>
    </div>
    <div>
        <label for="password2">Passwort wiederholen</label>
    </div>
    <div>
        <input type="password" id="password2" name="password2" placeholder="Passwort eingeben"></textarea>
    </div>
    <div>
        <label for="email">Neue E-Mail oder alte E-mail</label>
    </div>
    <div>
        <input type="text" id="email" name="email" placeholder="E-Mail Adresse eingeben  "></textarea>
    </div>
    <div>
    <?= $titleError ? '<span class="error">Bitte alles ausfüllen!</span>' : '' ?>
    <?= $success ? '<span class="success">Gespeichert!</span>' : '' ?>
    </div>
    <button type="submit">Speichern</button>
</form>
</body>
</html>
