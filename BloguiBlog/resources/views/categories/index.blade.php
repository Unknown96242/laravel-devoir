@extends('base')

@section('title', 'Liste des Categories')

@section('content')

<div>
    <div>
        <a href="{{ route('categories.create') }}" class="p-4 text-white bg-blue-800 rounded-2xl ml-2">
           + Ajouter une categorie
        </a>
    </div>
    <table class="w-full">
        <thead>
            <th class="p-3 text-sm font-semibold tracking-wide">Titre</th>
            <th>Nom</th>
        </thead>
        <tbody>
             @forelse ($categories as $categories)
                <tr>
                    <td>{{ $categories->nom }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Aucune categorie disponible</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
