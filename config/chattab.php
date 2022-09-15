<?php
    $recupchat2=$db -> prepare('SELECT * FROM chattab INNER JOIN utilisateurs ON chattab.user_id = utilisateurs.user_id');
    $recupchat2-> execute();
    $recuperedchat2=$recupchat2-> fetchAll();

    $nbmessage=count($recuperedchat2)-1; // nombre de message dans la base donnée
    ?>

<div class="chat">

    <?php
    if(isset($_GET['p'])){$page=htmlspecialchars($_GET['p']);}else{$page=1;}
    $pagemin=($page-1)*10;
    $pagemax=$page*10-1; 

    for ($i=$pagemin; $i <= min($pagemax,$nbmessage); $i++){
      //Envoie des 50 derniers messages de la bases de données, 10 par page.
        echo('<p class="messchat"><u>' . $recuperedchat2[$nbmessage - $i]['nom'] . ' ' . $recuperedchat2[$nbmessage - $i]['prenom'] .
        '</u> : <span class="datemess">' . $recuperedchat2[$nbmessage - $i]['date'] . '</span><br><span class="mainmessage">' . $recuperedchat2[$nbmessage - $i]['message'] . '</span>');

        //acces à la modification/suppression si bon mot de passe, message non supprimé, et utilisateur non banni.
        if(($recuperedchat2[$nbmessage - $i]['user_id']) == ($_SESSION['user_id']) && !($recuperedchat2[$nbmessage - $i]['supp']) && !($recuperedchat2[$nbmessage - $i]['ban'])){
          $id=$recuperedchat2[$nbmessage - $i]['message_id']; // id contient le message_id
          echo('<br>');
          echo('<a href="modifiermessagetab.php?id='. $id .'" class="modifiermessage">Modifier</a>'); //envoie du message_id par l'URL pour modification
          echo('&nbsp <a href="supprimermessagetab.php?id='. $id .'" class="supprimermessage">Supprimer</a></p>'); //envoie du message_id par l'URL pour suppression
        } else {
          echo('</p>');
        }
    
    }

    ?>

</div>

<?php 
    if($nbmessage<=0){$nbpage=1;}else{$nbpage=floor(($nbmessage/10))+1;} //nombre de pages necessaires à afficher.
    echo'<p class="pagination">';
    for ($i=1; $i<=$nbpage; $i++){
      echo'<a href="organisation.php?p='. $i .'">Page ' . $i .'</a>&nbsp';
    } 
    echo ' </p>' ;
    ?>
