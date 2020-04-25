<?php include ('get.php')?>
<?php include ('stars.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $result['title']?></title>
    <?php include('../templates/assets.php') ?>
</head>
<body>
    <?php include ('../templates/navigation.php')?>
    <div id="container">
        <?php if (file_exists("../uploadedImages/".$number)):?>
            <img id="picture" src="/uploadedImages/<?=$number?>" alt="test" height="320px" >
        <?php endif; ?>
        <h2><?= $result['title']?></h2>
        <?= $result['text']?>
        <p>geschrieben von <?= $result['author']?></p>
        <p>Dieser Beitrag wurde <?= $oldClicks?> Mal aufgerufen!</p>
        <h2>Bewertungen:</h2>
        <?php if ($noStars == false):?>
            <?php echo sternebewertung($averageStars)?>
        <?php endif; ?>
        <?php if ($noStars == true):?>
            <p>Noch keine Bewertung vorhanden!</p>
        <?php endif; ?>
        <p id="bewertung"><a href="/stars/index.php?id=<?=$number?>">Bewertung abgeben.</a></p>
        <h2>Kommentare:</h2>
        <p id="button"><a href="/kommentare/index.php?id=<?=$number?>">Kommentar schreiben.</a></p>
        <?php foreach($comments as $comment):?>
            <?php if (file_exists("../createUser/avatars/".$comment['username'])):?>
                <img id="avatar" src="/createUser/avatars/<?=$comment['username']?>" alt="Avatar" height="32" width="32" >
            <?php endif; ?>
            <h2><?= $comment['username']?>:</h2>
            <p><?= $comment['text']?></p>
        <?php endforeach;?>
    </div>
</body>
</html>