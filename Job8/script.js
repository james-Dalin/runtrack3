function estPremier(nombre) {
  if (nombre < 2) {
    return false; //0 et 1 sont des nombres négatifs qui ne sont pas premiers
  }

  if (nombre === 2) {
    return true; // 2 est le seul nombre premier pair
  }

  if (nombre % 2 === 0) {
    return false; // Tous les pairs superieur à 2 ne sont pas premiers
  }

  for (let i = 3 ; i <= Math.sqrt(nombre) ; i += 2) {
    if (nombre % i === 0 ) {
      return true;
    }
  }

  return "aucun diviseur trouvé";
}

console.log(estPremier(6));
console.log(estPremier(2));
console.log(estPremier(68));
console.log(estPremier(45));
console.log(estPremier(122));
console.log(estPremier(987));