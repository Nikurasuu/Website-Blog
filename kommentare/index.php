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
<img id="logo" src="/assets/cat.jpg" alt="Logo" width="120px">
<h1 id="Titel">Kommentar erstellen:</h1>
<?php include ('../templates/navigation.php')?>
<form method="post" enctype="multipart/form-data">
    <div>
        <label for="text">Text</label>
    </div>
    <div>
        <textarea id="text" name="text" rows="20" cols="200" placeholder="Text eingeben."></textarea>
    </div>
    <div>
    <?= $titleError ? '<span class="error">Kein Titel oder Text!</span>' : '' ?>
    <?= $success ? '<span class="success">Gespeichert!</span>' : '' ?>
    </div>
    <button type="submit">Speichern</button>
</form>
</body>
</html>
