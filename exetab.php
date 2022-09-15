<?php include './config/debut2.php';

if (isset($_GET['id'])){
    $id=(int)htmlspecialchars($_GET['id']);
    $user=$_SESSION['prenom'];
    $cheak=$db->prepare('SELECT * FROM organisation WHERE tab_id=?');
    $cheak->execute([$id]);
    $cheaked=$cheak->fetch();
    print_r($cheaked);
    if($cheaked['verif']){
        $modif=$db->prepare('UPDATE organisation SET verif=?, personne=? WHERE tab_id=?');
        $modif->execute([0,NULL,$id]);
    } else {
        $modif=$db->prepare('UPDATE organisation SET verif=?, personne=? WHERE tab_id=?');
        $modif->execute([1,$user,$id]);
    }   
}

header('Location: ' . $dossier . 'organisation.php');
exit();
?>