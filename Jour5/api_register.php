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

