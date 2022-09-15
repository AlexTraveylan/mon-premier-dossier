<?php include './config/debut2.php';?>

<?php if(isset($_SESSION['admin']) && $_SESSION['admin']):?>

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
<a href="adminutilisateurs.php">Gérer les utilisateurs</a>&nbsp  
<a href="admin.php">Acceuil admin</a>&nbsp  
<h1><u>Gestion du site</u> :</h1>
<h2><u>Gestion du contenu du site</u> :</h2>

<?php

if(isset($_POST['mess'],$_POST['adminid'])){
    $modify=$db->prepare('UPDATE admintexts SET contenu = ? WHERE admin_id=?');
    $modify->execute([$_POST['mess'],$_POST['adminid']]);
}

    $gestion=$db->prepare('SELECT * FROM admintexts');
    $gestion->execute();
    $gestions=$gestion-> fetchAll();
    $nbgestion = count($gestions);
    echo('<ul class="adminul">');
    for ($i=0;$i<$nbgestion;$i++){
        echo('<li> <u>'. $gestions[$i]['descriptif'] . ' </u> : ' . $gestions[$i]['contenu']);
        echo('&nbsp <br><br><form action="adminsite.php" method="post">
        <textarea name="mess" cols="50" rows="8" name="newtext">'. $gestions[$i]['contenu'] .'</textarea>
        <input type="hidden" name="adminid" value="'. $gestions[$i]['admin_id'] . '">
        <br><button type="submit" class="modifiermessage">Modifier</button></form></li><br>');
        }
    echo('</ul>');
?>


</body>
</html>

<?php endif ?>