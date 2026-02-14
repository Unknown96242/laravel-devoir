@extends('base')

@section('title', 'Modifier Enseignant')

@section('content')
    <main class="md:ml-72 min-h-screen transition-all duration-500">
        <!-- Header -->
        <header
            class="sticky top-0 z-40 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border-b border-slate-200 dark:border-slate-700">
            {{-- <div>
                <-
            </div> --}}
            <div class="px-6 py-4 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <button id="menu-toggle"
                        class="md:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <a href="{{ route('enseignants.index') }}" id="menu-toggle"
                        class="md:block  hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer">
                        <i class="material-symbols-outlined">arrow_back</i>
                    </a>

                    <div>
                        <h2 class="text-2xl font-display font-bold text-slate-900 dark:text-white">Modifier Enseignant</h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400 font-sans">Modifiez les informations d'un enseignant existant</p>
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

        <!-- Form Content -->
        <div class="p-6">
            <div class="max-w-5xl mx-auto">
                <form class="space-y-6" method="POST" action="{{ route('enseignants.update', $enseignant->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Photo Upload Section (inchangé, disabled) -->
                    <div
                        class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                        <h3 class="text-lg font-display font-bold text-slate-900 dark:text-white mb-6">Photo de profil</h3>
                        <div class="flex items-center space-x-6">
                            <div
                                class="w-32 h-32 bg-gradient-to-br from-academic-500 to-academic-700 rounded-2xl flex items-center justify-center text-white shadow-lg">
                                <span class="material-symbols-outlined text-6xl">person</span>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-sans text-slate-600 dark:text-slate-400 mb-3">Téléchargez une photo
                                    de profil professionnelle</p>
                                <label
                                    class="cursor-not-allowed inline-block px-6 py-3 bg-slate-100 dark:bg-slate-800 text-slate-400 dark:text-slate-500 rounded-xl font-sans font-semibold opacity-50">
                                    <input type="file" class="hidden" accept="image/*" disabled>
                                    Choisir une photo
                                </label>
                                <p class="text-xs font-sans text-slate-500 dark:text-slate-400 mt-2">Format: JPG, PNG.
                                    Taille max: 2MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information -->
                    <div
                        class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                        <h3 class="text-lg font-display font-bold text-slate-900 dark:text-white mb-6">Informations
                            Personnelles</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Prénom -->
                            <div class="form-group">
                                <label
                                    class="block text-sm font-sans font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                    Prénom <span class="text-red-500">*</span>
                                </label>
                                <input name="prenom" id="prenom" type="text" placeholder="Ex: Moussa" value="{{ old('prenom', $enseignant->prenom) }}"
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border @error('prenom') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl text-slate-900 dark:text-white focus:ring-2 focus:ring-academic-500 outline-none transition-all duration-300">
                                @error('prenom')
                                    <p class="text-red-500 text-xs mt-1 font-sans">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nom -->
                            <div class="form-group">
                                <label
                                    class="block text-sm font-sans font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                    Nom de famille <span class="text-red-500">*</span>
                                </label>
                                <input name="nom" id="nom" type="text" placeholder="Ex: Diallo" value="{{ old('nom', $enseignant->nom) }}"
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border @error('nom') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl text-slate-900 dark:text-white focus:ring-2 focus:ring-academic-500 outline-none transition-all duration-300">
                                @error('nom')
                                    <p class="text-red-500 text-xs mt-1 font-sans">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Téléphone -->
                            <div class="form-group">
                                <label
                                    class="block text-sm font-sans font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                    Téléphone
                                </label>
                                <input name="telephone" id="telephone" type="tel" placeholder="+221 77 XXX XX XX"
                                    value="{{ old('telephone', $enseignant->telephone) }}"
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border @error('telephone') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl text-slate-900 dark:text-white focus:ring-2 focus:ring-academic-500 outline-none transition-all duration-300">
                                @error('telephone')
                                    <p class="text-red-500 text-xs mt-1 font-sans">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label
                                    class="block text-sm font-sans font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input name="email" id="email" type="email" placeholder="exemple@unimanage.sn"
                                    value="{{ old('email', $enseignant->email) }}"
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border @error('email') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl text-slate-900 dark:text-white focus:ring-2 focus:ring-academic-500 outline-none transition-all duration-300">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1 font-sans">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Academic Information -->
                    <div
                        class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-lg">
                        <h3 class="text-lg font-display font-bold text-slate-900 dark:text-white mb-6">Informations
                            Académiques</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Titre/Grade -->
                            <div class="form-group">
                                <label
                                    class="block text-sm font-sans font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                    Titre/Grade <span class="text-red-500">*</span>
                                </label>
                                <select name="grade" id="grade"
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border @error('grade') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl text-slate-900 dark:text-white focus:ring-2 focus:ring-academic-500 outline-none transition-all duration-300">
                                    <option value="">Sélectionner...</option>
                                    <option value="professeur" {{ old('grade', $enseignant->grade) == 'professeur' ? 'selected' : '' }}>
                                        Professeur</option>
                                    <option value="docteur" {{ old('grade', $enseignant->grade) == 'docteur' ? 'selected' : '' }}>Docteur
                                    </option>
                                    <option value="maitre_conferences"
                                        {{ old('grade', $enseignant->grade) == 'maitre_conferences' ? 'selected' : '' }}>Maître de
                                        conférences</option>
                                    <option value="assistant" {{ old('grade', $enseignant->grade) == 'assistant' ? 'selected' : '' }}>
                                        Assistant</option>
                                </select>
                                @error('grade')
                                    <p class="text-red-500 text-xs mt-1 font-sans">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Département -->
                            <div class="form-group">
                                <label
                                    class="block text-sm font-sans font-semibold text-slate-700 dark:text-slate-300 mb-2">
                                    Département <span class="text-red-500">*</span>
                                </label>
                                <select name="departement" id="departement"
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border @error('departement') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl text-slate-900 dark:text-white focus:ring-2 focus:ring-academic-500 outline-none transition-all duration-300">
                                    <option value="">Sélectionner...</option>
                                    <option value="informatique"
                                        {{ old('departement', $enseignant->departement) == 'informatique' ? 'selected' : '' }}>Informatique</option>
                                    <option value="mathematiques"
                                        {{ old('departement', $enseignant->departement) == 'mathematiques' ? 'selected' : '' }}>Mathématiques
                                    </option>
                                    <option value="physique" {{ old('departement', $enseignant->departement) == 'physique' ? 'selected' : '' }}>
                                        Physique</option>
                                    <option value="chimie" {{ old('departement', $enseignant->departement) == 'chimie' ? 'selected' : '' }}>Chimie
                                    </option>
                                    <option value="biologie" {{ old('departement', $enseignant->departement) == 'biologie' ? 'selected' : '' }}>
                                        Biologie</option>
                                </select>
                                @error('departement')
                                    <p class="text-red-500 text-xs mt-1 font-sans">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Statut -->
                            <div class="form-group md:col-span-2">
                                <div class="flex items-center space-x-4">
                                    <input type="checkbox" id="statut" name="statut" id="statut" value="{{ $enseignant->statut =='actif'? '1' : '' }}"
                                        {{ old('statut', $enseignant->statut == 'actif') ? 'checked' : '' }} class="peer hidden">
                                    <label for="statut" class="flex items-center cursor-pointer select-none group">
                                        <div
                                            class="relative w-14 h-7 bg-slate-200 dark:bg-slate-700 rounded-full mr-3 transition-all duration-300 peer-checked:bg-gradient-to-r peer-checked:from-green-500 peer-checked:to-green-600 shadow-inner">
                                            <div
                                                class="absolute top-1 left-1 w-5 h-5 bg-white rounded-full shadow-lg transition-all duration-300 peer-checked:translate-x-7 peer-checked:shadow-xl">
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span
                                                class="material-symbols-outlined text-slate-400 dark:text-slate-500 peer-checked:text-green-600 dark:peer-checked:text-green-400 transition-colors duration-300 text-xl">check_circle</span>
                                            <span
                                                class="text-sm font-sans font-semibold text-slate-700 dark:text-slate-300 peer-checked:text-green-600 dark:peer-checked:text-green-400 transition-colors duration-300">Enseignant
                                                actif
                                            </span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('enseignants.index') }}"
                            class="px-8 py-3 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-xl font-sans font-semibold transition-all duration-300">
                            Annuler
                        </a>
                        <button type="submit"
                            class="px-8 py-3 bg-gradient-to-r from-academic-500 to-academic-700 hover:from-academic-600 hover:to-academic-800 text-white rounded-xl font-sans font-semibold shadow-lg shadow-academic-500/30 transition-all duration-300 flex items-center space-x-2">
                            <span>Enregistrer</span>
                            <span class="material-symbols-outlined">save</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@section('style')

    <style>
        input[type="checkbox"]:checked+label>div:first-child {
            background: linear-gradient(to right, #22c55e, #16a34a);
        }

        input[type="checkbox"]:checked+label>div:first-child>div {
            transform: translateX(1.75rem);
        }

        input[type="checkbox"]:checked+label span.material-symbols-outlined {
            color: #22c55e;
        }

        input[type="checkbox"]:checked+label span:last-child {
            color: #22c55e;
        }

        @media (prefers-color-scheme: dark) {
            input[type="checkbox"]:checked+label span.material-symbols-outlined {
                color: #4ade80;
            }

            input[type="checkbox"]:checked+label span:last-child {
                color: #4ade80;
            }
        }
    </style>
@endsection
