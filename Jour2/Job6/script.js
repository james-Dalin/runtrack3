let CodeKonami = [ //Je définie le code de Konami a exécuter
  "ArrowUp", 
  "ArrowUp", 
  "ArrowDown", 
  "ArrowDown", 
  "ArrowLeft", 
  "ArrowRight", 
  "ArrowLeft", 
  "ArrowRight",
  "b",
  "a"];

// Je fais un historique des touches pressées
let touchesPressees = [];

// Je créais l'écoute des touches
document.addEventListener("keydown", function(event) {
  // J'ajoue les touches à l'historique
  touchesPressees.push(event.key);

  // Je limite la taille de l'historique
  if (touchesPressees.length > CodeKonami.length) {
    touchesPressees.shift();
  }

  // Vérifier si le code est bon
  if (verifierCode()) {
    activerStyle();
  }
});

// Fonction pour vérifier si le code correspond
function verifierCode() {
  // Comparaison des deux tableaux
  return touchesPressees.join(",") === CodeKonami.join(',');
}

// Fonction pour activer le style
function activerStyle() {
  // J'ajoute la classe CSS
  document.body.classList.add("konami-active");

  //Création du message de succès du code Konami
  let message = document.createElement("div");
  message.id = "konami-message";
  message.textContent = "🎮 Code Konami réussi !";
  document.body.appendChild(message);

  // Retirer le message après 3 secondes
  setTimeout(function() {
    message.style.opacity = "0";
  }, "4000");
}