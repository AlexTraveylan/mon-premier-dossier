<?php include './config/debut.php';?>

<body>
    <section class="partie1">   
      <div class="formtext">

    <a href="index.php">Retour à page d'acceuil</a><br><br>

    <form action="" method="post" class="modifyform">
    <fieldset>
    <legend><u>Reinitialisation du mot de passe</u></legend>
        <label for="reintmdp" class=form_reintmdp>Email de connexion à reinitialiser :</label>
        <input type="email" class="form_control" name="reintmdp"><br>
        &nbsp
        <button type="submit" class=btnform>Valider</button>     
        </fieldset>
    </form>

<?php
if (isset($_POST['reintmdp'])){
    $email=htmlspecialchars($_POST['reintmdp']);
    $recupUser = $db-> prepare('SELECT * FROM utilisateurs WHERE email = ?');
    $recupUser -> execute([$email]);
    $userInfos = $recupUser->fetchAll();
    if (count($userInfos) != 0){
      $newmdp= rand(100,999) . '&a*' . rand(1000,9999) . 'hD!';
      $modifmdp = $db -> prepare('UPDATE utilisateurs SET password = ? WHERE email = ?');
      $modifmdp -> execute([password_hash($newmdp,PASSWORD_DEFAULT, ['cost' => 14]),$email]);

      $from = 'ne-pas-repondre@parent-nelson-mandela.xyz';
      $to = $email;
      $subject = 'Email de confirmation de compte';
      $headers[]= 'MIME-Version:1.0';
      $headers[] = 'Content-type: text/html; charset=iso-8859-1';
      $headers[] = 'Association de parents de l\'école Nelson Mandela';
      $msg = '
      <html>
      <body>
      Email de connexion : ' . $email . '<br> Mot de passe provisoire : '. $newmdp . '<br>
       Changez le ! <br> 
       <a href='. $dossier . 'index.php>' . $dossier . 'register.php</a>
       </body>
       </html>';
      mail($to,$subject,$msg,implode("\r\n", $headers));

    } else {
        echo('<br><span class="error">L\'email n\'existe pas dans la base de donnée</span>
        <br><a href="register.php">Créer un compte avec cette adresse ?</a>');
    }

} 

?>
</div>
</section>
</body>

<?php include './headers/footer.php'; ?>

</html>
