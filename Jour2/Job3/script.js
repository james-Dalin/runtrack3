let compte = 0; // Varaible globale pour stocker le nombre de clique

function addone() {
    compte++; // Accède à la variable globale et l'augmente
    let paragraphe = document.querySelector("#compteur");
    paragraphe.textContent = "Clics : " + compte;
}

// Ajout d'un bouton reset

function reset() {
    compte = 0;
    let paragraphe = document.querySelector("#compteur");
    paragraphe.textContent = "Clics : " +  compte;
}

// Les paramètres pour le bouton
let bouton = document.querySelector("#button");
bouton.addEventListener("click", addone);
// Bouton reset
let boutonReset = document.querySelector("#reset");
boutonReset.addEventListener("click", reset);