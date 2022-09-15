<?php include './config/debut2.php';

//verification que les données de connexions existent
if (
    isset($_POST['email']) && isset($_POST['password'])
    ){
     $email=htmlspecialchars($_POST['email']);
     //On vérifie que l'email existe dans la base de donnée, s'il existe pas, on renvoit SESSION err 1
     $verifemail = $db -> prepare("SELECT * FROM utilisateurs WHERE email=?");
     $verifemail -> execute([$email]);
     $verifiedemail = $verifemail -> fetchAll();
        if (count($verifiedemail)>0){
         //Requete qui permet de trouver les données de l'utilisateur par son email de connexion
          $sqlQuery = 'SELECT * FROM utilisateurs WHERE email=:email';
          $findUser = $db->prepare($sqlQuery);
          $findUser -> execute([
         'email'=> htmlspecialchars($_POST['email']),
          ]);
          //Stockage des données dans la variable $LoggerUser
           $LoggerUser = $findUser->fetch();
            if (
               //Vérification du mot de passe.
              password_verify($_POST['password'],$LoggerUser['password'])
            ) {
               //le mot de est correct, enregistrement des données de l'utilisateur dans la super variable SESSION
               $_SESSION['user_id']=$LoggerUser['user_id'];             
               $_SESSION['nom']=$LoggerUser['nom'];
               $_SESSION['prenom']=$LoggerUser['prenom'];
               $_SESSION['inscrit']=$LoggerUser['inscrit'];
               $_SESSION['confirme']=$LoggerUser['confirme'];
             //Redirection sur la page avec logged TRUE
             if (!$LoggerUser['confirme']){
              $_SESSION['erreur']=3;
              header('Location: ' . $dossier . 'register.php');
              exit();
             }else{
            header('Location: ' . $dossier . 'index.php');
            exit();
             }
           } else 
           //le mot de passe ne correspond pas
           {
            //L'utilisateur n'est pas connecté erreur=2 signifiera pas le bon mot de passe
            $_SESSION['erreur']=2;
            //Redirection sur la page avec erreur 2
            header('Location: ' . $dossier . 'register.php');
            exit();
          }
        } else { //L'email n'existe pas dans la base de donnée
          $_SESSION['erreur']=1;
            //Redirection sur la page avec erreur 1
            header('Location: ' . $dossier . 'register.php');
            exit();
        }

   } else {
    //Les réponses au formulaire ne sont pas set erreur 4
    $_SESSION['erreur']=4;
    header('Location: ' . $dossier . 'register.php');
    exit();
   }
