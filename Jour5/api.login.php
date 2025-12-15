<?php 

require 'config.php';

header('Content-Type: application/json');

// Récupérer les données JSON
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
  die(json_encode(['success' => false, 'error' => 'Données  invalides']));
}

$email = trim(strtolower($data['email'] ?? ''));
$password = $data['password'] ?? '';

// Validation simple
if (empty($email) || empty($password)) {
  die(json_encode(['success' => false, 'error' => 'Email et mot de passe requis']));
}

// Connexion à la BD
$conn = getConnection();

// Chercher l'utilisateur par email
$stmt = $conn->prepare("SELECT id, nom, prenom, email, password FROM utilisateurs WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
  die(json_encode(['success' => false, 'error' => 'Email ou mot de passe incorrect']));
}

$user = $result->fetch_assoc();

// Vérifier le mot de passe
if (!verifyPassword($password, $user['password'])) {
  die(json_encode(['success' => false, 'error' => 'Email ou mot de passe incorrect']));
}

$user = $result->fetch_assoc();

// Créer la session
loginUser($user['id']);

echo json_encode([
  'success' => true,
  'message' => 'Connexion réussie',
  'user' => [
    'id' => $user['id'],
    'nom' => $user['nom'],
    'prenom' => $user['prenom'],
    'email' => $user['email']
  ]
  ]);

  $stmt->close();
  $conn->close();
?>