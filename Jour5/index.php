<?php 
require 'config.php';

$user = getLoggedInUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil - Système d'Authentification</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>🔐 Authentification</h1>

    <?php if ($user): ?>
        <!-- Utilisateur connecté -->
         <div class="welcome">
            👤 Bonjour <strong><?php echo htmlspecialchars($user['prenom']); ?></strong>!
         </div>
         <p style="color: #999; margin-bottom: 20px;">
          Email: <?php htmlspecialchars($user['email']); ?>
         </p>
         <div class="links">
            <a href="logout.php" class="lougout-btn">Se déconnecter</a>
         </div>
         <?php else: ?>
            <!-- Utilisateur non connecté -->
          <p style="color: #666; margin-bottom: 30px;">
              Veuillez vous connecter ou créer un compte
          </p>
          <div class="links">
            <a href="inscription.php">📝 S'inscrire</a>
            <a href="connexion.php">🔑 Se connecter</a>
          </div>
          <?php endif; ?>
  </div>
</body>
</html>