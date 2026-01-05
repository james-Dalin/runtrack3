<?php
header('Content-Type: application/json; charset=utf-8');
require '../includes/db.php';

$q = $_GET['q'] ?? '';

if (strlen($q) < 1) {
    echo json_encode(['exact' => [], 'partial' => []]);
    exit;
}

// Requêtes SQL optimisées
$exact = $pdo->prepare("
    SELECT id, name, type FROM Pokemon 
    WHERE name LIKE ? 
    ORDER BY name 
    LIMIT 10
");
$exact->execute([$q . '%']); // Commence par q

$partial = $pdo->prepare("
    SELECT id, name, type FROM Pokemon 
    WHERE name LIKE ? AND name NOT LIKE ?
    ORDER BY name 
    LIMIT 10
");
$partial->execute(['%' . $q . '%', $q . '%']); // Contient q, mais pas au début

echo json_encode([
    'exact' => $exact->fetchAll(),
    'partial' => $partial->fetchAll()
]);
?>
