<?php include './config/debut2.php';

if(isset($_POST['mess'])){
    $newmessage=htmlspecialchars($_POST['mess']);
    $date=date("d-m-Y H:i:s");
    $inseremessage= $db-> prepare('INSERT INTO chattab (message,user_id,date) VALUES (?,?,?)');
    $inseremessage->execute([$newmessage,$_SESSION['user_id'],$date]);
    header('Location: ' . $dossier . 'organisation.php');
    exit();
}
?>

