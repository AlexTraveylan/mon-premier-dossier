<?php
session_start(); 
session_destroy();

// deconnexion en detruisant la session. Retour à l'index comme si nouvel utilisateur.

header('Location: ' . $dossier . 'index.php');
      exit();
