@extends('base')

@section('title', $categorie->nom)

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="{{ route('categories.index') }}" class="text-purple-600 hover:text-purple-800 transition duration-150 inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour aux catégories
            </a>
        </div>


    </div>
@endsection
