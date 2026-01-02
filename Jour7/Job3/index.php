<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Jour 8 Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- ========== HEADER STYLISÉ ========== -->
<header class="bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-xl sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        
        <!-- Logo/Branding -->
        <div class="flex items-center gap-3">
            <div class="text-3xl font-bold bg-white text-blue-600 px-3 py-1 rounded-lg">
                🚀
            </div>
            <div>
                <h1 class="text-2xl font-bold">Mon App</h1>
                <p class="text-blue-100 text-xs">Jour 8 - Tailwind CSS</p>
            </div>
        </div>

        <!-- Navigation Links -->
        <ul class="hidden md:flex gap-8 items-center">
            <li>
                <a href="index.php#accueil" class="text-white font-semibold hover:text-blue-200 transition duration-300 relative group">
                    Accueil
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-200 group-hover:w-full transition-all duration-300"></span>
                </a>
            </li>
            <li>
                <a href="index.php#inscription" class="text-white font-semibold hover:text-blue-200 transition duration-300 relative group">
                    Inscription
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-200 group-hover:w-full transition-all duration-300"></span>
                </a>
            </li>
            <li>
                <a href="index.php#connexion" class="text-white font-semibold hover:text-blue-200 transition duration-300 relative group">
                    Connexion
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-200 group-hover:w-full transition-all duration-300"></span>
                </a>
            </li>
            <li>
                <a href="index.php#recherche" class="text-white font-semibold hover:text-blue-200 transition duration-300 relative group">
                    Rechercher
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-200 group-hover:w-full transition-all duration-300"></span>
                </a>
            </li>
        </ul>

        <!-- Bouton CTA (Call-To-Action) -->
        <button class="hidden md:block bg-white text-blue-600 font-bold px-6 py-2 rounded-lg hover:bg-blue-50 transition duration-300 shadow-lg">
            Se Connecter
        </button>

        <!-- Mobile Menu Button (Hamburger) -->
        <button class="md:hidden text-white text-2xl" id="mobile-menu-btn">
            ☰
        </button>
    </nav>

    <!-- Mobile Menu (Caché par défaut) -->
    <div id="mobile-menu" class="hidden md:hidden bg-blue-700 px-6 py-4 space-y-2">
        <a href="index.php#accueil" class="block text-white hover:text-blue-200 py-2">Accueil</a>
        <a href="index.php#inscription" class="block text-white hover:text-blue-200 py-2">Inscription</a>
        <a href="index.php#connexion" class="block text-white hover:text-blue-200 py-2">Connexion</a>
        <a href="index.php#recherche" class="block text-white hover:text-blue-200 py-2">Rechercher</a>
        <button class="w-full bg-white text-blue-600 font-bold py-2 rounded-lg mt-4">Se Connecter</button>
    </div>
</header>

