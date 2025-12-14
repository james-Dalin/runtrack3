<?php 

require 'config.php';

// Si déjà connecté, redirige vers l'accueil
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
  <link rel="stylesheet" href="connexion.css">
  <title>Connexion</title>
</head>
<body>
  <div class="container">
    <h1>🔑 Se connecter</h1>

    <form id="loginForm">
      <!-- Email -->
       <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="jean@example.com">
        <div class="error-message" id="emailError"></div>
       </div>

       <!-- Mot de passe -->
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" placeholder="••••••••">
        </div>

        <button type="submit">Se connecter</button>
    </form>

    <div class="register-link">
      pas encore inscrit ? <a href="inscription.php">S'inscrire</a>
    </div>
  </div>

  <script src="validation.js"></script>
  <script>
    document.getElementById('loginForm').addEventListener('submit', async (e) => {
      e.preventDefault();

      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value;

      const errors = [];

      if (!email) errors.email = 'L\'email est requis';
      if (!isValidEmail(email)) errors.email = 'Format email invalide';
      if (!password) errors.password = 'Le mot de passe est requis';

      displayErrors(errors);

      if (Object.keys(errors).length > 0) {
        return;
      }

      try {
        const response = await fetch('api_login.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ email, password })
        });

        const data = await response.json();

        if (data.success) {
          alert('✅ Connexion réussie !');
          window.location.href = 'index.php';
        } else {
          errors.email = data.error || 'Erreur lors de la connexion';
          displayErrors(errors);
        }
      } catch (error) {
        console.error('Erreur:', error);
        alert('❌ Erreur réseau');
      }
    });

    function displayErrors(errors) {
      document.getElementById('emailError').style.display = 'none';
      document.getElementById('passwordError').style.display = 'none';

      if (errors.email) {
        document.getElementById('emailError').textContent = 'block';
      }
      if (errors.password) {
        document.getElementById('passwordError').textContent = errors.password;
        document.getElementById('passwordError').style.display = 'block';
      }
    }
  </script>
</body>
</html>