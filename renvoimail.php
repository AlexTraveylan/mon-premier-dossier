<?php include './config/debut.php';?>

<body>
    <section class="partie1">   
      <div class="formtext">
<?php
if (isset($_SESSION['user_id'])){
    $recupUser = $db-> prepare('SELECT * FROM utilisateurs WHERE user_id = ?');
    $recupUser -> execute([$_SESSION['user_id']]);
// if($recupUser->rowcount() > 0){
    $userInfos = $recupUser->fetch();
    $email=$userInfos['email'];
    $lien=$dossier . 'verifmail.php?id=' . $_SESSION['user_id'] . '&clef=' . $userInfos['clef'];

    // include 'function.php';
    
    // $to   = $email;
    // $from = 'ne-pas-repondre@parent-nelson-mandela.xyz';
    // $name = 'Association de parents de l\'école Nelson Mandela';
    // $subj = 'Email de confirmation de compte';
    // $msg = '<a href=' . $lien . '>' . $lien .'</a>';
    
    // $error=smtpmailer($to,$from, $name ,$subj, $msg);

    $from = 'ne-pas-repondre@parent-nelson-mandela.xyz';
    $to = $email;
    $subject = 'Email de confirmation de compte';
    $message = $lien;
    $headers = 'Association de parents de l\'école Nelson Mandela';
    mail($to,$subject,$message,$headers);
    echo('Un e-mail, vous a été envoyé pour confirmer votre compte, vérifiez vos <strong>spams</strong>.');
    echo('<br><a href="renvoimail.php">Envoyer un autre email de confirmation.</a><br><br><a href="index.php">Retour à page d\'acceuil</a>');

} else {
    header('Location: ' . $dossier . 'index.php');
    exit();
}
?>
</div>
</section>
</body>

<?php include './headers/footer.php'; ?>

</html>
