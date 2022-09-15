<?php include './config/debut.php'; ?>

<body>
  <section class="partie1">
    <div class="formtext">
      <h2><u>Site des parents Nelson Mandela Bordeaux</u></h2>
      <h5><u>Objectifs de l'association</u></h5>
      <p>
        L'association des parents d'élèves du groupe scolaire Nelson Mandela a pour objectif d'apporter une aide matérielle et financière
        au groupe scolaire Nelson Mandela de Bordeaux notamment en recueillant des fonds par le biais de diverses actions. <br>
        Ainsi que d'animer la communauté de parents afin de créer du lien entre les divers acteurs de la sphère scolaire et périscolaire. <br>
        N'hesitez pas à nous rejoindre si vous souhaitez nous aider à réaliser ces objectifs.
      </p>

      <!-- Historique via $db -->

      <ul class="ulbody">
        <h5><u>Historique :</u></h5>
        <li>12/05/2022 : Assemblée constituante</li>
        <br />
        <li>13/05/2022 : Début du developpement d'un site internet</li>
        <br />
        <li>15/05/2022 : Création validée !</li><br>
        <li> 31/05/2022 : Accord de principe de la marie pour le vide-jouet</li><br>
        <li>25/06/2022 : <a href="./assets/fliyer.pdf">Vide-jouet</a></li><br>
        <li>02/09/2022 : Bonne rentrée à tous</li>
      </ul>


      <!-- Lien utiles via $db -->

      <?php echo ($adminmessages[3]['contenu']); ?>

      <!-- <ul class="ulbody">
          <h5><u>Liens utiles :</u></h5>
          <li>
            <a href="./assets/statuts.pdf" download="statuts.pdf"
              >Projet de statuts</a
            >
          </li>
          <br />
          <li>
            <a
              href="https://www.bordeaux.fr/o94845/nelson-mandela-maternelle"
              target="_blank"
              >Site du groupe scolaire</a
            >
          </li>
          <br />
          <li>
            <a
              href="https://docs.google.com/spreadsheets/d/1iPnXhZPfjOJ5gWDtXjh7AC1YdQM2VAA2nLKtDrUQtv4/edit?usp=sharing"
              target="_blank"
              >Comptabilité</a
            >
          </li>
        </ul> -->
    </div>
  </section>
</body>

<?php include './headers/footer.php'; ?>

</html>