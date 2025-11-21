$(document).ready(function(){

  let imageSelectionnee = null;

  // 1. Bouton pour mélanger les images aléatoirement
  $("#melanger").click(function() {
    // 1.1°) Récupérer les images
    let images = $("#rainbow-container img").toArray();

    // 1.2°) Mélanger le tableau
    images = melangerTableau(images);

    // 1.3°) Vider le container et le réinsérer
    $("#rainbow-container").empty();

    // 1.4°) Ajouter les images mélangées
    images.forEach(function(img) {
      $("#rainbow-container").append(img);
    });

    // 1.5°) Réinitialiser le message
    $("#message").text("");
    imageSelectionnee = null;
  });

  // 2. Clic sur une image
  $(document).on("click", "#rainbow-container img", function() {
    if (imageSelectionnee === null) {
      // 2.1°) Première sélection
      imageSelectionnee = $(this);
      $(this).addClass("selected");
    } else {
      // 2.2°) Échanger
      echangerImages(imageSelectionnee, $(this));
      imageSelectionnee.removeClass("selected");
      imageSelectionnee = null;
    }
  });

  // 3. Bouton de vérification 
  $("#verifier").click(function() {
    if (verifierOrdre()) {
      $("#message").text("Vous avez gagné !").css("color", "green");
    } else {
      $("#message").text("Vous avez perdu").css("color", "red");
    }
  });

  // 4. Fonction pour le mélange des images
  function melangerTableau(tableau) {
    return tableau.sort(() => Math.random() - 0.5);
  }

  // 5. Fonction pour échanger
  function echangerImages(img1, img2) {
    let tempSrc = img1.attr("src");
    let tempOrder = img1.attr("data-order");

    img1.attr("src", img2.attr("src"));
    img1.attr("data-order", img2.attr("data-order"));

    img2.attr("src", tempSrc);
    img2.attr("data-order", tempOrder);
  }

  // 6. Fonction pour vérifier l'ordre des images
  function verifierOrdre() {
    let images = $("#rainbow-container img");
    let correct = true;

    images.each(function(index) {
      let ordreAttendu = index + 1;
      let ordreActuel = parseInt($(this).attr("data-order"));

      if (ordreActuel !== ordreAttendu) {
        correct = false;
      }
    });

    return correct;
  }
})