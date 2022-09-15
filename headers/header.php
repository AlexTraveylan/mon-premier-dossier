<header>
  <div class="grid-container3">

    <div class="menu-icon">
      <span></span>
    </div>

    <a href="index.php"><img class="Logo" src="./assets/LogoAsso.jpg" alt="LogoAsso" height=50px></a>



    <?php if (isset($_SESSION['confirme']) && ($_SESSION['confirme'] == 1)) : ?>

      <div class="bonjour">
        <?php echo ('Bonjour ' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . '   ') ?>
        <br><a href="deconect.php">Déconnexion</a>&nbsp<a href="modifiercompte.php">Modifier compte</a>
      </div>

    <?php else : ?>

      <div class="bonjour">
        <a href="register.php">Connexion</a>
      </div>

    <?php endif; ?>

  </div>

  <div id="mySidenav" class="sidenav">
    <ul class="burgerlist">
      <li><a href="index.php">Page d'acceuil</a></li>
      <li><a href="ensuite.php">Idées et membres</a></li>
      <li><a href="contact.php">Nous contacter</a></li>
      <li><a href="parentselus.php">Parents élus</a></li>
      <?php if (!isset($_SESSION['confirme']) || !$_SESSION['confirme']) : ?>
        <li><a href="register.php">Se connecter</a></li>
      <?php endif ?>
      <?php echo ($adminmessages[0]['contenu']); ?>
    </ul>
  </div>

</header>