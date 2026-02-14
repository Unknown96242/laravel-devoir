@extends('base')

@section('title', 'Statistiques & Analyses')

@section('content')
    <main class="md:ml-72 min-h-screen transition-all duration-500">
        <header
            class="sticky top-0 z-40 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border-b border-slate-200 dark:border-slate-700">
            <div class="px-6 py-4 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <button id="menu-toggle"
                        class="md:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <div>
                        <h2 class="text-2xl font-display font-bold text-slate-900 dark:text-white">Statistiques & Analyses
                        </h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400 font-sans">Vue d'ensemble des performances
                            académiques</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <select
                        class="px-4 py-2 bg-slate-100 dark:bg-slate-800 rounded-xl text-sm font-sans border-0 outline-none focus:ring-2 focus:ring-academic-500">
                        <option>Année 2024</option>
                        <option>Année 2023</option>
                    </select>
                    <button id="theme-toggle"
                        class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined dark:hidden">dark_mode</span>
                        <span class="material-symbols-outlined hidden dark:inline">light_mode</span>
                    </button>
                </div>
            </div>
        </header>

        <div class="p-6 space-y-6">
            <!-- KPI Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="stat-card group bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <div class="flex items-start justify-between mb-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <span class="material-symbols-outlined text-white text-2xl">trending_up</span>
                        </div>
                        <span
                            class="text-xs font-sans font-semibold text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/30 px-3 py-1 rounded-full">+15%</span>
                    </div>
                    <h3 class="text-3xl font-display font-bold text-slate-900 dark:text-white mb-1">92.4%</h3>
                    <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Taux de Réussite</p>
                </div>

                <div
                    class="stat-card group bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <div class="flex items-start justify-between mb-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <span class="material-symbols-outlined text-white text-2xl">task_alt</span>
                        </div>
                        <span
                            class="text-xs font-sans font-semibold text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/30 px-3 py-1 rounded-full">+8%</span>
                    </div>
                    <h3 class="text-3xl font-display font-bold text-slate-900 dark:text-white mb-1">87.3%</h3>
                    <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Assiduité Moyenne</p>
                </div>

                <div
                    class="stat-card group bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <div class="flex items-start justify-between mb-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <span class="material-symbols-outlined text-white text-2xl">emoji_events</span>
                        </div>
                        <span
                            class="text-xs font-sans font-semibold text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/30 px-3 py-1 rounded-full">+12%</span>
                    </div>
                    <h3 class="text-3xl font-display font-bold text-slate-900 dark:text-white mb-1">4.6/5</h3>
                    <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Satisfaction Globale</p>
                </div>

                <div
                    class="stat-card group bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <div class="flex items-start justify-between mb-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-accent-500 to-accent-700 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <span class="material-symbols-outlined text-white text-2xl">workspace_premium</span>
                        </div>
                        <span
                            class="text-xs font-sans font-semibold text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/30 px-3 py-1 rounded-full">+24%</span>
                    </div>
                    <h3 class="text-3xl font-display font-bold text-slate-900 dark:text-white mb-1">156</h3>
                    <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Diplômés ce Semestre</p>
                </div>
            </div>

            <!-- Charts Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Performance Chart -->
                <div
                    class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white">Évolution des
                                Performances</h3>
                            <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Comparaison annuelle</p>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>

                <!-- Department Distribution -->
                <div
                    class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white">Répartition par
                                Département</h3>
                            <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Enseignants par domaine</p>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="departmentChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Detailed Stats -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Top Performing Courses -->
                <div
                    class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white mb-6">Top Cours</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                    <span class="material-symbols-outlined text-white text-xl">psychology</span>
                                </div>
                                <div>
                                    <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">IA Avancée</p>
                                    <p class="text-xs font-sans text-slate-500 dark:text-slate-400">95.2% réussite</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-sans font-bold text-green-600 dark:text-green-400">4.9</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                                    <span class="material-symbols-outlined text-white text-xl">calculate</span>
                                </div>
                                <div>
                                    <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">Mathématiques
                                    </p>
                                    <p class="text-xs font-sans text-slate-500 dark:text-slate-400">93.8% réussite</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-sans font-bold text-green-600 dark:text-green-400">4.8</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                    <span class="material-symbols-outlined text-white text-xl">science</span>
                                </div>
                                <div>
                                    <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">Physique Q.
                                    </p>
                                    <p class="text-xs font-sans text-slate-500 dark:text-slate-400">91.4% réussite</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-sans font-bold text-green-600 dark:text-green-400">4.7</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-accent-500 rounded-lg flex items-center justify-center">
                                    <span class="material-symbols-outlined text-white text-xl">code</span>
                                </div>
                                <div>
                                    <p class="text-sm font-sans font-semibold text-slate-900 dark:text-white">Programmation
                                    </p>
                                    <p class="text-xs font-sans text-slate-500 dark:text-slate-400">90.1% réussite</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-sans font-bold text-green-600 dark:text-green-400">4.6</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Student Growth -->
                <div
                    class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white mb-6">Croissance Étudiants</h3>
                    <div class="chart-container-small">
                        <canvas id="studentGrowthChart"></canvas>
                    </div>
                </div>

                <!-- Faculty Stats -->
                <div
                    class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                    <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white mb-6">Statistiques Enseignants
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-sans text-slate-600 dark:text-slate-400">Taux
                                    d'encadrement</span>
                                <span
                                    class="text-sm font-sans font-bold text-academic-600 dark:text-academic-400">1:15.6</span>
                            </div>
                            <div class="h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-academic-500 to-academic-700 rounded-full"
                                    style="width: 85%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-sans text-slate-600 dark:text-slate-400">Publications/an</span>
                                <span class="text-sm font-sans font-bold text-green-600 dark:text-green-400">3.8</span>
                            </div>
                            <div class="h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-green-500 to-green-700 rounded-full"
                                    style="width: 76%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-sans text-slate-600 dark:text-slate-400">Heures de cours</span>
                                <span
                                    class="text-sm font-sans font-bold text-purple-600 dark:text-purple-400">18.2h/sem</span>
                            </div>
                            <div class="h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-purple-500 to-purple-700 rounded-full"
                                    style="width: 91%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-sans text-slate-600 dark:text-slate-400">Satisfaction</span>
                                <span class="text-sm font-sans font-bold text-accent-600 dark:text-accent-400">4.5/5</span>
                            </div>
                            <div class="h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-accent-500 to-accent-700 rounded-full"
                                    style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Comparison -->
            <div
                class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white">Comparaison Mensuelle
                        </h3>
                        <p class="text-sm font-sans text-slate-500 dark:text-slate-400">Présence et Performance</p>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="monthlyComparisonChart"></canvas>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('style')
    <style>
        canvas {
            max-width: 100% !important;
            height: auto !important;
        }

        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        .chart-container-small {
            position: relative;
            height: 200px;
            width: 100%;
        }
    </style>
@endsection

