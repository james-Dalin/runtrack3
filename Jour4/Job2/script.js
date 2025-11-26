function jsonValueKey(json, key) {
    try{
        let objet = JSON.parse(json);
        return objet[key];
    } catch (erreur){
        console.error("Erreur :", erreur);
        return null;
    }
}

let jsonString = '{"name" : "La Plateforme_", "address": "8 rue d\'hozier", "city": "Marseille", "nb_staff": "11", "creation": "2019"}';

console.log(jsonValueKey(jsonString, "city"));
console.log(jsonValueKey(jsonString, "name"));
console.log(jsonValueKey(jsonString, "address"));
console.log(jsonValueKey(jsonString, "nb_staff"));