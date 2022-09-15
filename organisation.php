<?php include './config/debut.php';

$extracttab=$db -> prepare('SELECT * FROM organisation');
$extracttab->execute();
$contenutab=$extracttab->fetchAll();
?>


<body>
    <section class="partie1">   
      <section class="formtext">

    <?php if(!isset($_POST['enter']) && !isset($_SESSION['enter'])):?>

        <form action="" method="post">
        <input type="text" name="enter" placeholder="Mot de passe">
        <button class="btncnx">Entrer</button>
        </form>

    <?php else:?>
      <?php if((isset($_SESSION['confirme'],$_POST['enter']) && ($_SESSION['confirme'] == 1) && $_POST['enter'] == "fraise") || isset($_SESSION['enter'])): ?>
        <?php $_SESSION['enter']=1; ?>
      <div>
    <h2><u>Organisation</u> :</h2>
    <p>
      Il faudra au minimum 2 personnes, une à l'entrée pour le plan vigipirate. Il y aura aussi deux portes à surveiller. <br>
      Il faudra une personne pour s'occuper de tenir la vente de nourriture et de boisson (buvette). <br>
      Eventuellement quelqu'un pour recruter de nouveaux membres. <br>
      Eventuellement une autre personne pour vérifier que tout se déroule bien. <br>
      Inscrivez vous ici en cliquant sur un créneau.
    </p>




    </div>
    
          <div class="tableau">



              <ul class="colonnetab">
                  <h6><u>Horaires</u></h6>
                  <li>10h-11h</li><br>
                  <li>11h-12h</li><br>
                  <li>12h-13h</li><br>
                  <li>13h-14h</li><br>
                  <li>14h-15h</li><br>
                  <li>15h-16h</li><br>
                  <li>16h-17h</li><br>
                  <li>17h-18h</li>

              </ul>

              <ul class="colonnetab">
                  <h6><u>Entrée</u></h6>
                  <?php for($i=0;$i<8;$i++){
                      if(!$contenutab[$i]['verif']){
                      echo('<li><a href="exetab.php?id=' . $contenutab[$i]['tab_id'] . '">' . $contenutab[$i]['text'] .'</a></li><br>');
                      } else {
                        echo('<li><a href="exetab.php?id=' . $contenutab[$i]['tab_id'] . '">' . $contenutab[$i]['personne'] .'</a></li><br>');
                      }
                  }?>

              </ul>
              
              <ul class="colonnetab">
                  <h6><u>Buvette</u></h6>
                  <?php for($i=8;$i<16;$i++){
                      if(!$contenutab[$i]['verif']){
                      echo('<li><a href="exetab.php?id=' . $contenutab[$i]['tab_id'] . '">' . $contenutab[$i]['text'] .'</a></li><br>');
                      } else {
                        echo('<li><a href="exetab.php?id=' . $contenutab[$i]['tab_id'] . '">' . $contenutab[$i]['personne'] .'</a></li><br>');
                      }
                  }?>

              </ul>

              <ul class="colonnetab">
                  <h6><u>Recrut</u></h6>
                  <?php for($i=16;$i<24;$i++){
                      if(!$contenutab[$i]['verif']){
                      echo('<li><a href="exetab.php?id=' . $contenutab[$i]['tab_id'] . '">' . $contenutab[$i]['text'] .'</a></li><br>');
                      } else {
                        echo('<li><a href="exetab.php?id=' . $contenutab[$i]['tab_id'] . '">' . $contenutab[$i]['personne'] .'</a></li><br>');
                      }
                  }?>
              </ul>

              <ul class="colonnetab">
                  <h6><u>Autre</u></h6>
                  <?php for($i=24;$i<32;$i++){
                      if(!$contenutab[$i]['verif']){
                      echo('<li><a href="exetab.php?id=' . $contenutab[$i]['tab_id'] . '">' . $contenutab[$i]['text'] .'</a></li><br>');
                      } else {
                        echo('<li><a href="exetab.php?id=' . $contenutab[$i]['tab_id'] . '">' . $contenutab[$i]['personne'] .'</a></li><br>');
                      }
                  }?>
              </ul>
        </div>

      <div  class="eventtext2">
        <h5><u>Vous pouvez en discuter ici </u>:</h5>
      <?php 
      $isban=$db ->prepare('SELECT * FROM utilisateurs WHERE user_id=?');
      $isban->execute([$_SESSION['user_id']]);
      $isbaned=$isban->fetch();

        if (!$isbaned['ban']):?>

          <form action="configchattab.php" method="post" class="configchat" id="form1" name="form1">
            <textarea class="mess" name="mess" cols="" rows="1"  placeholder="Exprimez-vous ici :" required onkeypress="validerForm(event);"></textarea>
            <button class="btnmess" type="submit">-></button>
          </form>
          <?php include('./config/chattab.php');?>

         <?php else:?>

          <form class="configchat">
            <textarea class="mess" name="mess" cols="" rows="1"  placeholder="Vous avez été banni par un adminstrateur pour le motif suivant : <?php echo($isbaned['motif']);?>"></textarea>
            <button type="submit">Vous ne pouvez plus envoyer de message</button>
          </form>

         <?php include('./config/chattab.php');?>
         <?php endif;?>
      </div>
      <div class="fliyer">
      <img src="./assets/fliyer.jpg" alt="fliyer" height=480px>
    </div>
    <?php elseif (isset($_SESSION['confirme']) && ($_SESSION['confirme'] == 1)):?>
      <p class="error">Mauvais mot de passe, attention aux majuscules</p>
    <?php else:?>
      <p class="error">Il faut d'abord se connecter</p>
      <?php endif;?>
      <?php endif;?>
    </section>



    </section>
  </body>

    <?php include './headers/footer.php'; ?>


</html>
