/*Créez une fonction fizzbuzz qui ne prend pas de paramètre. Dans cette fonction,
affichez dans la console web les nombres de 1 à 151. Remplacez certains nombres par
un mot selon les conditions suivantes :
● Si le nombre est un multiple de 3, affichez “Fizz”.
● Si le nombre est un multiple de 5, affichez “Buzz”.
● Si le nombre est un multiple de 3 et de 5, affichez “FizzBuzz”.*/

function fizzBuzz() //Je créer la fonction fizzbuzz
{
  for (let compte = 1 ; compte <= 151 ; compte++) {
    if (compte % 3 === 0 && compte % 5 === 0) {
      console.log("FizzBuzz");
    } else if (compte % 3 === 0) {
      console.log("Fizz");
    } else if (compte % 5 === 0) {
      console.log("Buzz");
    } else {
      console.log(compte);
    }
  }
}

fizzBuzz();

// Je connais déjà le nombre à atteindre, donc la boucle "for" est la plus appropriée
// dans la boucle if...elseif je donne les conditions à remplir "si il y a un chiffre qui est un multiple de 3 ET de 5, j'affiche FizzBuzz."
// La même chsoe pour le reste, et avec le else, j'affiche tous les nombres
// puis j'appelle la fonction