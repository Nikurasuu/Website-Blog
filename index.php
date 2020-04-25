
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BlogProject</title>
    <?php include('templates/assets.php') ?>
</head>

<body>
    <h1 id="Titel">Startseite</h1>
    <?php include ('templates/navigation.php')?>
    <?php include ('list.php')?>
    <ul>
    <?php foreach($results as $result):?>
        <li><a href="/detail/index.php?id=<?= $result['id'] ?>"> <?= $result['title']?></a></li>
    <?php endforeach;?>
    </ul>
</body>
</html>