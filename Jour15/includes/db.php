<?php
// PDO = interface moderne et sécurisée pour MySQL
$dsn = 'mysql:host=localhost;dbname=autocompletion;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}
?>
