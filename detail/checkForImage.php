<?php
$pictureExists = file_exists("C:/xampp/htdocs/BlogProject/uploadedImages/".$number);
var_dump($pictureExists);

if ($pictureExists === true) {
    echo '<img id="picture" src="/BlogProject/uploadedImages/<?=$number?>" alt="test">';
}