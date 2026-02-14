@extends('layouts.base')

@section('title', 'Liste des Étudiants')

@section('content')
<x-toast />

<main>
    <div class="head-title">
        <div class="left">
            <h1>Étudiants</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="#">Liste des étudiants</a></li>
            </ul>
        </div>
        <a href="{{ route('etudiants.create') }}" class="btn-download">
            <i class='bx bxs-user-plus'></i>
            <span class="text">Ajouter un étudiant</span>
        </a>
    </div>

    <!-- Stats Cards -->
    <ul class="box-info">
        <li>
            <i class='bx bxs-group'></i>
            <span class="text">
                <h3>{{ $etudiants->count() }}</h3>
                <p>Total Étudiants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-check-circle'></i>
            <span class="text">
                <h3>{{ $etudiants->where('statut', true)->count() }}</h3>
                <p>Actifs</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-x-circle'></i>
            <span class="text">
                <h3>{{ $etudiants->where('statut', false)->count() }}</h3>
                <p>Inactifs</p>
            </span>
        </li>
    </ul>

    <!-- Table -->
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Liste complète</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>

            @if ($etudiants->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Étudiant</th>
                            <th>Matricule</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etudiants as $etudiant)
                            <tr>
                                <td>
                                    <div class="student-info">
                                        <div class="avatar">
                                            {{ strtoupper(substr($etudiant->prenom, 0, 1) . substr($etudiant->nom, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="student-name">{{ $etudiant->prenom }} {{ $etudiant->nom }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $etudiant->matricule }}</td>
                                <td>{{ $etudiant->email }}</td>
                                <td>{{ $etudiant->telephone ?? 'N/A' }}</td>
                                <td>
                                    @if ($etudiant->statut)
                                        <span class="status completed">Actif</span>
                                    @else
                                        <span class="status pending">Inactif</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('etudiants.show', $etudiant->id) }}"
                                           class="action-btn view"
                                           title="Voir">
                                            <i class='bx bx-show'></i>
                                        </a>
                                        <a href="{{ route('etudiants.edit', $etudiant->id) }}"
                                           class="action-btn edit"
                                           title="Modifier">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                        <form action="{{ route('etudiants.destroy', $etudiant->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Confirmer la suppression de {{ $etudiant->prenom }} {{ $etudiant->nom }} ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete" title="Supprimer">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <i class='bx bx-user-x'></i>
                    <p>Aucun étudiant enregistré</p>
                    <a href="{{ route('etudiants.create') }}" class="btn-download">
                        <i class='bx bxs-user-plus'></i>
                        <span>Ajouter le premier étudiant</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
</main>
@endsection

@if(session('toast'))
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                toast(@json(session('toast')));
            });
        </script>
    @endpush
@endif

@push('styles')
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endpush