<!-- Script pour le mobile menu -->
<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', () => {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>


    <!-- ========== MAIN CONTENT ========== -->
    <main class="max-w-6xl mx-auto px-6 py-12">
        <div class="bg-white rounded-lg shadow-lg p-8">
            
            <h1 class="text-4xl font-bold text-gray-800 mb-2">📝 Créer un Compte</h1>
            <p class="text-gray-600 mb-8">Remplissez le formulaire ci-dessous pour vous inscrire</p>

            <!-- ========== FORMULAIRE ========== -->
            <form method="POST" action="index.php" class="space-y-8">

                <!-- ========== SECTION CIVILITÉ ========== -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Civilité</label>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="civilite" value="Monsieur" class="w-4 h-4" required>
                            <span class="text-gray-700">Monsieur</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="civilite" value="Madame" class="w-4 h-4" required>
                            <span class="text-gray-700">Madame</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="civilite" value="Autre" class="w-4 h-4" required>
                            <span class="text-gray-700">Autre</span>
                        </label>
                    </div>
                </div>

                <!-- ========== PRENOM ========== -->
                <div>
                    <label for="prenom" class="block text-sm font-semibold text-gray-700 mb-2">Prénom</label>
                    <input 
                        type="text" 
                        id="prenom" 
                        name="prenom" 
                        placeholder="Jean"
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition"
                        required
                    >
                </div>

                <!-- ========== NOM ========== -->
                <div>
                    <label for="nom" class="block text-sm font-semibold text-gray-700 mb-2">Nom</label>
                    <input 
                        type="text" 
                        id="nom" 
                        name="nom" 
                        placeholder="Dupont"
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition"
                        required
                    >
                </div>

                <!-- ========== ADRESSE ========== -->
                <div>
                    <label for="adresse" class="block text-sm font-semibold text-gray-700 mb-2">Adresse</label>
                    <input 
                        type="text" 
                        id="adresse" 
                        name="adresse" 
                        placeholder="123 Rue de la Paix"
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition"
                        required
                    >
                </div>

                <!-- ========== EMAIL ========== -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="jean@example.com"
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition"
                        required
                    >
                </div>

                <!-- ========== MOTDE PASSE ========== -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Mot de Passe</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="••••••••"
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition"
                        required
                    >
                    <p class="text-xs text-gray-500 mt-2">Au minimum 8 caractères, avec majuscule, minuscule et chiffre</p>
                </div>

                <!-- ========== CONFIRMATION MDP ========== -->
                <div>
                    <label for="confirm_password" class="block text-sm font-semibold text-gray-700 mb-2">Confirmer le Mot de Passe</label>
                    <input 
                        type="password" 
                        id="confirm_password" 
                        name="confirm_password" 
                        placeholder="••••••••"
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition"
                        required
                    >
                </div>

                <!-- ========== PASSIONS (CHECKBOXES) ========== -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Vos Passions</label>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="passions" value="informatique" class="w-4 h-4">
                            <span class="text-gray-700">💻 Informatique</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="passions" value="voyages" class="w-4 h-4">
                            <span class="text-gray-700">✈️ Voyages</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="passions" value="sport" class="w-4 h-4">
                            <span class="text-gray-700">⚽ Sport</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="passions" value="lecture" class="w-4 h-4">
                            <span class="text-gray-700">📚 Lecture</span>
                        </label>
                    </div>
                </div>

                <!-- ========== BOUTON SUBMIT ========== -->
                <div class="flex gap-4 pt-6">
                    <button 
                        type="submit"
                        class="flex-1 bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition shadow-lg"
                    >
                        ✅ S'inscrire
                    </button>
                    <button 
                        type="reset"
                        class="flex-1 bg-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg hover:bg-gray-400 transition"
                    >
                        🔄 Réinitialiser
                    </button>
                </div>

            </form>

        </div>
    </main>

