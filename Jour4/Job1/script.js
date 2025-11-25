function afficherExpression() {
    fetch("expression.txt") // Lance une requête pour récuéprer le fichier
        .then(reponse => reponse.text())
        .then(contenu => {
            let paragraphe = document.createElement("p");
            paragraphe.textContent = contenu;
            document.body.appendChild(paragraphe);
        })
    .catch(erreur => {
        console.log("Erreur:", erreur);
    })
}

let button = document.querySelector("#button");
button.addEventListener("click", afficherExpression);