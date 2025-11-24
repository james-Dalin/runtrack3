$(document).ready(function() {
    
    // Variables Globales
    let grille = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    let partieBloquee = false;

    // Initialiser la partie
    melangerGrille();
    afficherGrille();

    // Le clic sur une pièce
    $(document).on("click", ".piece:not(.vide)", function() {
        if (partieBloquee) return;

        let position = parseInt($(this).attr("data-position"));
        deplacerPiece(position);

        if (verifierVictoire()) {
            afficherVictoire();
        }
    });

    // Bouton pour recommencer
    $("#recommencer").click(function() {
        grille = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        melangerGrille();
        afficherGrille();

        // Réinitialiser l'état des images
        partieBloquee = false;
        $("#message").text("");
        $(this).hide();
    });

    // Fonction pour mélanger
    function melangerGrille() {
        grille = grille.sort(() => Math.random() - 0.5);
    }

    // Fonction pour afficher
    function afficherGrille() {
        $("#taquin-container").empty();

        grille.forEach(function(pieceId, position) {
           let pieceDiv = $("<div></div>")
            .addClass("piece")
            .attr("data-id", pieceId)
            .attr("data-position", position);

            if (pieceId === 9) {
                pieceDiv.addClass("vide");
            } else {
                let img = $("<img>").attr("src", `${pieceId}.png`);
                pieceDiv.append(img);
            }

            $("#taquin-container").append(pieceDiv);
        });
    }

    // Fonction pour déplacer les images
    function deplacerPiece(positionPiece) {
        let positionVide = grille.indexOf(9);

        if (!sontAdjacentes(positionPiece, positionVide)) {
            return; // Déplacement invalide
        }

        // Echanger
        [grille[positionPiece], grille[positionVide]] = 
            [grille[positionVide], grille[positionPiece]];

        afficherGrille();
    }

    // Fonction pour adjacent
    function sontAdjacentes(pos1, pos2) {
        let coord1= positionVersCoord(pos1); 
        let coord2= positionVersCoord(pos2);

        let diffLigne = Math.abs(coord1.ligne - coord2.ligne);
        let diffCol = Math.abs(coord1.colonne - coord2.colonne);

        return (diffLigne === 1 && diffCol === 0) ||
               (diffLigne === 0 && diffCol === 1);
    }

    // Fonction conversion position -> coordonnée
    function positionVersCoord(position) {
        let ligne = Math.floor(position / 3);
        let colonne = position % 3;
        return {ligne: ligne, colonne: colonne};
    }

    // Fonction vérifier victoire
    function verifierVictoire() {
        let ordreCorrect = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        return grille.join(",") === ordreCorrect.join(",");
    }

    // Fonction afficher victoire
    function afficherVictoire() {
        partieBloquee = true;
        $("#message").text("Vous avez gagné").css("color", "green");
        $("#recommencer").show();
    }
});