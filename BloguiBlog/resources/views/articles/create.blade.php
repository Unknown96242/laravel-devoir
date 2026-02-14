@extends('base')

@section('title', "Formulaire de création d'un article")

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-8">
        <h3 class="text-3xl font-bold text-gray-800 mb-6">
            Créer un nouvel article
        </h3>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ Session::get('success') }}
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf

            <div class="mb-6">
                <label for="titre" class="block text-gray-700 font-semibold mb-2">
                    Titre de l'article <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    name="titre"
                    id="titre"
                    value="{{ old('titre') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('titre') border-red-500 @enderror"
                    placeholder="Entrez le titre de l'article">
                @error('titre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="categorie_id" class="block text-gray-700 font-semibold mb-2">
                    Catégorie <span class="text-red-500">*</span>
                </label>
                <select
                    name="categorie_id"
                    id="categorie_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('categorie_id') border-red-500 @enderror">
                    <option value="">-- Sélectionnez une catégorie --</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->nom }}
                        </option>
                    @endforeach
                </select>
                @error('categorie_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="contenu" class="block text-gray-700 font-semibold mb-2">
                    Contenu de l'article <span class="text-red-500">*</span>
                </label>
                <textarea
                    name="contenu"
                    id="contenu"
                    rows="8"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('contenu') border-red-500 @enderror"
                    placeholder="Rédigez le contenu de votre article">{{ old('contenu') }}</textarea>
                @error('contenu')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="statut" class="block text-gray-700 font-semibold mb-2">
                    Statut <span class="text-red-500">*</span>
                </label>
                <select
                    name="statut"
                    id="statut"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('statut') border-red-500 @enderror">
                    <option value="publie" {{ old('statut') == 'publie' ? 'selected' : '' }}>Publié</option>
                    <option value="brouillon" {{ old('statut', 'brouillon') == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                </select>
                @error('statut')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
                    Enregistrer l'article
                </button>
                <a href="{{ route('articles.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-3 rounded-lg transition duration-200">
                    Annuler
                </a>
            </div>
        </form>
    </div>
@endsection
