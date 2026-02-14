
@extends('base')

@section('title', 'Tableau de bord')

@section('content')
<!-- Main Content -->
    <main class="md:ml-72 min-h-screen transition-all duration-500">
        <!-- Header -->
        <header class="sticky top-0 z-40 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border-b border-slate-200 dark:border-slate-700">
            <div class="px-6 py-4 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <button id="menu-toggle" class="md:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <div>
                        <h2 class="text-2xl font-display font-bold text-slate-900 dark:text-white">Tableau de Bord</h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400 font-sans">Bienvenue sur votre espace de gestion</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="hidden md:flex items-center space-x-2 bg-slate-100 dark:bg-slate-800 px-4 py-2 rounded-xl transition-all duration-300 focus-within:ring-2 focus-within:ring-academic-500">
                        <span class="material-symbols-outlined text-slate-400 text-xl">search</span>
                        <input type="text" placeholder="Rechercher..." class="bg-transparent border-0 outline-none text-sm font-sans w-64">
                    </div>

                    <!-- Notifications -->
                    <button class="relative p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-accent-500 rounded-full"></span>
                    </button>

                    <!-- Dark Mode Toggle -->
                    <button id="theme-toggle" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined dark:hidden">dark_mode</span>
                        <span class="material-symbols-outlined hidden dark:inline">light_mode</span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="p-6 space-y-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Enseignants -->
                <div class="stat-card group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <span class="material-symbols-outlined text-white text-2xl">group</span>
                        </div>
                        <span class="text-xs font-sans font-semibold text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/30 px-3 py-1 rounded-full">+12%</span>
                    </div>
                    <h3 class="text-3xl font-display font-bold text-slate-900 dark:text-white mb-1">{{ $enseignants }}</h3>
                    <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Total Enseignants</p>
                    <div class="mt-4 h-1 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-blue-500 to-blue-700 rounded-full animate-progress" style="width: 81%"></div>
                    </div>
                </div>

                <!-- Cours Actifs -->
                <div class="stat-card group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <span class="material-symbols-outlined text-white text-2xl">menu_book</span>
                        </div>
                        <span class="text-xs font-sans font-semibold text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/30 px-3 py-1 rounded-full">+8%</span>
                    </div>
                    <h3 class="text-3xl font-display font-bold text-slate-900 dark:text-white mb-1">132</h3>
                    <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Cours Actifs</p>
                    <div class="mt-4 h-1 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-purple-500 to-purple-700 rounded-full animate-progress" style="width: 65%"></div>
                    </div>
                </div>

                <!-- Étudiants Inscrits -->
                <div class="stat-card group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-accent-500 to-accent-700 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <span class="material-symbols-outlined text-white text-2xl">school</span>
                        </div>
                        <span class="text-xs font-sans font-semibold text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/30 px-3 py-1 rounded-full">+24%</span>
                    </div>
                    <h3 class="text-3xl font-display font-bold text-slate-900 dark:text-white mb-1">3,847</h3>
                    <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Étudiants Inscrits</p>
                    <div class="mt-4 h-1 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-accent-500 to-accent-700 rounded-full animate-progress" style="width: 92%"></div>
                    </div>
                </div>

                <!-- Taux de Présence -->
                <div class="stat-card group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <span class="material-symbols-outlined text-white text-2xl">verified</span>
                        </div>
                        <span class="text-xs font-sans font-semibold text-red-600 dark:text-red-400 bg-red-100 dark:bg-red-900/30 px-3 py-1 rounded-full">-3%</span>
                    </div>
                    <h3 class="text-3xl font-display font-bold text-slate-900 dark:text-white mb-1">87.4%</h3>
                    <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Taux de Présence</p>
                    <div class="mt-4 h-1 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-green-500 to-green-700 rounded-full animate-progress" style="width: 87%"></div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Chart -->
                <div class="lg:col-span-2 bg-white dark:bg-slate-900 rounded-2xl shadow-xl p-6 border border-slate-200 dark:border-slate-800">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white">Évolution des Inscriptions</h3>
                            <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Derniers 12 mois</p>
                        </div>
                        <select class="px-4 py-2 bg-slate-100 dark:bg-slate-800 rounded-xl text-sm font-sans border-0 outline-none focus:ring-2 focus:ring-academic-500">
                            <option>2024</option>
                            <option>2023</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="enrollmentChart"></canvas>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl p-6 border border-slate-200 dark:border-slate-800">
                    <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white mb-6">Aperçu Rapide</h3>
                    <div class="space-y-4">
                        <div class="quick-stat-item">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-sans text-slate-600 dark:text-slate-400">Cours Populaires</span>
                                <span class="text-sm font-sans font-bold text-academic-600 dark:text-academic-400">128</span>
                            </div>
                            <div class="h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-academic-500 to-academic-700 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>

                        <div class="quick-stat-item">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-sans text-slate-600 dark:text-slate-400">Taux de Réussite</span>
                                <span class="text-sm font-sans font-bold text-green-600 dark:text-green-400">94%</span>
                            </div>
                            <div class="h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-green-500 to-green-700 rounded-full" style="width: 94%"></div>
                            </div>
                        </div>

                        <div class="quick-stat-item">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-sans text-slate-600 dark:text-slate-400">Satisfaction</span>
                                <span class="text-sm font-sans font-bold text-purple-600 dark:text-purple-400">4.8/5</span>
                            </div>
                            <div class="h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-purple-500 to-purple-700 rounded-full" style="width: 96%"></div>
                            </div>
                        </div>

                        <div class="quick-stat-item">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-sans text-slate-600 dark:text-slate-400">Disponibilité</span>
                                <span class="text-sm font-sans font-bold text-accent-600 dark:text-accent-400">78%</span>
                            </div>
                            <div class="h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-accent-500 to-accent-700 rounded-full" style="width: 78%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-slate-200 dark:border-slate-700">
                        <div class="flex items-center justify-between text-sm font-sans">
                            <span class="text-slate-600 dark:text-slate-400">Performance Globale</span>
                            <span class="font-bold text-academic-600 dark:text-academic-400">Excellent</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Top Teachers -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Activity -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl p-6 border border-slate-200 dark:border-slate-800">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white">Activités Récentes</h3>
                        <a href="#" class="text-sm font-sans text-academic-600 dark:text-academic-400 hover:underline">Voir tout</a>
                    </div>
                    <div class="space-y-4">
                        <div class="activity-item flex items-start space-x-4 p-4 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-300">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-white text-lg">person_add</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">Nouvel enseignant ajouté</p>
                                <p class="text-xs font-sans text-slate-500 dark:text-slate-400 mt-1">Dr. Fatou Diop - Mathématiques</p>
                                <p class="text-xs font-sans text-slate-400 dark:text-slate-500 mt-1">Il y a 2 heures</p>
                            </div>
                        </div>

                        <div class="activity-item flex items-start space-x-4 p-4 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-300">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-white text-lg">assignment</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">Nouveau cours créé</p>
                                <p class="text-xs font-sans text-slate-500 dark:text-slate-400 mt-1">Intelligence Artificielle Avancée</p>
                                <p class="text-xs font-sans text-slate-400 dark:text-slate-500 mt-1">Il y a 5 heures</p>
                            </div>
                        </div>

                        <div class="activity-item flex items-start space-x-4 p-4 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-300">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-white text-lg">update</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">Emploi du temps mis à jour</p>
                                <p class="text-xs font-sans text-slate-500 dark:text-slate-400 mt-1">Semestre Printemps 2024</p>
                                <p class="text-xs font-sans text-slate-400 dark:text-slate-500 mt-1">Il y a 1 jour</p>
                            </div>
                        </div>

                        <div class="activity-item flex items-start space-x-4 p-4 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-300">
                            <div class="w-10 h-10 bg-gradient-to-br from-accent-500 to-accent-700 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-white text-lg">assessment</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">Rapport généré</p>
                                <p class="text-xs font-sans text-slate-500 dark:text-slate-400 mt-1">Performance Q1 2024</p>
                                <p class="text-xs font-sans text-slate-400 dark:text-slate-500 mt-1">Il y a 2 jours</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Teachers -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl p-6 border border-slate-200 dark:border-slate-800">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white">Meilleurs Enseignants</h3>
                        <a href="enseignants.html" class="text-sm font-sans text-academic-600 dark:text-academic-400 hover:underline">Voir tout</a>
                    </div>
                    <div class="space-y-4">
                        <div class="teacher-item flex items-center space-x-4 p-4 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-300 cursor-pointer">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                MD
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">Dr. Moussa Diallo</p>
                                <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Informatique</p>
                            </div>
                            <div class="text-right">
                                <div class="flex items-center space-x-1 text-accent-500">
                                    <span class="material-symbols-outlined text-sm">star</span>
                                    <span class="text-sm font-sans font-bold">4.9</span>
                                </div>
                                <p class="text-xs font-sans text-slate-400 dark:text-slate-500">156 avis</p>
                            </div>
                        </div>

                        <div class="teacher-item flex items-center space-x-4 p-4 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-300 cursor-pointer">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                AS
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">Prof. Aïssatou Sow</p>
                                <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Mathématiques</p>
                            </div>
                            <div class="text-right">
                                <div class="flex items-center space-x-1 text-accent-500">
                                    <span class="material-symbols-outlined text-sm">star</span>
                                    <span class="text-sm font-sans font-bold">4.8</span>
                                </div>
                                <p class="text-xs font-sans text-slate-400 dark:text-slate-500">142 avis</p>
                            </div>
                        </div>

                        <div class="teacher-item flex items-center space-x-4 p-4 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-300 cursor-pointer">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                ON
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">Dr. Omar Ndiaye</p>
                                <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Physique</p>
                            </div>
                            <div class="text-right">
                                <div class="flex items-center space-x-1 text-accent-500">
                                    <span class="material-symbols-outlined text-sm">star</span>
                                    <span class="text-sm font-sans font-bold">4.8</span>
                                </div>
                                <p class="text-xs font-sans text-slate-400 dark:text-slate-500">138 avis</p>
                            </div>
                        </div>

                        <div class="teacher-item flex items-center space-x-4 p-4 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-300 cursor-pointer">
                            <div class="w-12 h-12 bg-gradient-to-br from-accent-500 to-accent-700 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                KF
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">Prof. Khady Fall</p>
                                <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Chimie</p>
                            </div>
                            <div class="text-right">
                                <div class="flex items-center space-x-1 text-accent-500">
                                    <span class="material-symbols-outlined text-sm">star</span>
                                    <span class="text-sm font-sans font-bold">4.7</span>
                                </div>
                                <p class="text-xs font-sans text-slate-400 dark:text-slate-500">124 avis</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
