<?php include './config/debut.php'; ?>

<?php
if (isset($_POST['modified']) && isset($_POST['idmessage'])) {
  $id = (int) $_POST['idmessage'];
  $modifiedmessage = htmlspecialchars($_POST['modified']) . ' <br><span class="minimess"><em> (Message modifié le : ' . date("d-m-Y H:i:s") . ')</em><span>';
  $modifymessage = $db->prepare("UPDATE chat SET `message`=? WHERE message_id=?");
  $modifymessage->execute([$modifiedmessage, $id]);
  header('Location: ' . $dossier . 'parentselus.php');
  exit();
}
?>

<body>

  <form action="" method="post" class="registerform">
    <fieldset>
      <legend>Modifier le message</legend>
      <textarea name="modified" cols="17" rows="15"><?php
                                                    if (isset($_GET['id'])) { //id contient le message_id

                                                      $id = htmlspecialchars($_GET['id']);

                                                      $verif = $db->prepare('SELECT * FROM chat INNER JOIN utilisateurs ON chat.user_id = utilisateurs.user_id WHERE message_id=?');
                                                      $verif->execute([$id]);
                                                      $verified = $verif->fetch();

                                                      if ($verified['user_id'] === $_SESSION['user_id']) {

                                                        $oldmess = $db->prepare('SELECT * FROM chat WHERE message_id=?');
                                                        $oldmess->execute([$id]);
                                                        $oldmessstock = $oldmess->fetch(); //oldmessstock contient la ligne avec le message à modifier.
                                                        echo ($oldmessstock['message']);
                                                      } else {
                                                        header('Location: ' . $dossier . 'parentselus.php');
                                                        exit();
                                                      }
                                                    } else {
                                                      echo ('erreur');
                                                    }
                                                    ?></textarea>
      <input type="hidden" name="idmessage" value="
    <?php
    if (isset($_GET['id'])) {
      echo (htmlspecialchars($_GET['id']));
    }
    ?>
    ">
      <button type="submit" class=btnform>Valider</button>
    </fieldset>

  </form>
</body>




<?php include './headers/footer.php'; ?>

</html>