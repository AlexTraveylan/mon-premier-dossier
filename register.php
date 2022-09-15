<?php include './config/debut.php';?>

<body>
  <section class="mid">
    <div class="formtext">
    <form action="verif.php" method="post" class="registerform">
       <h5><u>Connexion </u> : (Si vous avez déjà un compte)</h5>
       <label for="email" class=form_label>Email de connexion :</label><br>
        <input class=form_label type="email" name='email'/><br>
        <label for="password" class=form_label>Mot de passe :</label><br>
        <input class=form_label type="password" name='password' /><br><br>
        <button type="submit" class=btnform><span class="animvalider">Valider</span></button>
        <?php include './headers/echec.php';?>
    </form>

    
    <form action="valide.php" method="post" class="registerform">
    <h5><u>Création d'un compte</u> :</h5>
        <label for="nom" class=form_label>Nom :</label><br>
        <input class=form_label type="text" class="form_control" name="nom" id="nom"><br>

        <label for="prenom" class=form_label>Prénom :</label><br>
        <input class=form_label type="text" class="form_control" name="prenom" id="prenom"><br>

        <label for="email" class=form_label>Email de connexion :</label><br>
        <input class=form_label type="email" class="form_control" name="email" id="email"><br>

        <label for="password" class=form_label>Mot de passe :</label><br>
        <input class=form_label type="password" class="form_control" name="password" id="password"><br><br>


        <button type="submit" class=btnform><span class="animvalider">Valider</span></button><br>
        <span class="error"> Vous allez recevoir un e-mail de confirmation. <a href="notesecurite.php">Notes de sécurité</a></span>
    </form>
    </div>
</section>
</body>

<?php include './headers/footer.php'; ?>
</html>