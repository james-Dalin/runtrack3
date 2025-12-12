<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>📋 Gestion des Utilisateurs</h1>

        <button class="btn-update" onclick="updateTable()">
            🔄 Mettre à jour
        </button>

        <div id="error" style="display: none;"></div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="usersTable">
                <tr>
                    <td colspan="3" class="loading">Cliquez sur "Mettre à jour" pour charger les utilisateurs</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        // ========== RÉCUPÉRER ET AFFICHER LES UTILISATEURS ==========
        function updateTable() {
            console.log('🔄 Mise à jour des utilisateurs...');

            fetch('users.php')
                .then(response => {
                    console.log('Status:', response.status);
                    return response.json();
                })
                .then(data => {
                    console.log('Données reçues', data);

                    // Vérifier s'il y a une erreur
                    if (data)
                })
        } 
    </script>
</body>
</html>