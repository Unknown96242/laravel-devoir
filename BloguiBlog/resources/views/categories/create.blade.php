@extends('base')

@section('title', "Créer une catégorie")

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-8">
        <h3 class="text-3xl font-bold text-gray-800 mb-6">
            Créer une nouvelle catégorie
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

        <form action="{{ route('categories.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf

            <div class="mb-6">
                <label for="nom" class="block text-gray-700 font-semibold mb-2">
                    Nom de la catégorie <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    name="nom"
                    id="nom"
                    value="{{ old('nom') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('nom') border-red-500 @enderror"
                    placeholder="Entrez le nom de la catégorie"
                    autofocus>
                @error('nom')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
                    Enregistrer la catégorie
                </button>
                <a href="{{ route('categories.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-3 rounded-lg transition duration-200">
                    Annuler
                </a>
            </div>
        </form>

    </div>
@endsection
