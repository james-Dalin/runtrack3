// /**
//  * Convertir une string JSON en objet JS : entrée et sortie => string à objet
//  */
// let texteJSON = '{"name": "LaPlateforme_", "city": "Marseille"}';
// let objet = JSON.parse(texteJSON);


// // APRES JSON parse()
// console.log(typeof objet);
// console.log(objet.city);

// /**
//  * Convertir un objet JS en string JSON : entré et sortie => objet à string ==> JSON.stringify
//  */
// let objet1 = {name: "La Plateforme", city: "Marseille" };
// let texteJSON1 = JSON.stringify(objet);

// // AVANT le JSON.stringify
// console.log(typeof objet);
// console.log(objet);

// // APRES le JSON.stringify
// console.log(typeof JSON);
// console.log(texteJSON);

function jsonValueKey(json, key) {
    let objet = JSON.parse(json);
    return objet[key];
}

let jsonString = '{"name" : "La Plateforme_", "address": "8 rue d\`hozier", "city": "Marseille", "nb_staff": "11", "creation": "2019"}';

console.log(jsonValueKey(jsonString, "city"));