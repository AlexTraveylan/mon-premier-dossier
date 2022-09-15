<?php include './config/debut2.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parent Nelson Mandela</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="./assets/MiniLogo.jpg" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>


<body>

    <a href="adminchat.php">Gérer le chat</a>&nbsp
    <a href="adminutilisateurs.php">Gérer les utilisateurs</a>&nbsp
    <a href="adminsite.php">Gérer le site</a>

    <?php if (isset($_POST['emailadmin']) && isset($_POST['passwordadmin']) || (isset($_SESSION['admin']) && $_SESSION['admin'])) : ?>

        <?php
        // $mail et $mdp pour identifiant et mdp de l'admin
        include 'motdepasse.php';
        if ((isset($_POST['passwordadmin']) && $_POST['passwordadmin'] != $pass)) {
            header('Location: ' . $dossier . 'admin.php?erreur=1');
            exit();
        } elseif ((isset($_POST['emailadmin']) && $_POST['emailadmin'] != $mail)) {
            header('Location: ' . $dossier . 'admin.php?erreur=2');
            exit();
        } else {
            $_SESSION['admin'] = TRUE;
            echo ('<h1><u>Gestion du site</u> :</h1>');
            echo ('<ul class="adminul">
    <li><a href="adminchat.php">Gérer le chat</a></li><br>
    <li><a href="adminutilisateurs.php">Gérer les utilisateurs</a></li><br>
    <li><a href="adminsite.php">Gérer le site</a></li></ul>');

            $contactmess = $db->prepare('SELECT * FROM contact INNER JOIN utilisateurs ON contact.user_id = utilisateurs.user_id');
            $contactmess->execute();
            $contactmessages = $contactmess->fetchAll();
            $nbcontactmessages = count($contactmessages);
            echo ('<ol class="adminul">');
            for ($i = 0; $i < $nbcontactmessages; $i++) {
                echo ('<li> <u> De ' . $contactmessages[$i]['email'] . ' </u> : ' . $contactmessages[$i]['message'] .
                    '<br> (' . $contactmessages[$i]['nom'] . ' ' . $contactmessages[$i]['prenom'] . ' le ' . $contactmessages[$i]['date'] . '</li><br>');
            }
            echo ('</ol>');
        }


        ?>

    <?php else : ?>

        <form action="" method="post" class="registerform">
            <fieldset>
                <legend>Connexion à l'administration du site</legend>
                <label for="emailadmin" class=form_label>Email de connexion :</label><br>
                <input type="email" class="form_control" name="emailadmin" id="emailadmin"><br>

                <label for="passwordadmin" class=form_label>Mot de passe :</label><br>
                <input type="password" class="form_control" name="passwordadmin" id="passwordadmin"><br>


                <button type="submit" class=btnform>Valider</button>

                <?php
                if (isset($_GET['erreur']) && $_GET['erreur'] == 1) {
                    echo ('<br><span class="error">Mot de passe incorrect.</span>');
                } elseif (isset($_GET['erreur']) && $_GET['erreur'] == 2) {
                    echo ('<br><span class="error">Identifiant incorrect.</span>');
                }
                ?>

            </fieldset>

        </form>

    <?php endif ?>

</body>

</html>