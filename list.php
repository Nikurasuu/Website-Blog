<?php
include __DIR__ . '/database/Db.php';
$connection = Db::getConnection();
$sql = "SELECT title,id FROM entries ORDER BY `entries`.`id` DESC";
$query = $connection->query($sql);
$results = $query->fetchAll();