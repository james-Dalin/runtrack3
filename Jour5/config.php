<?php 

// ========== CONFIGURATION GLOBALE ==========
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'auth_app');

// Démarrer la session
session_start();

// ========== FONCTIONS UTILITAIRES ==========

/**
 * Connexion à la BD
 */
function getConnection() {
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Erreur connexion: ' . $conn->connect_error]));
  }

  $conn->set_charset('utf8mb4');
  return $conn;
}

/**
 * Vérifie si l'utilisateur est connecté
 */
function isLogginIn() {
  return isset($_SESSION['user_id']);
}

/**
 * Récupère l'utilisateur connecté
 */
function getLoggedInUser() {
  if (!isLogginIn()) {
    return null;
  }

  $conn = getConnection();
  $userId = $_SESSION['user_id'];

  $stmt = $conn->prepare('SELECT id, nom, prenom, email FROM utilisateurs WHERE id = ?');
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    return $result->fetch_assoc();
  }

  return null;
}

/**
 * Définie un utilisateur comme connecté
 */
function loginUser($userId) {
  $_SESSION['user_id'] = $userId;
}

/**
 * Déconnecte l'utilisateur
 */
function logoutUser() {
  unset($_SESSION['user_id']);
  session_destroy();
}

/**
 * Encode le mot de passe
 */
function hashPassword($password) {
  return password_hash($password, PASSWORD_BCRYPT);
}

/**
 * Vérifie le mot de passe
 */
function verifyPassword($password, $hash) {
  return password_verify($password, $hash);
}
?>