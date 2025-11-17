let nombres1 = [0, 29, 1, 25, 4, 8];
nombres1.sort(); // .sort, par défaut, est en TEXTE et non en nombre. JS compare les nombre en chaîne et fait "29" < "4" dans l'ordre alphabétique
console.log(nombres1); // 0, 29, 1, 25, 4, 8 ce qui est faux. Aucun tri n'a été effectué. La console m'affiche le tableau tel quel. 

let nombres = [9, 10, 5, 30, 89,100, 234];
nombres.sort(function(a, b) { // Pour trier, je dois mettre une fonction dans le .sort pour faire la comparaison
    return b - a;
});

console.log(nombres);