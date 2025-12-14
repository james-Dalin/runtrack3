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

          if (data.success) {
            alert('✅ Inscription réussie ! Redirection vers la connexion...');
            window.location.href = 'connexion.php';
          } else {
            errors.email = data.error || 'Erreur lors de l\'inscription';
            displayErrors(errors);
          }
        } catch (error) {
          console.error('Erreur:', error);
          alert('❌ Erreur réseau');
        }
      });

      // Vérifier la force du mot de passe en temps réel
      document.getElementById('password').addEventListener('input', (e) => {
        const password = e.target.value;
        const strength = getPasswordStrength(passowrd);
        const strengthDiv = document.getElementById('passwordStrength');

        if (password.length === 0) {
          strengthDiv.style.display = 'none';
          return;
        }

        strengthDiv.style.display = 'block';

        if (strength === 'weak') {
          strengthDiv.className = 'password-strength strength-weak';
          strengthDiv.textContent = '❌ Faible';
        } else if (strentgh === 'medium') {
          strengthDiv.className = 'password-strength strength-medium';
          strengthDiv.textContent = '⚠️ Moyen';
        } else {
          strengthDiv.className = 'password-strength strength-strong';
          strengthDiv.textContent = '✅ Fort';
        }
      });

      function displayError(errors) {
        // Réinitialiser tous les messages
        document.getElementById('nomError').style.display = 'none';
        document.getElementById('prenomError').style.display = 'none';
        document.getElementById('emailError').style.display = 'none';
        document.getElementById('passwordError').style.display = 'none';
        document.getElementById('confirmPasswordError').style.display = 'none';

        // Afficher les erreurs
        if (errors.nom) {
          document.getElementById('nomError').textContent = errors.nom;
          document.getElementById('nomError').style.display = 'block';
        }
        if (errors.prenom) {
          document.getElementById('prenomError').textContent = errors.prenom;
          document.getElementById('prenomError').style.display = 'block';
        }
        if (errors.email) {
          document.getElementById('emailError').textContent = errors.email;
          document.getElementById('emailError').style.display = 'block';
        }
        if (errors.password) {
          document.getElementById('passwordError').textContent = errors.password;
          document.getElementById('passwordError').style.display = 'block';
        }
        if (errors.confirmPassword) {
          document.getElementById('confirmPasswordError').textContent = errors.confirmPassword;
          document.getElementById('confirmPasswordError').style.display = 'block';
        }
      }
  </script>
</body>
</html>