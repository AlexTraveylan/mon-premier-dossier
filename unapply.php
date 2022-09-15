<?php include './config/debut2.php';

$sqlQuery = 'UPDATE utilisateurs SET inscrit = 0 WHERE user_id=?';
$apply = $db->prepare($sqlQuery);
$apply->execute([$_SESSION['user_id']]);

$_SESSION['inscrit']=0;

header('Location: ' . $dossier . 'event.php');
      exit();

?>