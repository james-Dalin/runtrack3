window.addEventListener("scroll", function() {
    // 1°) Récuéprer les valeurs nécessaires
    let scrollY = window.scrollY;
    let hauteurTotale = document.documentElement.scrollHeight;
    let hauteurFenetre = window.innerHeight;

    // 2°) Je calcule la hauteur scrollabe
    let hauteurScrollable = hauteurTotale - hauteurFenetre;

    // 3°) Je calcule le pourcentage du scroll
    let pourcentage = (scrollY / hauteurScrollable) * 100;

    // 4°) Je calcule la teinte (0 = rouge, 120 = vert)
    let hue = (pourcentage / 100) * 120; // 0% = 0 (rouge), 100% = 120% (vert)

    // 5°) Récupérer le footer et modifier sa couleur
    let footer = document.querySelector("#progressBar");
    footer.style.backgroundColor = `hsl(${hue}, 100%, 50%)`;
});