<!-- ========== FOOTER STYLISÉ ========== -->
<footer class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-gray-100 mt-16">
    
    <!-- Main Footer Content -->
    <div class="max-w-7xl mx-auto px-6 py-16">
        
        <!-- Grid Layout: 4 colonnes sur desktop, 2 sur tablette, 1 sur mobile -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            
            <!-- Colonne 1: À propos -->
            <div class="space-y-4">
                <div class="flex items-center gap-2 mb-6">
                    <div class="text-2xl">🚀</div>
                    <h3 class="text-xl font-bold text-white">Mon App</h3>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Plateforme moderne de gestion d'utilisateurs construite avec Tailwind CSS et PHP.
                </p>
                <div class="flex gap-4 pt-4">
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300 text-lg">
                        f
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300 text-lg">
                        𝕏
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300 text-lg">
                        in
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300 text-lg">
                        📧
                    </a>
                </div>
            </div>

            <!-- Colonne 2: Navigation -->
            <div class="space-y-4">
                <h4 class="text-white font-bold text-lg mb-6 relative inline-block">
                    Navigation
                    <span class="absolute bottom-0 left-0 w-12 h-0.5 bg-blue-500"></span>
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="index.php#accueil" class="text-gray-400 hover:text-white transition duration-300 flex items-center gap-2">
                            <span class="text-blue-500">→</span> Accueil
                        </a>
                    </li>
                    <li>
                        <a href="index.php#inscription" class="text-gray-400 hover:text-white transition duration-300 flex items-center gap-2">
                            <span class="text-blue-500">→</span> Inscription
                        </a>
                    </li>
                    <li>
                        <a href="index.php#connexion" class="text-gray-400 hover:text-white transition duration-300 flex items-center gap-2">
                            <span class="text-blue-500">→</span> Connexion
                        </a>
                    </li>
                    <li>
                        <a href="index.php#recherche" class="text-gray-400 hover:text-white transition duration-300 flex items-center gap-2">
                            <span class="text-blue-500">→</span> Rechercher
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Colonne 3: Ressources -->
            <div class="space-y-4">
                <h4 class="text-white font-bold text-lg mb-6 relative inline-block">
                    Ressources
                    <span class="absolute bottom-0 left-0 w-12 h-0.5 bg-green-500"></span>
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300 flex items-center gap-2">
                            <span class="text-green-500">📚</span> Documentation
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300 flex items-center gap-2">
                            <span class="text-green-500">🎓</span> Tutoriels
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300 flex items-center gap-2">
                            <span class="text-green-500">📝</span> Blog
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300 flex items-center gap-2">
                            <span class="text-green-500">❓</span> FAQ
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Colonne 4: Légal -->
            <div class="space-y-4">
                <h4 class="text-white font-bold text-lg mb-6 relative inline-block">
                    Légal
                    <span class="absolute bottom-0 left-0 w-12 h-0.5 bg-purple-500"></span>
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300 flex items-center gap-2">
                            <span class="text-purple-500">⚖️</span> Conditions
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300 flex items-center gap-2">
                            <span class="text-purple-500">🔒</span> Confidentialité
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300 flex items-center gap-2">
                            <span class="text-purple-500">🍪</span> Cookies
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300 flex items-center gap-2">
                            <span class="text-purple-500">📞</span> Contact
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Séparateur -->
        <div class="border-t border-gray-700 my-8"></div>

        <!-- Bottom Footer: Newsletter + Copyright -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            
            <!-- Newsletter Subscribe -->
            <div class="space-y-3">
                <h5 class="text-white font-bold text-sm">📧 Inscrivez-vous à notre newsletter</h5>
                <div class="flex gap-2">
                    <input 
                        type="email" 
                        placeholder="Votre email..." 
                        class="flex-1 px-4 py-2 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-500"
                    >
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-2 rounded-lg transition duration-300">
                        S'abonner
                    </button>
                </div>
            </div>

            <!-- Copyright & Statistics -->
            <div class="text-center md:text-right space-y-2">
                <p class="text-gray-400 text-sm">
                    &copy; 2026 <span class="text-white font-bold">Mon App</span>. Tous droits réservés.
                </p>
                <div class="flex justify-center md:justify-end gap-6 text-gray-400 text-xs">
                    <span>✨ <strong class="text-white">10K+</strong> utilisateurs</span>
                    <span>⭐ <strong class="text-white">4.9/5</strong> rating</span>
                    <span>🚀 <strong class="text-white">99.9%</strong> uptime</span>
                </div>
            </div>

        </div>
    </div>

    <!-- Scroll to Top Button (Fixe en bas à droite) -->
    <button 
        id="scroll-to-top" 
        class="fixed bottom-8 right-8 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg transition duration-300 hidden"
        onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
        title="Retour au haut"
    >
        ↑
    </button>

</footer>

<!-- Script pour le bouton scroll to top -->
<script>
    const scrollBtn = document.getElementById('scroll-to-top');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollBtn.classList.remove('hidden');
        } else {
            scrollBtn.classList.add('hidden');
        }
    });
</script>


</body>
</html>
