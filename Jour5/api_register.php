<?php

require 'config.php';

header ('Content-Type: application/json');

// Récupérer les données de JSON

$data = json_decode(file_get_contents('php://input'), true);

// Vérifier que les données existent
if (!$data) {
    die(json_encode(['success' => false, 'error' => 'Données invalides']));
}

$nom = trim($data['nom'] ?? '');
$prenom = trim($data['prenom'] ?? '');
$email = trim(strtolower($data['email'] ?? ''));
$password = $data['password'] ?? '';

// Validation serveur
$errors = [];

if (empty($nom)) $errors['nom'] = 'Le nom est requis';
if (empty($prenom)) $errors['prenom'] = 'Le prénom est requis';
if (empty($email)) $errors['email'] = 'L\'email est requis';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Email invalide';
if (strlen($password) < 8) $errors['password'] = 'Au minimum 8 caractères';

if (!empty($errors)) {
    die(json_encode(['success' => false, 'error' => 'Erreurs de validation', 'errors' => $errors]));
}

// Connexion à la BD
$conn = getConnection();

// Vérifier que l'email n'existe pas
$stmt = $conn->prepare("SELECT id FROM utilisateurs WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    die(json_encode(['success' => false, 'error' => 'Cet email existe déjà']));
}

// Hasher le mot de passe
$hasPassword = hashPassword($password);

// Insérer l'utilisateur
$stmt = $conn->prepare("INSERT INTO utilisateurs (nom, prenom, email, password) VALUES (?, ?, ?, ?,)");
$stmt->bind_param("ssss", $nom, $prenom, $email, $hashedPassword);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Inscription réussie']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'inscription']);
}

$stmt->close();
$conn->close();