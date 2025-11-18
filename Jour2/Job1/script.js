function citation() {
    let article = document.querySelector("#citation");
    let texte = article.textContent;
    console.log(texte);
}

let bouton = document.querySelector("#button");
bouton.addEventListener("click", citation);