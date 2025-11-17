/**
 * Déclarez une fonction “bisextile” qui prend en paramètre une variable “année”. 
 * Si l’année est bisextile, la fonction retourne true, sinon elle retourne false.
 */

function bisextile(annee) {
    if (annee % 400 === 0) {
        return true;
    } else if (annee % 100 === 0) {
        return false;
    } else if (annee % 4 === 0) {
        return true;
    } else {
        return false;
    }
}

console.log(bisextile(2024));
console.log(bisextile(2000));
console.log(bisextile(1900));
console.log(bisextile(2100));
console.log(bisextile(2105));
console.log(bisextile(2025));
console.log(bisextile(2400));
console.log(bisextile(7089));