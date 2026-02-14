@extends('base')

@section('title', $article->titre)

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="{{ route('articles.index') }}" class="text-blue-600 hover:text-blue-800 transition duration-150 inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour à la liste
            </a>
        </div>

        @if (Session::has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-8">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-3">
                            {{ $article->titre }}
                        </h1>
                        <div class="flex items-center gap-4">
                            @if ($article->statut === 'publie')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Publié
                                </span>
                            @else
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Brouillon
                                </span>
                            @endif
                            <span class="text-blue-100 text-sm">
                                Article #{{ $article->id }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-6 py-8">
                <div class="prose max-w-none">
                    <h3 class="text-lg font-semibold text-gray-700 mb-3">Contenu</h3>
                    <div class="text-gray-700 leading-relaxed whitespace-pre-wrap">
                        {{ $article->contenu }}
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="font-semibold text-gray-600">Date de création :</span>
                            <span class="text-gray-800 ml-2">{{ $article->created_at->format('d/m/Y à H:i') }}</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-600">Dernière modification :</span>
                            <span class="text-gray-800 ml-2">{{ $article->updated_at->format('d/m/Y à H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-between items-center border-t border-gray-200">
                <a href="{{ route('articles.edit', $article) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-3 rounded-lg transition duration-200 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Modifier
                </a>

                <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-lg transition duration-200 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
