<?php 

require 'config.php';


// Si déjà connecté, rediriger vers l'accueil
if (isLoggedIn()) {
  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="inscription.css">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <h1>📝 S'inscrire</h1>

    <form id="registerForm">
      <!-- Nom -->
       <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" placeholder="Dupont">
        <div class="error-message" id="nomError"></div>
       </div>

        <!-- Prénom -->
        <div class="form-group">
          <label for="prenom">Prenom:</label>
          <input type="text" id="prenom" name="prenom" placeholder="Jean">
          <div class="error-message" id="prenomError"></div>
        </div>

        <!-- Email -->
         <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="jean@exemple.com">
          <div class="error-message" id="emailError"></div>
         </div>

        <!-- Mot de passe -->
         <div class="form-group">
          <label for="password">Mot de passe:</label>
          <input type="password" id="password" name="password" placeholder="••••••••">
          <div class="error-message" id="passwordError"></div>
          <div class="password-strength" id="passwordStrength"></div>
         </div>

         <!-- Confirmation mot de passe -->
          <div class="form-group">
            <label for="confirmPassword">Confirmer le mot de passe</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="••••••••">
            <div class="error-message" id="confirmPasswordError"></div>
          </div>

          <button type="submit">S'inscrire</button>
    </form>

    <div class="login-link">
      Déjà inscrit ? <a href="connexion.php">Se connecter</a>
    </div>
  </div>

  <script src="validation.js"></script>
</body>
</html>