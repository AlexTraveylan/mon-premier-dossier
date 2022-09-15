<?php include './config/debut.php';?>

<body>
    <section class="partie1">   
      <div class="formtext">

<?php

if(//si l'email est bien recu
    isset($_GET['id']) && isset($_GET['clef'])
    ) {

        $getid=htmlspecialchars($_GET['id']);
        $getclef=htmlspecialchars($_GET['clef']);

        $recupUser = $db -> prepare('SELECT * FROM utilisateurs WHERE user_id= ? AND clef = ?');
        $recupUser -> execute([$getid,$getclef]); //on recupere les données de l'utilisateur
        $userInfo = $recupUser->fetch();

        if ($userInfo['confirme']==0) {
                $updateConfirmation = $db -> prepare('UPDATE utilisateurs SET confirme = ? WHERE user_id = ?');
                $updateConfirmation -> execute([1,$getid]);
                $_SESSION['user_id']=$getid;
                $_SESSION['nom'] = $userInfo['nom'];
                $_SESSION['email'] = $userInfo['email'];
                $_SESSION['prenom'] = $userInfo['prenom'];
                $_SESSION['confirme']=1;
                 echo 'Bonjour ' . $_SESSION['prenom'] .' ' . $_SESSION['nom'] . ' ,votre compte à été crée avec l\'email de connexion suivant : ' . $_SESSION['email'];
                 echo '<br><a href="index.php">Retour à page d\'acceuil</a>';
                 unset($_SESSION['email']);
        } else {
                echo 'Bonjour ' . $_SESSION['prenom'] .' ' . $_SESSION['nom'] . ' ,votre compte à déjà été confirmé';
                echo '<br><a href="index.php">Retour à page d\'acceuil</a>';
           }

        } else{
            echo '<a href="index.php">Retour à page d\'acceuil</a><br>';
            echo "Votre clé ou identifiant est incorrect";
        }


?>

</div>
</section>
</body>

<?php include './headers/footer.php'; ?>

</html>
