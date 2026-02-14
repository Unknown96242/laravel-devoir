@extends('base')

@section('title', 'Profil Enseignant')

@section('content')

    <main class="md:ml-72 min-h-screen transition-all duration-500">
        <header
            class="sticky top-0 z-40 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border-b border-slate-200 dark:border-slate-700">
            <div class="px-6 py-4 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('enseignants.index') }}"
                        class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined">arrow_back</span>
                    </a>
                    <button id="menu-toggle"
                        class="md:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <div>
                        <h2 class="text-2xl font-display font-bold text-slate-900 dark:text-white">Profil Enseignant</h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400 font-sans">Détails et informations complètes
                        </p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="theme-toggle"
                        class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined dark:hidden">dark_mode</span>
                        <span class="material-symbols-outlined hidden dark:inline">light_mode</span>
                    </button>
                </div>
            </div>
        </header>

        <div class="p-6 space-y-6">
            <!-- Profile Header -->
            <div class="bg-gradient-to-r {{ $color }} rounded-2xl p-8 text-white shadow-2xl">
                <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
                    <div
                        class="w-32 h-32 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center text-white font-bold text-5xl shadow-2xl">
                        {{ strtoupper(substr($enseignant->prenom, 0, 1).substr($enseignant->nom, 0, 1)) }}</div>
                    <div class="flex-1 text-center md:text-left">
                        <div class="flex flex-col md:flex-row md:items-center md:space-x-4 mb-3">
                            <h1 class="text-3xl font-display font-bold">{{ $enseignant->prenom }} {{ $enseignant->nom }}</h1>
                            <span
                                class="inline-block mt-2 md:mt-0 px-4 py-2 bg-white/20 backdrop-blur-sm text-white text-sm font-sans font-semibold rounded-full">{{ $enseignant->departement }}</span>
                        </div>
                        <p class="text-lg font-sans mb-6 text-white/90">{{ $enseignant->grade }} & Chercheur en {{ $enseignant->departement }}
                        </p>
                        <div
                            class="flex flex-col sm:flex-row items-center justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-6">
                            <div class="flex items-center space-x-2">
                                <span class="material-symbols-outlined">mail</span>
                                <span class="font-sans">{{ $enseignant->email }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="material-symbols-outlined">phone</span>
                                <span class="font-sans">{{ $enseignant->telephone }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="material-symbols-outlined">star</span>
                                <span class="font-sans font-bold">4.9 / 5.0</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ route('enseignants.edit', $enseignant->id) }}"
                            class="px-6 py-3 bg-white text-academic-700 rounded-xl font-sans font-semibold hover:bg-white/90 transition-colors flex items-center space-x-2">
                            <span class="material-symbols-outlined">edit</span>
                            <span>Modifier</span>
                        </a>
                        <a href="mailto:{{ $enseignant->email }}"
                            class="px-6 py-3 bg-white/20 backdrop-blur-sm text-white rounded-xl font-sans font-semibold hover:bg-white/30 transition-colors flex items-center space-x-2">
                            <span class="material-symbols-outlined">mail</span>
                            <span>Contacter</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div
                    class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-blue-600 dark:text-blue-400">menu_book</span>
                        </div>
                    </div>
                    <h3 class="text-3xl font-display font-bold text-slate-900 dark:text-white mb-1">12</h3>
                    <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Cours enseignés</p>
                </div>

                <div
                    class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-green-600 dark:text-green-400">school</span>
                        </div>
                    </div>
                    <h3 class="text-3xl font-display font-bold text-slate-900 dark:text-white mb-1">487</h3>
                    <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Étudiants actifs</p>
                </div>

                <div
                    class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-purple-600 dark:text-purple-400">article</span>
                        </div>
                    </div>
                    <h3 class="text-3xl font-display font-bold text-slate-900 dark:text-white mb-1">24</h3>
                    <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Publications</p>
                </div>

                <div
                    class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-accent-100 dark:bg-accent-900/30 rounded-xl flex items-center justify-center">
                            <span
                                class="material-symbols-outlined text-accent-600 dark:text-accent-400">calendar_month</span>
                        </div>
                    </div>
                    <h3 class="text-3xl font-display font-bold text-slate-900 dark:text-white mb-1">8 ans</h3>
                    <p class="text-sm font-sans text-slate-500 dark:text-slate-400">D'expérience</p>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- About & Bio -->
                <div class="lg:col-span-2 space-y-6">
                    <div
                        class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                        <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white mb-4">Biographie</h3>
                        <p class="text-sm font-sans text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ $enseignant->prenom }} {{ $enseignant->nom }} est professeur spécialiste du département {{ $enseignant->departement }}. Diplômé
                            de l'École Polytechnique de Daker avec un doctorat en Machine Learning, {{ $enseignant->prenom }} a travaillé pendant 5
                            ans dans la recherche avant de rejoindre notre université. Ses travaux portent principalement
                            sur l'apprentissage profond et les réseaux neuronaux appliqués à la vision par ordinateur.
                        </p>
                    </div>

                    <div
                        class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                        <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white mb-6">Cours Enseignés</h3>
                        <div class="space-y-3">
                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800 rounded-xl hover:shadow-md transition-all duration-300">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                        <span class="material-symbols-outlined text-white text-xl">psychology</span>
                                    </div>
                                    <div>
                                        <p class="font-sans font-semibold text-slate-900 dark:text-white">Intelligence
                                            Artificielle</p>
                                        <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Master 2 • 45
                                            étudiants</p>
                                    </div>
                                </div>
                                <span
                                    class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 text-xs font-sans font-semibold rounded-full">En
                                    cours</span>
                            </div>

                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800 rounded-xl hover:shadow-md transition-all duration-300">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                                        <span class="material-symbols-outlined text-white text-xl">code</span>
                                    </div>
                                    <div>
                                        <p class="font-sans font-semibold text-slate-900 dark:text-white">Apprentissage
                                            Automatique</p>
                                        <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Master 1 • 62
                                            étudiants</p>
                                    </div>
                                </div>
                                <span
                                    class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 text-xs font-sans font-semibold rounded-full">En
                                    cours</span>
                            </div>

                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 dark:bg-slate-800 rounded-xl hover:shadow-md transition-all duration-300">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-accent-500 rounded-lg flex items-center justify-center">
                                        <span class="material-symbols-outlined text-white text-xl">database</span>
                                    </div>
                                    <div>
                                        <p class="font-sans font-semibold text-slate-900 dark:text-white">Structures de
                                            Données</p>
                                        <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Licence 3 • 78
                                            étudiants</p>
                                    </div>
                                </div>
                                <span
                                    class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 text-xs font-sans font-semibold rounded-full">En
                                    cours</span>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                        <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white mb-6">Publications Récentes
                        </h3>
                        <div class="space-y-4">
                            <div class="p-4 border-l-4 border-academic-500 bg-slate-50 dark:bg-slate-800 rounded-r-xl">
                                <p class="font-sans font-semibold text-slate-900 dark:text-white mb-2">Deep Learning for
                                    Medical Image Analysis</p>
                                <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Journal of AI Research •
                                    2024</p>
                            </div>
                            <div class="p-4 border-l-4 border-academic-500 bg-slate-50 dark:bg-slate-800 rounded-r-xl">
                                <p class="font-sans font-semibold text-slate-900 dark:text-white mb-2">Neural Networks in
                                    Natural Language Processing</p>
                                <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Conference on Machine
                                    Learning • 2023</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <div
                        class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                        <h3 class="text-lg font-display font-bold text-slate-900 dark:text-white mb-4">Informations</h3>
                        <div class="space-y-3">
                            <div class="flex items-start space-x-3">
                                <span class="material-symbols-outlined text-slate-400 text-xl">badge</span>
                                <div>
                                    <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Matricule</p>
                                    <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">{{ $enseignant->matricule }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <span class="material-symbols-outlined text-slate-400 text-xl">calendar_today</span>
                                <div>
                                    <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Date de recrutement</p>
                                    <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">
                                        {{ $enseignant->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <span class="material-symbols-outlined text-slate-400 text-xl">location_on</span>
                                <div>
                                    <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Bureau</p>
                                    <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">Bâtiment A,
                                        Bureau 305</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <span class="material-symbols-outlined text-slate-400 text-xl">schedule</span>
                                <div>
                                    <p class="text-xs font-sans text-slate-500 dark:text-slate-400">Heures de consultation
                                    </p>
                                    <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">
                                        Lundi-Vendredi, 14h-16h</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                        <h3 class="text-lg font-display font-bold text-slate-900 dark:text-white mb-4">Évaluations</h3>
                        <div class="space-y-3">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-sans text-slate-600 dark:text-slate-400">Statut</span>
                                    <span
                                        class="text-sm font-sans font-bold {{ $enseignant->statut == 'actif' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">{{ $enseignant->statut }}</span>
                                </div>
                                <div class="h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r {{ $enseignant->statut == 'actif' ? 'from-green-500 to-green-700' : 'from-red-500 to-red-700' }} rounded-full"
                                        style="width: {{ $enseignant->statut == 'actif' ? 94 : 30 }}%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-sans text-slate-600 dark:text-slate-400">Pédagogie</span>
                                    <span
                                        class="text-sm font-sans font-bold text-academic-600 dark:text-academic-400">4.9/5</span>
                                </div>
                                <div class="h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-academic-500 to-academic-700 rounded-full"
                                        style="width: 98%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-sans text-slate-600 dark:text-slate-400">Clarté</span>
                                    <span
                                        class="text-sm font-sans font-bold text-purple-600 dark:text-purple-400">4.8/5</span>
                                </div>
                                <div class="h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-purple-500 to-purple-700 rounded-full"
                                        style="width: 96%"></div>
                                </div>
                            </div>
                        </div>
                        <p class="text-xs font-sans text-slate-500 dark:text-slate-400 mt-4 text-center">Basé sur 156
                            évaluations</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
