function tri(numbers, order) { // Je crée la fonction "tri" pour trier les nombres dans l'ordre croissant ou décroissant
    // Méhtode explicite avec deux appels séparés
    if (order === "asc") { // Tri ascendant (croissant : 1, 2, 3...)
        numbers.sort(function(a, b) {
            return a - b;
        });
    } else if (order === "desc") { // Tri décroissant (descendant : 9, 8, 7...)
        numbers.sort(function(a, b) {
            return b - a;
        });
    } else {
        console.log("Tri invalide : utiliser un 'asc' ou 'desc'");
    }
    return numbers; 
}

// test de base avec des chiffres et nombres entiers
console.log(tri([3, 1, 5, 7, 89, 23, 12, 2], "asc"));
console.log(tri([7, 5, 18, 16, 9, 88, 33], "desc"));

// test avec des ciffres et des nombres négatifs
console.log(tri([1, 15, 4, -5, -8, -12, 55, 85], "asc"));
console.log(tri([8, -84, 44, -12, -8, -25, 5, 100], "desc"));

// test avec doublons
console.log(tri([1, 1, 5, 5, 8, 7, 2, 10, 56], "asc"));
console.log(tri([3, 3, 54, 54, 87, 8, 4, 10, 64], "desc"));