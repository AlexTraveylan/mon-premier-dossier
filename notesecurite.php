<?php include './config/debut.php';?>

<body>
    
<section class="partie1">
<div class="formtext">
    <h2 class="formtext"><u>Notes de sécurité</u> :</h2>
    <ul class="ulbody">
        <li>Nom, prénom, email et mot de passe sont inscrits dans une base de donnée mysql sur le serveur de l'hebergeur du site.</li>
        <li>Avant d'y être inscrit, le mot de passe passe par une fonction de hashage, celle par defaut de php.</li>
        <li>C'est donc uniquement le hash de votre mot de passe qui est accessible. <br> Impossible de retrouver le mot de passe à l'aide du hash facilement (sauf 1234, azerty etc ...).</li>
        <li>De plus, ni le mot de passe, ni le mail, ni meme le hash du mot de passe transite de page en page.</li>
        <li>Je ne sais pas si cela suffit, je débute, n'hesitez pas à me le dire s'il y reste des failles que je n'ai pas encore vu.</li>
    </ul>
</div>
</section>


</body>

<?php include './headers/footer.php'; ?>

</html>
