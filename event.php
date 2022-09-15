<?php include './config/debut.php'; ?>

<body>

  <?php if (
    isset($_SESSION['confirme']) && ($_SESSION['confirme'] == 1)
  ) : ?>
    <section class="partie2">
      <div class="formtext">
        <section class="eventtext0">
          <h2><u>Événement en cours (Visible uniquement si vous êtes connecté)</u></h2>
          <div class="textbody">
            <!-- texte vide jouet via $db -->
            <?php echo ($adminmessages[5]['contenu']); ?>


            <!-- <h5><u>Organisation de notre premier événement, un vide jouet !</u></h5>
            <p>
             L'association des parents d'élèves du groupe scolaire Nelson Mandela existe enfin ! <br>
             Il s'agit maintenant de la faire vivre via des événements. <br>
             Comme premier événement, nous allons organiser un vide-jouet dans les locaux de Nelson Mandela. <br>
             Les parents peuvent s'inscrire comme vendeur et louer une table moyennenant un don de 3€ à l'association. <br>
             Vente de gateaux et vente de boissons seront de la fête. <br>
             L'objectif est aussi l'inscription de nouveaux membres pour des événements de mieux en mieux organisés et de plus en plus gros.
            </p> -->

          </div>
        </section>

        <section class="eventtext1">
          <?php if (
            //Si l'utilisateur fait partie des inscrits
            isset($_SESSION['inscrit']) && $_SESSION['inscrit']
          ) : ?>

            <form action="unapply.php" class="videgrenierinsc">
              <h6><u>Inscription au vide grenier en tant que vendeur :</u></h6>
              <br>
              <button type="submit" class="btndcnx">Annuler votre participation</button>
            </form>


          <?php else : ?>

            <form action="apply.php" class="videgrenierinsc">
              <h6><u>Inscription au vide grenier en tant que vendeur :</u></h6>
              <button type="submit" class="btncnx">Cliquez ici pour s'inscrire</button>
            </form>

          <?php endif ?>

          <ul class="videgrenierinsc">
            <h6><u>Liste des vendeurs :</u> (Vous allez recevoir un e-mail pour confirmer votre inscription, le coût sera un don de 3€ à l'association)</h6>
            <li>Estela, Calvo Nagore</li><br>
            <li>Maryse Boivin</li><br>
            <li>Laura Neves</li><br>
            <?php
            // Obtention de la liste des inscrits (les inscrits, ont inscrit=1)
            $sqlQuery = 'SELECT * FROM utilisateurs WHERE inscrit=1';
            $findinscrits = $db->prepare($sqlQuery);
            $findinscrits->execute();
            $listeinscrits = $findinscrits->fetchAll();
            foreach ($listeinscrits as list($id, $nom, $prenom)) {
              echo ('<li>' . $nom . ' ' . $prenom . '</li></br>');
            }
            ?>
          </ul>
        </section>

        <section class="eventtext2">
          <h5><u>Vous pouvez en discuter ici </u>:</h5>
          <?php
          $isban = $db->prepare('SELECT * FROM utilisateurs WHERE user_id=?');
          $isban->execute([$_SESSION['user_id']]);
          $isbaned = $isban->fetch();
          if (!$isbaned['ban']) : ?>

            <form action="configchat.php" method="post" class="configchat" id="form1" name="form1">
              <textarea class="mess" name="mess" cols="" rows="1" placeholder="Exprimez-vous ici :" required onkeypress="validerForm(event);"></textarea>
              <button class="btnmess" type="submit">-></button>
            </form>
            <?php include('./config/chat.php'); ?>
            <div class="fliyer">
              <a href="./assets/fliyer.jpg" target="_blank"><img src="./assets/fliyer.jpg" alt="fliyer" height=480px></a>
            </div>

          <?php else : ?>

            <form class="configchat">
              <textarea class="mess" name="mess" cols="" rows="1" placeholder="Vous avez été banni par un adminstrateur pour le motif suivant : <?php echo ($isbaned['motif']); ?>"></textarea>
              <button type="submit">Vous ne pouvez plus envoyer de message</button>
            </form>
            <?php include('./config/chat.php'); ?>
            <div class="fliyer">
              <a href="./assets/fliyer.jpg" target="_blank"> <img src="./assets/fliyer.jpg" alt="fliyer" height=480px> </a>
            </div>
          <?php endif; ?>

        </section>
      </div>
    </section>

  <?php else : ?>

    <section class="partie2">
      <p class="formtexterror">Il faut être connecté pour acceder à cette partie du site.</p>
    </section>

  <?php endif; ?>


</body>

<?php include './headers/footer.php'; ?>

</html>