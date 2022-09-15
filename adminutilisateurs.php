<?php include './config/debut2.php';?>

 <?php if( isset($_SESSION['admin']) && $_SESSION['admin']):?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parent Nelson Mandela</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="./assets/MiniLogo.jpg" />
  </head>


<body>
<a href="adminchat.php">Gérer le chat</a>&nbsp  
<a href="admin.php">Acceuil admin</a>&nbsp  
<a href="adminsite.php">Gérer le site</a>
<h1><u>Gestion du site</u> :</h1>
<h2><u>Gestion des utilisateurs</u> :</h2>

<?php
    $utilisateur=$db->prepare('SELECT * FROM utilisateurs');
    $utilisateur->execute();
    $utilisateurs=$utilisateur-> fetchAll();
    $nbutilisateur = count($utilisateurs);
    echo('<ol class="adminul">');
    for ($i=0;$i<$nbutilisateur;$i++){
        echo('<li>'. $utilisateurs[$i]['nom'] . ' ' . $utilisateurs[$i]['prenom'] . ' : ' . $utilisateurs[$i]['email'] . ' (utilisateur n°');
        echo($utilisateurs[$i]['user_id']);
        if ($utilisateurs[$i]['confirme']==1) {echo(') Utilisateur confirmé ');}else{echo(') Non confirmé ');}
        if ($utilisateurs[$i]['ban']){echo('// <strong>Banni</strong> pour le motif suivant : ' . $utilisateurs[$i]['motif'] . 
            '&nbsp <a href="adminban.php?id='. $utilisateurs[$i]['user_id'] .'" class="modifiermessage">Rehabiliter</a></li><br>');
        } else {
        echo('&nbsp <form action="adminban.php" method="post">
        <input name="motif" type="text" placeholder="motif">
        <input type="hidden" name="id" value="'. $utilisateurs[$i]['user_id'] . '">
        <button type="submit">Bannir</button></form></li><br>');
        }
    }
    echo('</ol>');
?>


</body>
</html>

<?php endif?>