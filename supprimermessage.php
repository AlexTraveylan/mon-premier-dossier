<?php include './config/debut2.php';

if (isset($_GET['id'])) {
  $id = (int) htmlspecialchars($_GET['id']);

  $verif = $db->prepare('SELECT * FROM chat INNER JOIN utilisateurs ON chat.user_id = utilisateurs.user_id WHERE message_id=?');
  $verif->execute([$id]);
  $verified = $verif->fetch();

  if ($verified['user_id'] === $_SESSION['user_id']) {
    $messagesupprime = "<span class='minimess'><em> (Ce message a été supprimé le " . date("d-m-Y H:i:s") . ")</em></span>";
    $deletemessage = $db->prepare('UPDATE chat SET `message`=?, `supp`=? WHERE message_id=?');
    $deletemessage->execute([$messagesupprime, 1, $id]);
  }
}
header('Location: ' . $dossier . 'parentselus.php');
exit();
