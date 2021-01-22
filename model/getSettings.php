<?php
// GETING SITE DEFAULT SEETINGS AND ADMIN INFO

require_once 'connection.php';
$sql = "SELECT * FROM `sitesettings` WHERE id = 1";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$resultSettings = $stmt->fetch();

// var_dump($resultSettings);



