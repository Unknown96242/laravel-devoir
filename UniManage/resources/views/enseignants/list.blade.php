@extends('base')

@section('title', 'Liste des Enseignants')

@section('content')
    <x-toast />
    <main class="md:ml-72 min-h-screen transition-all duration-500">
        <!-- Header -->
        <header
            class="sticky top-0 z-40 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border-b border-slate-200 dark:border-slate-700">
            <div class="px-6 py-4 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <button id="menu-toggle"
                        class="md:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <div>
                        <h2 class="text-2xl font-display font-bold text-slate-900 dark:text-white">Liste des Enseignants</h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400 font-sans">Gérez et visualisez tous les
                            enseignants</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div
                        class="hidden md:flex items-center space-x-2 bg-slate-100 dark:bg-slate-800 px-4 py-2 rounded-xl transition-all duration-300 focus-within:ring-2 focus-within:ring-academic-500">
                        <span class="material-symbols-outlined text-slate-400 text-xl">search</span>
                        <input type="text" placeholder="Rechercher un enseignant..."
                            class="bg-transparent border-0 outline-none text-sm font-sans w-64">
                    </div>

                    <!-- Notifications -->
                    <button class="relative p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-accent-500 rounded-full"></span>
                    </button>

                    <!-- Dark Mode Toggle -->
                    <button id="theme-toggle"
                        class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined dark:hidden">dark_mode</span>
                        <span class="material-symbols-outlined hidden dark:inline">light_mode</span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Content -->
        <div class="p-6 space-y-6">
            <!-- Actions Bar -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between space-y-4 md:space-y-0">
                <div class="flex items-center space-x-3">
                    <a href="{{ route('enseignants.create') }}"
                        class="px-6 py-3 bg-gradient-to-r from-academic-500 to-academic-700 hover:from-academic-600 hover:to-academic-800 text-white rounded-xl font-sans font-semibold shadow-lg shadow-academic-500/30 transition-all duration-300 flex items-center space-x-2">
                        <span class="material-symbols-outlined">add</span>
                        <span>Nouvel Enseignant</span>
                    </a>
                    <button
                        class="px-6 py-3 bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 rounded-xl font-sans font-semibold hover:border-academic-500 dark:hover:border-academic-500 transition-all duration-300 flex items-center space-x-2">
                        <span class="material-symbols-outlined">filter_list</span>
                        <span>Filtrer</span>
                    </button>
                </div>

                <div class="flex items-center space-x-3">
                    <select
                        class="px-4 py-2 bg-slate-100 dark:bg-slate-800 rounded-xl text-sm font-sans border-0 outline-none focus:ring-2 focus:ring-academic-500">
                        <option>Tous les départements</option>
                        <option>Informatique</option>
                        <option>Mathématiques</option>
                        <option>Physique</option>
                        <option>Chimie</option>
                    </select>
                    <button
                        class="p-2 bg-slate-100 dark:bg-slate-800 rounded-xl hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">
                        <span class="material-symbols-outlined">download</span>
                    </button>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-white dark:bg-slate-900 rounded-xl p-4 border border-slate-200 dark:border-slate-800">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-sans text-slate-500 dark:text-slate-400 mb-1">Total</p>
                            <h3 class="text-2xl font-display font-bold text-slate-900 dark:text-white">{{ $totalEnseignants }}</h3>
                        </div>
                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-blue-600 dark:text-blue-400">group</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-900 rounded-xl p-4 border border-slate-200 dark:border-slate-800">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-sans text-slate-500 dark:text-slate-400 mb-1">Actifs</p>
                            <h3 class="text-2xl font-display font-bold text-slate-900 dark:text-white">{{ $enseignantsActifs }}</h3>
                        </div>
                        <div
                            class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-green-600 dark:text-green-400">check_circle</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-900 rounded-xl p-4 border border-slate-200 dark:border-slate-800">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-sans text-slate-500 dark:text-slate-400 mb-1">En congé</p>
                            <h3 class="text-2xl font-display font-bold text-slate-900 dark:text-white">{{ $enseignantsEnConge }}</h3>
                        </div>
                        <div
                            class="w-10 h-10 bg-amber-100 dark:bg-amber-900/30 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-amber-600 dark:text-amber-400">schedule</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-900 rounded-xl p-4 border border-slate-200 dark:border-slate-800">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-sans text-slate-500 dark:text-slate-400 mb-1">Nouveaux (ce mois)</p>
                            <h3 class="text-2xl font-display font-bold text-slate-900 dark:text-white">{{ $enseignantsNouveaux }}</h3>
                        </div>
                        <div
                            class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-purple-600 dark:text-purple-400">person_add</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teachers Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Teacher Card -->

                @php
                    use App\Helpers\ColorHelper;
                @endphp

                @forelse ($enseignants as $enseignant)
                    @php
                        $color = ColorHelper::getAvatarColor($enseignant->nom . $enseignant->prenom);
                    @endphp
                    <div
                        class="teacher-card bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 hover:shadow-2xl hover:shadow-academic-500/10 transition-all duration-500 group">
                        <div class="flex items-start justify-between mb-4">
                            <div
                                class="w-16 h-16 bg-gradient-to-br {{ $color }} rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-lg group-hover:scale-110 transition-transform duration-500">
                                {{ strtoupper(substr($enseignant->prenom, 0, 1) . substr($enseignant->nom, 0, 1)) }}
                            </div>
                            <div class="flex items-center space-x-2">
                                <span
                                    class="px-3 py-1 dark:bg-green-900/30 {{ $enseignant->statut === 'actif' ? 'bg-green-100 text-green-600 dark:text-green-400' : 'bg-amber-100 text-amber-600 dark:text-amber-400' }} text-xs font-sans font-semibold rounded-full">{{ $enseignant->statut }}</span>
                                <!-- Menu 3 points -->
                                <div class="relative">
                                    <button
                                        class="menu-button p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors"
                                        data-teacher="1">
                                        <span class="material-symbols-outlined text-slate-400">more_vert</span>
                                    </button>
                                    <div
                                        class="dropdown-menu absolute right-0 mt-2 w-48 bg-white dark:bg-slate-800 rounded-xl shadow-2xl border border-slate-200 dark:border-slate-700 py-2 z-50">
                                        <a href="{{ route('enseignants.show', $enseignant->id) }}"
                                            class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                            <span
                                                class="material-symbols-outlined text-academic-500 text-xl">visibility</span>
                                            <span class="font-sans text-sm text-slate-700 dark:text-slate-300">Voir
                                                profil</span>
                                        </a>
                                        <a href="{{ route('enseignants.edit', $enseignant->id) }}"
                                            class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                            <span class="material-symbols-outlined text-blue-500 text-xl">edit</span>
                                            <span
                                                class="font-sans text-sm text-slate-700 dark:text-slate-300">Modifier</span>
                                        </a>
                                        <a href="mailto:{{ $enseignant->email }}"
                                            class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                            <span class="material-symbols-outlined text-purple-500 text-xl">mail</span>
                                            <span
                                                class="font-sans text-sm text-slate-700 dark:text-slate-300">Contacter</span>
                                        </a>
                                        <div class="border-t border-slate-200 dark:border-slate-600 my-1"></div>
                                        <form action="{{ route('enseignants.destroy', $enseignant->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="w-full flex items-center space-x-3 px-4 py-3 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors delete-button"
                                                data-teacher-name="{{ $enseignant->prenom }} {{ $enseignant->nom }}">
                                                <span class="material-symbols-outlined text-red-500 text-xl">delete</span>
                                                <span
                                                class="font-sans text-sm text-red-600 dark:text-red-400 font-semibold">Supprimer</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="text-xl font-display font-bold text-slate-900 dark:text-white mb-1">
                            {{ $enseignant->prenom }} {{ $enseignant->nom }}</h3>
                        <p class="text-sm font-sans text-slate-500 dark:text-slate-400 mb-4">{{ $enseignant->departement }}
                        </p>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center space-x-2 text-xs font-sans text-slate-600 dark:text-slate-400">
                                <span class="material-symbols-outlined text-sm">mail</span>
                                <span>{{ $enseignant->email }}</span>
                            </div>
                            <div class="flex items-center space-x-2 text-xs font-sans text-slate-600 dark:text-slate-400">
                                <span class="material-symbols-outlined text-sm">phone</span>
                                <span>{{ $enseignant->telephone }}</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-slate-200 dark:border-slate-700">
                            <div class="flex items-center space-x-1">
                                <span class="material-symbols-outlined text-accent-500 text-sm">star</span>
                                <span class="text-sm font-sans font-bold text-slate-900 dark:text-white">4.9</span>
                                <span class="text-xs font-sans text-slate-400 dark:text-slate-500">(156)</span>
                            </div>
                            <a href="{{ route('enseignants.show', $enseignant->id) }}"
                                class="text-sm font-sans font-semibold text-academic-600 dark:text-academic-400 hover:underline">Voir
                                profil →</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 h-48 flex flex-col items-center justify-center space-y-2">
                        <i
                            class="material-symbols-outlined text-4xl text-slate-400 dark:text-slate-500 mb-2">person_off</i>
                        <p class="text-slate-500 dark:text-slate-400">Aucun enseignant trouvé.</p>
                    </div>
                @endforelse

            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between pt-6">
                <p class="text-sm font-sans text-slate-600 dark:text-slate-400">{{ $enseignants->count() }} enseignants
                    affichés sur {{ $enseignants->total() }}</p>
                <div class="flex items-center space-x-2">
                    @if ($enseignants->currentPage() > 1)
                        <a href="{{ $enseignants->previousPageUrl() }}"
                            class="px-4 py-2 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-sans font-semibold hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                            Précédent
                        </a>
                    @else
                        <button disabled
                            class="px-4 py-2 bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-sans font-semibold text-slate-400 cursor-not-allowed">
                            Précédent
                        </button>
                    @endif


                    @if ($enseignants->total() > $enseignants->perPage())
                        @foreach ($enseignants->links()->elements[0] as $page => $url)
                            @if ($page == $enseignants->currentPage())
                                <button
                                    class="px-4 py-2 bg-academic-500 text-white rounded-lg text-sm font-sans font-semibold">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}"
                                    class="px-4 py-2 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-sans font-semibold hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">{{ $page }}</a>
                            @endif
                        @endforeach

                    @endif
                    @if ($enseignants->hasMorePages())
                        <a href="{{ $enseignants->nextPageUrl() }}"
                            class="px-4 py-2 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-sans font-semibold hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                            Suivant
                        </a>
                    @else
                        <button disabled
                            class="px-4 py-2 bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-sans font-semibold text-slate-400 cursor-not-allowed">
                            Suivant
                        </button>

                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/pages/list.css') }}">
@endsection

@section('script')
    <script src="{{ asset('js/pages/list.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', async function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const teacherName = this.getAttribute('data-teacher-name');
                    const confirmed = await modalConfirm.show(
                        'Supprimer enseignant',
                        `Cette action est irréversible. ${teacherName} sera définitivement supprimé.`,
                        'danger'
                    );

                    if (confirmed) {
                        // faire la suppression
                        const form = this.closest('form');
                        if (form) {
                            form.submit();
                        }
                    }
                });
            });
        });
    </script>
@endsection

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            toast.show("{{ session('success') }}", 'success');
        });
    </script>
@endif
