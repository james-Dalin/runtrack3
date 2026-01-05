<?php 
require 'includes/db.php';

$search = $_GET['search'] ?? '';
$search = htmlspecialchars($search);

// Requête: recherche exact + partial
$stmt = $pdo->prepare("
    SELECT * FROM Pokemon 
    WHERE name LIKE ? OR type LIKE ?
    ORDER BY name
");
$stmt->execute(['%'.$search.'%', '%'.$search.'%']);
$results = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Résultats - <?= $search ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main>
        <h2>Résultats pour "<?= $search ?>"</h2>
        <?php if ($results): ?>
            <ul class="results-list">
            <?php foreach ($results as $result): ?>
                <li>
                    <a href="element.php?id=<?= $result['id'] ?>">
                        <?= $result['name'] ?> - <?= $result['type'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucun résultat trouvé.</p>
        <?php endif; ?>
    </main>
</body>
</html>
