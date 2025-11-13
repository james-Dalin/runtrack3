function jourTravaille(date) {

    // Extraire le jour, mois et annee
    let jour = date.getDate();
    let mois = date.getMonth(); // Attention : Va de 0 à 11 
    let annee = date.getFullYear();
    
    // Tableau des noms des mois
    let nomsMois = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
    let nomMois = nomsMois[mois];

    // Tableau des jours fériers
    let jourFeries2020 = [
    "2020-01-01", // Jour de l'an
    "2020-04-13", // Lundi de Pâques
    "2020-05-01", // Fête du travail
    "2020-05-08", // Victoire 1945
    "2020-05-21", // Ascension
    "2020-06-01", // Lundi de Pentecôte
    "2020-07-14", // Fête nationale
    "2020-08-15", // Assomption
    "2020-11-01", // Toussaint
    "2020-11-11", // Armistice 1918
    "2020-12-25"  // Noël
    ];

    let dateString = dateToString(date);

    // Je verifie si un jour est ferié
    if (jourFeries2020.includes(dateString)) {
        console.log(`Le ${jour} ${nomMois} ${annee} est un jour férié`);
    } 
    // Je vérifie si c'est un week-end
    else if (date.getDay() === 0 || date.getDay() === 6) {
        console.log(`Non, ${jour} ${nomMois} ${annee} est un week-end`);
    } 
    // Si ce n'est pas un jour férié et un week-end, c'est un jour travaillé
    else {
        console.log(`Oui, ${jour} ${nomMois} ${annee} est un jour travaillé`)
    }
}

function dateToString(date) {
    let annee = date.getFullYear();
    let mois = (date.getMonth() + 1).toString().padStart(2, "0");
    let jour = date.getDate().toString().padStart(2, "0");
    return `${annee}-${mois}-${jour}`;
}

jourTravaille(new Date(2020, 0, 1));