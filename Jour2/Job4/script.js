document.addEventListener("keydown", function(event) {
    // 1) Je récupère la touche pressée
    let touche = event.key;

    // 2) Je vérifie si c'est une lettre (a-z ou A-Z)
    let estLettre = /^[a-zA-Z]$/.test(event.key);

    if (!estLettre) return // si c'est pas une lettre, sortir 

    // 3) Récupère le textarea
    let textArea = document.querySelector("#keylogger");

    // 4) Vérifier si le textarea à le focus
    let aLeFocus = document.activeElement === textArea;

    // 5) Ajouter la lettre (1 ou 2 fois selon le focus)
    if (aLeFocus) {
        textArea.value += touche + touche; // Deux fois 
    } else {
        textArea.value += touche; // Une fois
    }
});