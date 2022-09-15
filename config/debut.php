<?php session_start();
include 'variables.php';
try {
  $db = new PDO(
    'mysql:' . $mysql . '; dbname=' . $dbname . '; charset=utf8',
    $dbuser,
    $dbmdp
  );
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Parent Nelson Mandela</title>
  <link rel="stylesheet" href="style5.css" />
  <link rel="icon" href="./assets/MiniLogo.jpg" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>


<?php

$adminmess = $db->prepare('SELECT * FROM admintexts');
$adminmess->execute();
$adminmessages = $adminmess->fetchAll();
include './headers/header.php';
?>