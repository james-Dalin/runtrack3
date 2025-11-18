// La fonction showHide montre toute la procédure de l'événement une fois le bouton Affiché/Caché cliqué
function showHide () {
  // 1) vérifie si l'article existe déjà
  let article = document.querySelector("#article-toggle");

  //vérification
  console.log("Élément trouvé : ", article); // Doit afficher null ou élément

  if (article === null) {
  // 2) L'article n'existe pas, le créer
  console.log("Article créé") // vérifie si ça s'affiche dans la console, donc bien créé
  let nouvelArticle = document.createElement("article") // Création de l'élément, mais ne l'affiche pas encore
  nouvelArticle.id = "article-toggle"; // Donne un nouvel id, pour le retrouver avec querySelector
  nouvelArticle.textContent = "L'important n'est pas la chute, mais l'atterrisage."; // Ajout du texte du nouvel élément
  // Exercice réussi, ajout de style css
  nouvelArticle.style.padding = "20px";
  nouvelArticle.style.backgroundColor = "#f0f0f0";  
  nouvelArticle.style.marginTop = "20px";  
  nouvelArticle.style.borderRadius = "5px";  
  // animation d'apparition
  nouvelArticle.style.opacity = "0";
  nouvelArticle.style.transition = "opacity 0.5s";
 // 3) J'ajoute l'élément à la page
  document.body.appendChild(nouvelArticle); // L'ajoute à la fin du <bod

  setTimeout(() => {
    nouvelArticle.style.opacity = "1";
  }, 10);

  } else {
    // 4) L'article existe, le supprimer
    console.log("Article supprimé") // Affiche dans la console si l'article a bien été supprimé
    article.remove();
 }
}

// 5) J'ajoute l'événement au bouton
let button = document.querySelector("#button");
button.addEventListener("click", showHide);