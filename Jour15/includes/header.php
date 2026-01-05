<?php
// Assurez-vous que $pdo est disponible (inclus avant ce fichier)
?>
<header class="search-header">
    <div class="search-container">
        <form action="recherche.php" method="GET" id="search-form">
            <div class="search-box">
                <input 
                    type="text" 
                    id="search-input" 
                    name="search" 
                    placeholder="Rechercher un pokémon..."
                    autocomplete="off"
                >
                <ul id="suggestions" class="suggestions-list"></ul>
            </div>
            <button type="submit">Rechercher</button>
        </form>
    </div>
</header>

<script src="js/autocomplete.js"></script>
