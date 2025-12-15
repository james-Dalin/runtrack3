<?php 

require 'config.php';

// Déconnecter l'utilisateur
logoutUser();

//Rediriger vers l'accueil
header('Locaiton: index.php');
exit;

?>