<?php include './config/debut.php';?>

<body>
    <section class="modifypage">
    <div class="formtext">

    <?php if((isset($_SESSION['confirme']))&& ($_SESSION['confirme'] == 1)):?>
    
    <form action="exemodifiercompte.php" method="post" class="modifyform">

    <h5><u>Modifier le mot de passe</u></h5>
        <label for="amdp" class=form_amdp>Ancien mot de passe :</label>
        <input type="password" class="form_control" name="amdp" id="amdp"><br>
        <label for="nmdp" class=form_nmdp>Nouveau mot de passe :</label>
        <input type="password" class="form_control" name="nmdp" id="nmdp">
        <br>
        <button type="submit" class=btnform>Valider</button>   
        <?php
        if( isset($_SESSION['newmdp']) && $_SESSION['newmdp']==1){echo('<br><span class="modified">Votre mot de passe a été modifié avec succès.<span>');}
        elseif( isset($_SESSION['newmdp']) && $_SESSION['newmdp']==0){echo('<br><span class="notmodified">Ancien mot de passe incorrect. Aucune modification.<span>');}
        unset($_SESSION['newmdp']);
        ?>    

    </form>

    <form action="exemodifiercompte.php" method="post" class="modifyform">
    <h5><u>Modifier le nom</u></h5>
        <label for="nnom" class=form_nnom>Nouveau nom :</label>
        <input type="text" class="form_control" name="nnom" id="nnom">
        <br>
        <button type="submit" class=btnform>Valider</button>     
        <?php
        if( isset($_SESSION['newnom']) && $_SESSION['newnom']==1){echo('<br><span class="modified">Votre nom a été modifié avec succès.<span>');}
        unset($_SESSION['newnom']);
        ?>    
    </form>

    <form action="exemodifiercompte.php" method="post" class="modifyform">
    <h5><u>Modifier le prénom</u></h5>
        <label for="nprenom" class=form_nprenom>Nouveau prénom :</label>
        <input type="text" class="form_control" name="nprenom" id="nprenom">
        <br>
        <button type="submit" class=btnform>Valider</button> 
        <?php
        if( isset($_SESSION['newprenom']) && $_SESSION['newprenom']==1){echo('<br><span class="modified">Votre prenom a été modifié avec succès.<span>');}
        unset($_SESSION['newprenom']);
        ?>         
    </form>

   

    <!-- <form action="exemodifiercompte.php" method="post" class="modifyform">
    <h5><u>Supprimer le compte définitivement</u></h5>
        <label for="suppmdp" class=form_suppmdp>Mot de passe du compte :</label>
        <input type="password" class="form_control" name="suppmdp" id="suppmdp">
        <br>
        <label for="confirmsupp" class=form_confirmsupp>Ecrire : "SUPPRIMER"</label>
        <input type="text" class="form_control" name="confirmsupp" id="confirmsupp" placeholder="SUPPRIMER">
        <br>
        <button type="submit" class=btnsupp>Supprimer le compte</button> 
        <?php
        // if( isset($_SESSION['suppok']) && $_SESSION['suppok']==1){
        //   echo('<br><span class="modified">Votre compte a définitivement été supprimé avec succès.<span>'); 
        //   session_destroy();
        // }
        // elseif( isset($_SESSION['suppok']) && $_SESSION['suppok']==2){
        //   echo('<br><span class="notmodified">Mot de passe incorrect.<span>');
        //   unset($_SESSION['suppok']);}
        // elseif( isset($_SESSION['suppok']) && $_SESSION['suppok']==3){
        //   echo('<br><span class="notmodified">Vous n\'avez pas écrit SUPPRIMER correctement.<span>');
        //   unset($_SESSION['suppok']);
        // } 
        ?>        
    </form> -->
    <?php endif ?>

        </div>
    </section>

  </body>

  <?php include './headers/footer.php'; ?>

</html>