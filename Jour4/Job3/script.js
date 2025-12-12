let tousLesPokemons = [];

// Au chargement
window.addEventListener("load", function() {
    fetch("pokemon.json")
    .then(reponse => reponse.json())
    .then(donnees => {
        tousLesPokemons = donnees;
        // Remplir le select des types
        remplirSelect(donnees);
    })
    .catch (erreur => console.error(erreur));
});

// Au clic du bouton
document.getElementById("btnFiltrer").addEventListener("click", function() {
    fetch("pokemon.json")
        .then(r => r.json())
        .then(donnees => {
            filtrerEtAfficher(donnees);
        });
});

// Fonction : remplir la select avec le type
function remplirSelect(pokémons) {
    let types = pokémons.map(pokemon => pokemon.type);
    let typesUniques = new Set(types);

    let select = document.getElementById("inputType");
    typesUniques.forEach(type => {
        let option = document.createElement("option");
        option.value = type;
        option.textContent = type;
        select.appendChild(option);
    });
}

// Fonction : Filtrer les Pokémons
function filtrerPokemon(pokémons) {
    let id = document.getElementById("inputId").value;
    let nom = document.getElementById("inputNom").value;
    let type = document.getElementById("inputType").value;

    let resultats = pokémons.filer(pokemon => {
        // Vérifier les critères
        if (id && pokemon.id != id) return false;
        if (nom && ! pokemon.name.toLowerCase().includes(nom.toLowerCase())) return false;
        if (type && pokemon.type !== type) return false;
        return true;

        // Fontion : afficher les résultats
        function afficherResultats(pokémons) {
            let conteneur = document.getElementById("resultats");
            conteneur.innerHTML = "";

            if (pokémons.lenght === 0) {
                conteneur.innerHTML = "<p>Aucun résultat</p>";
                return;
            }

            pokémons.forEach(pokemon => {
                let div = document.createElement("div");
                div.innerHTML = `<strong>ID: ${pokemon.id}</strong><br>
                Nom: ${pokemon.name}<br>
                Type: ${pokemon.type}`;
                conteneur.appendChild(div);
            })
        }
    });
}