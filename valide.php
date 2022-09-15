<?php include './config/debut.php';?>

<body>
    <section class="partie1">   
      <div class="formtext">

<?php

if ( // si le formulaire n'est pas complété correctement
    !isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['email']) || !isset($_POST['password']) 
)
{
    echo 'Le formulaire n\'est pas complété correctement.';
    return;
} else //Si le formulaire est complété correctement insertion dans la base de donnée en statut non confirmé
{
$clef = rand(100000000,1000000000); //generation d'une clef aléatoire
$email = htmlspecialchars($_POST['email']); // recupération de l'email du formulaire pour envoyer un mail

//vérification préalable que l'email n'existe pas deja dans la base de donnée.
$verifemail = $db -> prepare("SELECT * FROM utilisateurs WHERE email=?");
$verifemail -> execute([$email]);
$verifiedemail = $verifemail -> fetchAll();
if (count($verifiedemail)==0){ //on ajoute l'utilisateur seulement si son e-mail n'existe pas deja.

$insererUser = $db->prepare('INSERT INTO utilisateurs(nom, prenom, email, password, clef, confirme) VALUES (:nom, :prenom, :email, :pass, :clef, :confirme)');
$insererUser -> execute([
    'nom' => htmlspecialchars($_POST['nom']),
    'prenom' => htmlspecialchars($_POST['prenom']),
    'email'=> $email,
    'pass' => htmlspecialchars(password_hash($_POST['password'],PASSWORD_DEFAULT, ['cost' => 14])),
    'clef' => $clef,
    'confirme' => 0,
]);
$recupUser = $db-> prepare('SELECT * FROM utilisateurs WHERE email = ?');
$recupUser -> execute([$email]);
$userInfos = $recupUser->fetch();
$_SESSION['user_id'] = $userInfos['user_id'];
$lien= $dossier . 'verifmail.php?id=' . $_SESSION['user_id'] . '&clef=' . $clef;

    
    $from = 'ne-pas-repondre@parent-nelson-mandela.xyz';
    $to = $email;
    $subject = 'Email de confirmation de compte';
    $message = $lien;
    $headers = 'Association de parents de l\'école Nelson Mandela';
    mail($to,$subject,$message,$headers);
    echo('Un e-mail, vous a été envoyé pour confirmer votre compte, probablememnt dans les spamms.');
    echo('<br><a href="renvoimail.php">Envoyer un autre email de confirmation.</a><br><br><a href="index.php">Retour à page d\'acceuil</a>');



} else { //si son email est deja inscrit dans la bdd
    echo 'Votre email est deja enregistré.<br><a href="index.php">Retour à page d\'acceuil</a>';

}
}

    ?>

</div>
</section>
</body>

<?php include './headers/footer.php'; ?>

</html>
