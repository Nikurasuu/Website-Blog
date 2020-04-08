<?php include 'form.php' ?>
<?php include('../login.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BlogProject</title>
    <?php include('../templates/assets.php') ?>
    
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

</head>
<body>
<img id="logo" src="../assets/cat.jpg" alt="Logo" width="120px">
<h1 id="Titel">Neuen Eintrag erstellen:</h1>
<?php include ('../templates/navigation.php')?>
<form method="post" enctype="multipart/form-data">

    <div>
        <label for="title">Überschrift</label>
    </div>
    <div>
        <input type="text" id="title" name="title" placeholder="Titel eingeben"/>
    </div>

    <textarea id="summernote" name="text"></textarea>

    <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>

    <div>
    <?= $titleError ? '<span class="error">Kein Titel oder Text!</span>' : '' ?>
    <?= $success ? '<span class="success">Gespeichert!</span>' : '' ?>
    </div>

    <button type="submit">Speichern</button>
</form>

</body>
</html>
