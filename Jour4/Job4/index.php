<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
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
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="usersTable">
                <tr>
                    <td colspan="4" class="loading">Cliquez sur "Mettre à jour" pour charger les utilisateurs</td>
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
                    console.log('Données reçues:', data);

                    // Vérifier s'il y a une erreur
                    if (data.error) {
                        displayError(data.error);
                        return;
                    }

                    // Remplir le tableau
                    fillTable(data);
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    displayError('Erreur réseau: ' + error.message);
                });
        }

        // ========== REMPLIR LE TABLEAU AVEC LES DONNÉES ==========
        function fillTable(users) {
            const tbody = document.getElementById('usersTable');
            
            // Vider le tableau
            tbody.innerHTML = '';

            // Vérifier si des utilisateurs existent
            if (users.length === 0) {
                tbody.innerHTML = '<tr><td colspan="4" class="loading">Aucun utilisateur trouvé</td></tr>';
                return;
            }

            // Ajouter chaque utilisateur
            users.forEach(user => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${user.id}</td>
                    <td>${user.nom}</td>
                    <td>${user.prenom}</td>
                    <td>${user.email}</td>
                `;
                tbody.appendChild(row);
            });

            console.log(`✅ ${users.length} utilisateur(s) affichés`);
        }

        // ========== AFFICHER LES ERREURS ==========
        function displayError(message) {
            const errorDiv = document.getElementById('error');
            errorDiv.textContent = '❌ ' + message;
            errorDiv.style.display = 'block';
        }

        // Charger les utilisateurs au démarrage
        updateTable();
    </script>
</body>
</html>