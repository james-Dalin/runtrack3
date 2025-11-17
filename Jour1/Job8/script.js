function estPremier(nombre) {
  if (nombre < 2) {
    return false; //0, 1 et les nombres négatifs ne sont pas premiers
  }

  if (nombre === 2) {
    return true; // 2 est le seul nombre premier pair
  }

  if (nombre % 2 === 0) {
    return false; // Tous les pairs superieur à 2 ne sont pas premiers
  }

  for (let i = 3 ; i <= Math.sqrt(nombre) ; i += 2) {
    if (nombre % i === 0 ) {
      return false;
    }
  }

  return true;
}

function sommesNombresPremiers(a, b) {
  if (estPremier(a) && estPremier(b)) {
    return a + b ;
  } else {
    return false;
  }
}

// Test simples 

console.log(sommesNombresPremiers(3, 5));
console.log(sommesNombresPremiers(7, 11));
console.log(sommesNombresPremiers(4, 5));
console.log(sommesNombresPremiers(3, 9));
console.log(sommesNombresPremiers(4, 6));
console.log(sommesNombresPremiers(9, 16));

// TEST avec les limites

console.log(sommesNombresPremiers(1, 2));
console.log(sommesNombresPremiers(2, 2));
console.log(sommesNombresPremiers(2, 3));
console.log(sommesNombresPremiers(0, 5));
console.log(sommesNombresPremiers(-5, 2));
console.log(sommesNombresPremiers(-5, 7));