function afficherExpression() {
    let paragrapheExiste = document.querySelector("#expression");
    if (paragrapheExiste) {
        return;
    }

    fetch("expression.txt") // Lance une requête pour récuéprer le fichier
        .then(reponse => reponse.text())
        .then(contenu => {
            let paragraphe = document.createElement("p");
            paragraphe.id = "expression";
            paragraphe.textContent = contenu;
            document.body.appendChild(paragraphe);
        })
    .catch(erreur => {
        console.error("Erreur:", erreur);
    });
}

let button = document.querySelector("#button");
button.addEventListener("click", afficherExpression);