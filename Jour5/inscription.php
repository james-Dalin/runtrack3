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
  <script>
      document.getElementById('registerForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        // Récupérer les valeurs
        const nom = document.getElementById('nom').value.trim();
        const prenom = document.getElementById('prenom').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        // Valider
        const error = {};

        if(!nom) errors.nom = 'Le nom est requis';
        if (!prenom) errors.prenom = 'Le prénom est requis';
        if (!email) errors.email = 'L\'email est requis';
        if (!isValidEmail(email)) errors.email = 'Format email invalide';
        if (!password) errors.password = 'Le mo de passe est requis';
        if (password.length < 8) errors.password = 'Au minimum 8 caractères';
        if (!hasPasswordStrength(password)) errors.password = 'Doit contenur majuscule, minuscule et chiffre';
        if (password !== confirmPassword) errors.confirmPassword = 'Les mots de passe ne correspondent pas';

        // Afficher les erreurs
        displayErrors(errors);

        // Si erreurs, arrêter
        if (Object.keys(errors).length > 0) {
          return;
        }

        // Envoyer au backend
        try {
          const response = await fetch('api_register.php', {
            method: 'POST',
            header: { 'Content-Type': 'application/json'},
            body: JSON.stringify({ nom, prenom, email, password })
          });

          const data = await reponse.json();
        }
      })
  </script>
</body>
</html>