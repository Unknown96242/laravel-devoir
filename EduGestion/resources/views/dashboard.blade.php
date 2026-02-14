@extends('layouts.base')

@section('title', 'Dashboard - EduGestion')

@section('content')
<x-toast />

<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li><a href="#">EduGestion</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="#">Dashboard</a></li>
            </ul>
        </div>
        <a href="{{ route('etudiants.create') }}" class="btn-download">
            <i class='bx bxs-user-plus'></i>
            <span class="text">Ajouter un étudiant</span>
        </a>
    </div>

    <!-- Statistiques -->
    <ul class="box-info">
        <li>
            <i class='bx bxs-group'></i>
            <span class="text">
                <h3>{{ $totalEtudiants }}</h3>
                <p>Total Étudiants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-check-circle'></i>
            <span class="text">
                <h3>{{ $etudiantsActifs }}</h3>
                <p>Étudiants Actifs</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-calendar-check'></i>
            <span class="text">
                <h3>{{ $nouveauxCeMois }}</h3>
                <p>Nouveaux ce mois</p>
            </span>
        </li>
    </ul>

    <div class="table-data">
        <!-- Étudiants récents -->
        <div class="order">
            <div class="head">
                <h3>Derniers étudiants inscrits</h3>
                <a href="{{ route('etudiants.list') }}">
                    <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>

            @if($derniersEtudiants->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Étudiant</th>
                            <th>Matricule</th>
                            <th>Date d'inscription</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($derniersEtudiants as $etudiant)
                            <tr>
                                <td>
                                    <div class="student-avatar">
                                        {{ strtoupper(substr($etudiant->prenom, 0, 1) . substr($etudiant->nom, 0, 1)) }}
                                    </div>
                                    <p>{{ $etudiant->prenom }} {{ $etudiant->nom }}</p>
                                </td>
                                <td>{{ $etudiant->matricule }}</td>
                                <td>{{ $etudiant->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if($etudiant->statut)
                                        <span class="status completed">Actif</span>
                                    @else
                                        <span class="status pending">Inactif</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state-small">
                    <i class='bx bx-user-x'></i>
                    <p>Aucun étudiant inscrit</p>
                </div>
            @endif
        </div>

        <!-- Actions rapides & Statistiques -->
        <div class="todo">
            <div class="head">
                <h3>Actions rapides</h3>
                <i class='bx bx-dots-vertical-rounded'></i>
            </div>
            <ul class="todo-list">
                <li class="action-item">
                    <a href="{{ route('etudiants.create') }}">
                        <i class='bx bxs-user-plus'></i>
                        <span>Ajouter un étudiant</span>
                    </a>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li class="action-item">
                    <a href="{{ route('etudiants.list') }}">
                        <i class='bx bxs-user-detail'></i>
                        <span>Voir tous les étudiants</span>
                    </a>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li class="action-item">
                    <a href="#">
                        <i class='bx bxs-file-export'></i>
                        <span>Exporter les données</span>
                    </a>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li class="action-item">
                    <a href="#">
                        <i class='bx bxs-cog'></i>
                        <span>Paramètres</span>
                    </a>
                    <i class='bx bx-chevron-right'></i>
                </li>
            </ul>

            <!-- Mini statistiques -->
            <div class="mini-stats">
                <div class="mini-stat">
                    <div class="mini-stat-icon blue">
                        <i class='bx bxs-graduation'></i>
                    </div>
                    <div class="mini-stat-text">
                        <h4>{{ number_format(($etudiantsActifs / max($totalEtudiants, 1)) * 100, 1) }}%</h4>
                        <p>Taux d'activité</p>
                    </div>
                </div>
                <div class="mini-stat">
                    <div class="mini-stat-icon yellow">
                        <i class='bx bxs-calendar'></i>
                    </div>
                    <div class="mini-stat-text">
                        <h4>{{ $nouveauxCeMois }}</h4>
                        <p>Ce mois-ci</p>
                    </div>
                </div>
            </div>
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
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush
