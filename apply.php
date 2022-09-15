<?php include './config/debut2.php';

$sqlQuery = 'UPDATE utilisateurs SET inscrit = 1 WHERE user_id=?';
$apply = $db->prepare($sqlQuery);
// Exécution ! L'utilisateur de la session participe maintenant à l'évenement (inscrit = 1 dans la bdd)
$apply->execute([$_SESSION['user_id']]);

$_SESSION['inscrit']=1;

header('Location: ' . $dossier . 'event.php');
exit();

?>
