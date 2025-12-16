// ========== FONCTION POUR CHANGER LE CSS EN FONCTION DE LA RÉSOLUTION ==========

function updateStyle() {
    // Récupérer la largeur actuelle de la fenêtre
    const width = window.innerWidth;
    const height = window.innerHeight;

    // Afficher la résolution
    document.getElementById('width').textContent = width;
    document.getElementById('height').textContent = height;

    // Déterminer quel CSS charger en fonction de la largeur
    let styleSheet;
    let styleName;

    if (width < 1280) {
        // < 1200px -> style4.css (blanc)
        styleSheet = 'style4.css';
        styleName = 'style4.css';
    } else if (width >= 1280 && width < 1680) {
        // 1200px - 1680 -> style3.css (bleu)
        styleSheet = 'style3.css';
        styleName = 'style3.css';
    } else if (width >= 1680 && width <= 1920) {
        // 1680 - 1920 -> style2.css (jaune)
        styleSheet = 'style2.css';
        styleName = 'style2.css';
    } else {
        // 1920px -> style1.css (bleu clair - defaut)
        styleSheet = 'style1.css';
        styleName = 'style1.css';
    }

    // Changer le lien du CSS
    document.getElementById('responsive-style').href = styleSheet;

    // Afficher quel CSS est actif
    document.getElementById('active-style').textContent = styleName;

    console.log(`✅ Chargement de style : ${styleName} (${width}px)`);
}

// ========== APPELER LA FONCTION AU CHARGEMENT ==========
document.addEventListener('DOMContentLoaded', updateStyle);

// ========== APPELER LA FONCTION À CHAQUE REDIMENSIONNEMENT ==========
window.addEventListener('resize', updateStyle);