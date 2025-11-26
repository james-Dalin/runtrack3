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

document.getElementById("btnFiltrer").addEventListener("click", function()) {

};