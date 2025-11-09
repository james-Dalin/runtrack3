/**
 * Créez une fonction “afficherjourssemaines”. Cette fonction ne prend pas de paramètre. 
 * Créez un tableau de strings “jourssemaines” qui contient l’ensemble des jours de la semaine, du Lundi au Dimanche.  
 * Ensuite à l’aide d’une boucle for (for!)Affichez un par un ces jours.
 */



function afficherJoursSemaines() {
    let joursSemaines = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];

    for (let i = 0 ; i < joursSemaines.length ; i++) {
      console.log(joursSemaines[i]);
    }
}

afficherJoursSemaines();


