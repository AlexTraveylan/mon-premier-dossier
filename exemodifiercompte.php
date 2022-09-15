<?php include './config/debut2.php';

if (
    isset($_POST['amdp']) && isset($_POST['nmdp']) && isset($_SESSION['user_id'])
    ){
        //modifier mot de passe

        $verifmdp= $db -> prepare('SELECT * FROM utilisateurs WHERE user_id=?');
        $verifmdp -> execute([$_SESSION['user_id']]);
        $verifiedmdp = $verifmdp -> fetch();
        if (password_verify($_POST['amdp'],$verifiedmdp['password'])) {
            $changemdp = $db -> prepare('UPDATE utilisateurs SET password = ? WHERE user_id = ?');
            $changemdp -> execute([password_hash(htmlspecialchars($_POST['nmdp']),PASSWORD_DEFAULT, ['cost' => 14]),$_SESSION['user_id']]);
            $_SESSION['newmdp']=1;
            header('Location: ' . $dossier . 'modifiercompte.php');
            exit();
        } else {
            $_SESSION['newmdp']=0;
            header('Location: ' . $dossier . 'modifiercompte.php');
            exit();
        }
        
    } elseif(isset($_POST['nnom']) && isset($_SESSION['user_id'])
    ) {
        //modifier nom

        $modifnom=$db -> prepare('UPDATE utilisateurs SET nom=? WHERE user_id = ?');
        $modifnom -> execute([htmlspecialchars($_POST['nnom']),$_SESSION['user_id']]);
        $_SESSION['newnom']=1;
        $_SESSION['nom']=htmlspecialchars($_POST['nnom']);
        header('Location: ' . $dossier . 'modifiercompte.php');
        exit();

    } elseif(isset($_POST['nprenom']) && isset($_SESSION['user_id'])
    ) {
        $modifprenom=$db -> prepare('UPDATE utilisateurs SET prenom=? WHERE user_id = ?');
        $modifprenom -> execute([htmlspecialchars($_POST['nprenom']),$_SESSION['user_id']]);
        $_SESSION['newprenom']=1;
        $_SESSION['prenom']=htmlspecialchars($_POST['nprenom']);
        header('Location: ' . $dossier . 'modifiercompte.php');
        exit();
    } elseif (
        isset($_POST['suppmdp']) && isset($_POST['confirmsupp']) && isset($_SESSION['user_id'])
        ){
            $verifmdp= $db -> prepare('SELECT * FROM utilisateurs WHERE user_id=?');
            $verifmdp -> execute([$_SESSION['user_id']]);
            $verifiedmdp = $verifmdp -> fetch();

            if( $_POST['confirmsupp'] != 'SUPPRIMER'){
                $_SESSION['suppok']=3;
                header('Location: ' . $dossier . 'modifiercompte.php');
                exit();
            } else
            
            if (($verifiedmdp['password'] == $_POST['suppmdp']) && ($_POST['confirmsupp'] == 'SUPPRIMER')){
                $suppcompte = $db -> prepare('DELETE FROM utilisateurs WHERE user_id=?');
                $suppcompte -> execute([$_SESSION['user_id']]);
                $_SESSION['suppok']=1;
                header('Location: ' . $dossier . 'modifiercompte.php');
                exit();
            } elseif (($verifiedmdp['password'] == $_POST['suppmdp']) && ($_POST['confirmsupp'] != 'SUPPRIMER')){
                $_SESSION['suppok']=3;
                header('Location: ' . $dossier . 'modifiercompte.php');
                exit();
            } else {
                $_SESSION['suppok']=2;
                header('Location: h' . $dossier . 'modifiercompte.php');
                exit();
            }
        } else {
            header('Location: ' . $dossier . 'index.php');
            exit();
        }


?>



