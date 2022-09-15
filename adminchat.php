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
<a href="admin.php">Acceuil admin</a>&nbsp  
<a href="adminutilisateurs.php">Gérer les utilisateurs</a>&nbsp  
<a href="adminsite.php">Gérer le site</a>
    
<h1><u>Gestion du site</u> :</h1>
<h2><u>Gestion du chat</u> :</h2>

<?php
$message=$db->prepare('SELECT * FROM chat INNER JOIN utilisateurs ON chat.user_id = utilisateurs.user_id');
    $message->execute();
    $messages=$message-> fetchAll();
    $nbmessage = count($messages);
    echo('<ol class="adminul">');
    for ($i=0;$i<$nbmessage;$i++){
        echo('<li>'. $messages[$i]['email'] . ' (utilisateur n°');
        echo($messages[$i]['user_id'] . ') : "<strong>');
        echo($messages[$i]['message'] . '</strong>" publié le ');
        echo($messages[$i]['date']);
        echo('&nbsp <a href="adminsuppchat.php?id='. $messages[$i]['message_id'] .'" class="supprimermessage">Supprimer</a></p></li><br>');
    }
    echo('</ol>');
?>

</body>
</html>

<?php endif?>