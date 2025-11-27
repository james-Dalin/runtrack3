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
document.getElementById("btnFiltrer").addEventListener("click", function()) {
    let resultats = filtrer???(???);
    afficher???(resultats);
};

// Fonction : remplir la select avec le type
function remplir???(pokémons) {
    let types = pokémons.map(pokemon => pokemon.???);
    let typesUniques = new ??? types);

    let select = document.getElementById("inputType");
    typesUniques.forEach(type => {
        let option = document.createElement("???");
        option.value = type;
        option.textContent = type;
        select.appendChild(option);
    });
}

// Fonction : Filtrer les Pokémons
function filtrer???(pokémons) {
    let id = document.getElementById("inputId").???;
    let nom = document.getElementById("inputNom").???;
    let type = document.getElementById("inputType").???;
}