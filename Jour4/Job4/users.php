<?php
header('Content-Type: application/json');

// ========== CONNEXION BDD ==========
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'users_app';

$conn = new mysqli($host, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connexion échouée: ' . $conn->connect_error]));
}

// ========== RÉCUPÉRER LES UTILISATEURS ==========
$sql = "SELECT id, nom, prenom, email FROM utilisateurs";
$result = $conn->query($sql);

if (!$result) {
    die(json_encode(['error' => 'Erreur requête: ' . $conn->error]));
}

// ========== CONSTRUIRE LE TABLEAU DE DONNÉES ==========
$users = [];

while ($row = $result->fetch_assoc()) {
    $users[] = [
        'id' => $row['id'],
        'nom' => $row['nom'],
        'prenom' => $row['prenom'],
        'email' => $row['email']
    ];
}

// ========== RENVOYER EN JSON ==========
echo json_encode($users);

$conn->close();
?>