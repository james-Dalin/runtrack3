$(document).ready(function() {
    // Je créer le bouton pour montrer
    $("#btnShow").click(function(){
        $("#citation").text("Les logiciels et les cathédrales, c'est un peu la même chose - d'abord on les construit, ensuite on prie.").show();
    });
    // Je créer le bouton pour cacher
    $("#btnHide").click(function(){
        $("#btnHide").click(function(){
            $("#citation").hide();
        });
    });
});

