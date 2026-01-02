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
<main class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-purple-50 py-12 px-4">
    <div class="max-w-2xl mx-auto">
        
        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-block mb-4 p-3 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full">
                <span class="text-3xl">📝</span>
            </div>
            <h1 class="text-5xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-3">
                Créer un Compte
            </h1>
            <p class="text-gray-600 text-lg">Rejoignez notre communauté en quelques secondes</p>
        </div>

        <!-- Formulaire Container -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden backdrop-blur-sm">
            
            <!-- Formulaire Background Accent -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 pointer-events-none"></div>

            <form method="POST" action="index.php" class="relative p-8 md:p-12 space-y-8">

                <!-- ========== SECTION CIVILITÉ ========== -->
                <div class="bg-gradient-to-r from-blue-50 to-transparent p-6 rounded-xl border border-blue-200/50">
                    <label class="flex items-center gap-3 mb-4">
                        <span class="text-2xl">👤</span>
                        <span class="text-lg font-bold text-gray-800">Civilité</span>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <label class="relative flex items-center cursor-pointer group">
                            <input 
                                type="radio" 
                                name="civilite" 
                                value="Monsieur" 
                                class="sr-only peer"
                                required
                            >
                            <div class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-blue-400 transition-all duration-300 group-hover:shadow-md">
                                <span class="font-semibold text-gray-700 peer-checked:text-blue-600">👨 Monsieur</span>
                            </div>
                        </label>
                        
                        <label class="relative flex items-center cursor-pointer group">
                            <input 
                                type="radio" 
                                name="civilite" 
                                value="Madame" 
                                class="sr-only peer"
                                required
                            >
                            <div class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg peer-checked:border-purple-600 peer-checked:bg-purple-50 hover:border-purple-400 transition-all duration-300 group-hover:shadow-md">
                                <span class="font-semibold text-gray-700 peer-checked:text-purple-600">👩 Madame</span>
                            </div>
                        </label>
                        
                        <label class="relative flex items-center cursor-pointer group">
                            <input 
                                type="radio" 
                                name="civilite" 
                                value="Autre" 
                                class="sr-only peer"
                                required
                            >
                            <div class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg peer-checked:border-pink-600 peer-checked:bg-pink-50 hover:border-pink-400 transition-all duration-300 group-hover:shadow-md">
                                <span class="font-semibold text-gray-700 peer-checked:text-pink-600">🤝 Autre</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- ========== PRENOM ========== -->
                <div class="space-y-2">
                    <label for="prenom" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                        <span class="text-xl">✏️</span> Prénom
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl blur opacity-0 group-hover:opacity-20 transition-all duration-300"></div>
                        <div class="relative flex items-center bg-white border-2 border-gray-200 rounded-xl overflow-hidden hover:border-blue-400 focus-within:border-blue-600 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="text-2xl px-4 py-3">👤</span>
                            <input 
                                type="text" 
                                id="prenom" 
                                name="prenom" 
                                placeholder="Jean"
                                class="flex-1 px-4 py-3 bg-transparent focus:outline-none text-gray-800 placeholder-gray-400"
                                required
                            >
                        </div>
                    </div>
                </div>

                <!-- ========== NOM ========== -->
                <div class="space-y-2">
                    <label for="nom" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                        <span class="text-xl">📛</span> Nom
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl blur opacity-0 group-hover:opacity-20 transition-all duration-300"></div>
                        <div class="relative flex items-center bg-white border-2 border-gray-200 rounded-xl overflow-hidden hover:border-blue-400 focus-within:border-blue-600 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="text-2xl px-4 py-3">👨‍💼</span>
                            <input 
                                type="text" 
                                id="nom" 
                                name="nom" 
                                placeholder="Dupont"
                                class="flex-1 px-4 py-3 bg-transparent focus:outline-none text-gray-800 placeholder-gray-400"
                                required
                            >
                        </div>
                    </div>
                </div>

                <!-- ========== ADRESSE ========== -->
                <div class="space-y-2">
                    <label for="adresse" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                        <span class="text-xl">🏠</span> Adresse
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl blur opacity-0 group-hover:opacity-20 transition-all duration-300"></div>
                        <div class="relative flex items-center bg-white border-2 border-gray-200 rounded-xl overflow-hidden hover:border-blue-400 focus-within:border-blue-600 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="text-2xl px-4 py-3">📍</span>
                            <input 
                                type="text" 
                                id="adresse" 
                                name="adresse" 
                                placeholder="123 Rue de la Paix"
                                class="flex-1 px-4 py-3 bg-transparent focus:outline-none text-gray-800 placeholder-gray-400"
                                required
                            >
                        </div>
                    </div>
                </div>

                <!-- ========== EMAIL ========== -->
                <div class="space-y-2">
                    <label for="email" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                        <span class="text-xl">📧</span> Email
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-green-600 to-blue-600 rounded-xl blur opacity-0 group-hover:opacity-20 transition-all duration-300"></div>
                        <div class="relative flex items-center bg-white border-2 border-gray-200 rounded-xl overflow-hidden hover:border-green-400 focus-within:border-green-600 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="text-2xl px-4 py-3">✉️</span>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                placeholder="jean@example.com"
                                class="flex-1 px-4 py-3 bg-transparent focus:outline-none text-gray-800 placeholder-gray-400"
                                required
                            >
                        </div>
                    </div>
                </div>

                <!-- ========== MOT DE PASSE ========== -->
                <div class="space-y-2">
                    <label for="password" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                        <span class="text-xl">🔒</span> Mot de Passe
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-red-600 rounded-xl blur opacity-0 group-hover:opacity-20 transition-all duration-300"></div>
                        <div class="relative flex items-center bg-white border-2 border-gray-200 rounded-xl overflow-hidden hover:border-orange-400 focus-within:border-orange-600 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="text-2xl px-4 py-3">🔐</span>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                placeholder="••••••••"
                                class="flex-1 px-4 py-3 bg-transparent focus:outline-none text-gray-800 placeholder-gray-400"
                                required
                            >
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2 flex items-center gap-2">
                        <span>💡</span> Au minimum 8 caractères, avec majuscule, minuscule et chiffre
                    </p>
                </div>

                <!-- ========== CONFIRMATION MDP ========== -->
                <div class="space-y-2">
                    <label for="confirm_password" class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
                        <span class="text-xl">✓</span> Confirmer le Mot de Passe
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-red-600 rounded-xl blur opacity-0 group-hover:opacity-20 transition-all duration-300"></div>
                        <div class="relative flex items-center bg-white border-2 border-gray-200 rounded-xl overflow-hidden hover:border-orange-400 focus-within:border-orange-600 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="text-2xl px-4 py-3">🔑</span>
                            <input 
                                type="password" 
                                id="confirm_password" 
                                name="confirm_password" 
                                placeholder="••••••••"
                                class="flex-1 px-4 py-3 bg-transparent focus:outline-none text-gray-800 placeholder-gray-400"
                                required
                            >
                        </div>
                    </div>
                </div>

                <!-- Séparateur Section -->
                <div class="flex items-center gap-4 my-8">
                    <div class="flex-1 h-0.5 bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
                    <span class="text-gray-400 text-sm">Vos Passions</span>
                    <div class="flex-1 h-0.5 bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
                </div>

                <!-- ========== PASSIONS (CHECKBOXES) ========== -->
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-6 rounded-xl border border-purple-200/50">
                    <label class="flex items-center gap-3 mb-6">
                        <span class="text-2xl">❤️</span>
                        <span class="text-lg font-bold text-gray-800">Vos Passions</span>
                    </label>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Informatique -->
                        <label class="relative flex items-start cursor-pointer group">
                            <input 
                                type="checkbox" 
                                name="passions" 
                                value="informatique"
                                class="sr-only peer"
                            >
                            <div class="w-full flex items-center gap-4 p-4 border-2 border-gray-200 rounded-xl peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-blue-400 transition-all duration-300 group-hover:shadow-md">
                                <span class="text-3xl">💻</span>
                                <span class="font-semibold text-gray-700 peer-checked:text-blue-600">Informatique</span>
                                <span class="ml-auto opacity-0 peer-checked:opacity-100 text-blue-600 text-xl">✓</span>
                            </div>
                        </label>

                        <!-- Voyages -->
                        <label class="relative flex items-start cursor-pointer group">
                            <input 
                                type="checkbox" 
                                name="passions" 
                                value="voyages"
                                class="sr-only peer"
                            >
                            <div class="w-full flex items-center gap-4 p-4 border-2 border-gray-200 rounded-xl peer-checked:border-green-600 peer-checked:bg-green-50 hover:border-green-400 transition-all duration-300 group-hover:shadow-md">
                                <span class="text-3xl">✈️</span>
                                <span class="font-semibold text-gray-700 peer-checked:text-green-600">Voyages</span>
                                <span class="ml-auto opacity-0 peer-checked:opacity-100 text-green-600 text-xl">✓</span>
                            </div>
                        </label>

                        <!-- Sport -->
                        <label class="relative flex items-start cursor-pointer group">
                            <input 
                                type="checkbox" 
                                name="passions" 
                                value="sport"
                                class="sr-only peer"
                            >
                            <div class="w-full flex items-center gap-4 p-4 border-2 border-gray-200 rounded-xl peer-checked:border-orange-600 peer-checked:bg-orange-50 hover:border-orange-400 transition-all duration-300 group-hover:shadow-md">
                                <span class="text-3xl">⚽</span>
                                <span class="font-semibold text-gray-700 peer-checked:text-orange-600">Sport</span>
                                <span class="ml-auto opacity-0 peer-checked:opacity-100 text-orange-600 text-xl">✓</span>
                            </div>
                        </label>

                        <!-- Lecture -->
                        <label class="relative flex items-start cursor-pointer group">
                            <input 
                                type="checkbox" 
                                name="passions" 
                                value="lecture"
                                class="sr-only peer"
                            >
                            <div class="w-full flex items-center gap-4 p-4 border-2 border-gray-200 rounded-xl peer-checked:border-pink-600 peer-checked:bg-pink-50 hover:border-pink-400 transition-all duration-300 group-hover:shadow-md">
                                <span class="text-3xl">📚</span>
                                <span class="font-semibold text-gray-700 peer-checked:text-pink-600">Lecture</span>
                                <span class="ml-auto opacity-0 peer-checked:opacity-100 text-pink-600 text-xl">✓</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- ========== BOUTONS ACTIONS ========== -->
                <div class="flex gap-4 pt-6">
                    <!-- Bouton Submit -->
                    <button 
                        type="submit"
                        class="flex-1 relative group overflow-hidden rounded-xl font-bold py-4 px-6 text-white transition-all duration-300"
                    >
                        <!-- Fond dégradé animé -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 group-hover:from-blue-700 group-hover:via-purple-700 group-hover:to-pink-700 transition-all duration-300"></div>
                        
                        <!-- Ombre en hover -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 blur opacity-0 group-hover:opacity-75 transition-all duration-300"></div>
                        
                        <!-- Contenu -->
                        <div class="relative flex items-center justify-center gap-2">
                            <span>✅</span>
                            <span>S'inscrire</span>
                        </div>
                    </button>

                    <!-- Bouton Reset -->
                    <button 
                        type="reset"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-4 px-6 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center gap-2"
                    >
                        <span>🔄</span>
                        <span>Réinitialiser</span>
                    </button>
                </div>

                <!-- Message Info -->
                <div class="bg-blue-50 border-l-4 border-blue-600 p-4 rounded-lg">
                    <p class="text-sm text-blue-800 flex items-center gap-2">
                        <span>ℹ️</span>
                        <span>Vos données sont sécurisées et chiffrées de bout en bout.</span>
                    </p>
                </div>

            </form>
        </div>

        <!-- Info Cards (Optionnel) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 text-center group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition-transform duration-300">🔒</div>
                <h3 class="font-bold text-gray-800 mb-2">Sécurisé</h3>
                <p class="text-sm text-gray-600">Chiffrement HTTPS et mots de passe hashés</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 text-center group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition-transform duration-300">⚡</div>
                <h3 class="font-bold text-gray-800 mb-2">Rapide</h3>
                <p class="text-sm text-gray-600">Inscription en moins de 30 secondes</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 text-center group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition-transform duration-300">✨</div>
                <h3 class="font-bold text-gray-800 mb-2">Facile</h3>
                <p class="text-sm text-gray-600">Interface intuitive et moderne</p>
            </div>
        </div>

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
