<?php include './config/debut2.php';

if( isset($_SESSION['admin']) && $_SESSION['admin']){

if (isset($_POST['id'],$_POST['motif']) && isset($_SESSION['admin']) && $_SESSION['admin']){
   $id= (int) htmlspecialchars($_POST['id']);
   $motif=htmlspecialchars($_POST['motif']);
   $banuser=$db -> prepare('UPDATE utilisateurs SET ban = ?, motif = ? WHERE user_id = ?');
   $banuser-> execute([1,$motif,$id]); 
   header('Location: ' . $dossier . 'adminutilisateurs.php');  
   exit();
}

if (isset($_GET['id']) && isset($_SESSION['admin']) && $_SESSION['admin']){
    $id= (int) htmlspecialchars($_GET['id']);
    $unbanuser=$db -> prepare('UPDATE utilisateurs SET ban = ?, motif = ? WHERE user_id = ?');
    $unbanuser-> execute([0,NULL,$id]); 
    header('Location: ' . $dossier . 'adminutilisateurs.php');  
    exit();
 }

}