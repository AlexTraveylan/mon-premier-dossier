<?php
if(
      isset($_SESSION['erreur'])
      ){
            $err=$_SESSION['erreur'];

            switch($err){
                  case 1://l'identifiant l'existe pas dans la base donnée
                        echo('<br><span class="error">Identifiant non reconnu. <br> Vous pouvez créer un compte avec le formulaire ci-dessous. </span>');
                        session_destroy();   
                        break;
                  case 2: //le mot de passe ne correspond pas à l'identifiant
                        echo('<br><span class="error">Mot de passe incorrect.</span>
                        <br>
                        <a href="oublimdp.php">Mot de passe oublié ?</a>'); 
                        session_destroy();
                        break;
                  case 3: //La validation par email n'a pas été effectué
                        echo('<br><span class="error">Vous n\'avez pas encore validé votre email, regardez dans vos spamms.</span>
                        <br>
                        <a class="error" href="renvoimail.php">Envoyer un autre email de confirmation.</a>'); 
                        break;
                  case 4: //les champs du formulaire ne sont pas set
                        echo('<br><span class="error">Remplissez le formulaire correctement.</span>');
                        session_destroy();   
                        break;       
            }

      }

?>