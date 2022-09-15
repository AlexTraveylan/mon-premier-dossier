<?php include './config/debut2.php';

if(isset($_SESSION['admin']) && $_SESSION['admin']){

if (isset($_GET['id']) && isset($_SESSION['admin']) && $_SESSION['admin']){
   $id= (int) htmlspecialchars($_GET['id']);
   $deletemessage=$db -> prepare('DELETE FROM chat WHERE message_id=?');
   $deletemessage-> execute([$id]); 
}
header('Location: ' . $dossier . 'adminchat.php');  
exit();
}

