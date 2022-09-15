<?php session_start(); 
include 'variables.php';
try
   {
    $db = new PDO('mysql:' . $mysql . '; dbname=' . $dbname . '; charset=utf8', 
    $dbutilisateur, 
    $dbmdp);
  }
   catch (Exception $e)
  {
         die('Erreur : ' . $e->getMessage());
  } 
 ?>