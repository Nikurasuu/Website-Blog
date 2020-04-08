<?php
include __DIR__ . '/vendor/autoload.php';

use FroalaEditor\Image;

$response = Image::upload('/BlogProject/uploadedImages/');
echo stripslashes(json_encode($response));