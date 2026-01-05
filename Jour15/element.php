<?php 
require 'includes/db.php';

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM Pokemon WHERE id = ?");
$stmt->execute([$id]);
$pokemon = $stmt->fetch();

if (!$pokemon) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($pokemon['name']) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main class="element-detail">
        <h1><?= htmlspecialchars($pokemon['name']) ?></h1>
        <p><strong>Type :</strong> <?= htmlspecialchars($pokemon['type']) ?></p>
        <p><strong>Génération :</strong> <?= $pokemon['generation'] ?></p>
        <p><?= htmlspecialchars($pokemon['description']) ?></p>
        <?php if ($pokemon['imageUrl']): ?>
            <img src="<?= htmlspecialchars($pokemon['imageUrl']) ?>" alt="<?= $pokemon['name'] ?>">
        <?php endif; ?>
    </main>
</body>
</html>
