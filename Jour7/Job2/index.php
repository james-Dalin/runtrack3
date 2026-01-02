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

    <!-- ========== FOOTER ========== -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-6xl mx-auto px-6 py-8">
            <div class="grid grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="font-bold mb-4">Navigation</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="index.php" class="hover:text-white transition">Accueil</a></li>
                        <li><a href="index.php" class="hover:text-white transition">Inscription</a></li>
                        <li><a href="index.php" class="hover:text-white transition">Connexion</a></li>
                        <li><a href="index.php" class="hover:text-white transition">Rechercher</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4">Ressources</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Documentation</a></li>
                        <li><a href="#" class="hover:text-white transition">Tutoriels</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4">Légal</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Conditions</a></li>
                        <li><a href="#" class="hover:text-white transition">Confidentialité</a></li>
                        <li><a href="#" class="hover:text-white transition">Cookies</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4">Suivez-nous</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Facebook</a></li>
                        <li><a href="#" class="hover:text-white transition">Twitter</a></li>
                        <li><a href="#" class="hover:text-white transition">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-6 text-center text-gray-400">
                <p>&copy; 2026 Mon App. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

</body>
</html>
