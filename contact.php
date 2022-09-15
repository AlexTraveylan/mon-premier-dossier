<?php include './config/debut.php';?>

  <body>
    <section class="mid">
      <div class="formtext">
    <h2><u>Contactez nous directement !</u></h2>
      <?php if (isset($_SESSION['confirme']) && $_SESSION['confirme']):?>
        <form action="" method="post" class="registerform">
                <h5>Envoyez un message à l'adminisateur du site :</h5>
                <textarea name="mess" cols="45" rows="10" placeholder="Exprimez-vous">Bonjour,</textarea><br>
                  <?php if(isset($_POST['mess'])){
                      $date=date("d-m-Y H:i:s");
                      $mess=htmlspecialchars($_POST['mess']);
                      echo('<br><span class="modified">Votre message a bien été reçu ! Nous vous enverons la réponse sur votre e-mail de connexion.</span><br><br>');
                      $ajoutmessage=$db->prepare('INSERT INTO contact (message, user_id, date) VALUES (?,?,?)');
                      $ajoutmessage->execute([$mess, $_SESSION['user_id'],$date]);
                  } else {
                      echo('<button type="submit" class=btnform><span>Envoyer le message</span></button>');
                  }
                  ?>
        </form>
      <?php else: ?>
        <p class="formtexterror">Il faut être connecté pour acceder à cette partie du site.</p>
      <?php endif ?>
      <h2><u>Vous pouvez aussi nous contacter via l'e-mail en bas de page</u></h2>

      </div>
      <br>
      </div>
    </section>


  </body>

  <?php include './headers/footer.php'; ?>
</html>