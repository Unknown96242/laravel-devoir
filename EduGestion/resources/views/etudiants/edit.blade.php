@extends('layouts.base')

@section('title', 'Ajouter un Étudiant')

@section('content')
<x-toast />
<main>
    <div class="head-title">
        <div class="left">
            <h1>Modification Étudiant</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a href="{{ route('etudiants.list') }}">Étudiants</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="#">Modifier</a></li>
            </ul>
        </div>
        <a href="{{ route('etudiants.list') }}" class="btn-download">
            <i class='bx bx-arrow-back'></i>
            <span class="text">Retour à la liste</span>
        </a>
    </div>

    <div class="form-container">
        <div class="form-card">
            <div class="form-header">
                <div class="icon-wrapper">
                    <i class='bx bxs-user-plus'></i>
                </div>
                <div>
                    <h2>Informations de l'étudiant</h2>
                    <p>Tous les champs (*) sont obligatoires </p>
                </div>
            </div>

            <form action="{{ route('etudiants.update', $etudiant) }}" method="POST" class="student-form">
                @method('PUT')
                @csrf

                <div class="form-grid">
                    <!-- Matricule -->
                    <div class="form-group">
                        <label for="matricule">
                            <i class='bx bx-id-card'></i>
                            Matricule <span class="required">*</span>
                        </label>
                        <input type="text"
                               class="form-input @error('matricule') error @enderror"
                               id="matricule"
                               name="matricule"
                               value="{{ $etudiant->matricule }}"
                               placeholder="Ex: ISI2024001"
                               required>
                        @error('matricule')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nom -->
                    <div class="form-group">
                        <label for="nom">
                            <i class='bx bx-user'></i>
                            Nom <span class="required">*</span>
                        </label>
                        <input type="text"
                               class="form-input @error('nom') error @enderror"
                               id="nom"
                               name="nom"
                               value="{{$etudiant->nom }}"
                               placeholder="Ex: Diallo"
                               required>
                        @error('nom')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Prénom -->
                    <div class="form-group">
                        <label for="prenom">
                            <i class='bx bx-user'></i>
                            Prénom <span class="required">*</span>
                        </label>
                        <input type="text"
                               class="form-input @error('prenom') error @enderror"
                               id="prenom"
                               name="prenom"
                               value="{{ $etudiant->prenom }}"
                               placeholder="Ex: Amadou"
                               required>
                        @error('prenom')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">
                            <i class='bx bx-envelope'></i>
                            Email <span class="required">*</span>
                        </label>
                        <input type="email"
                               class="form-input @error('email') error @enderror"
                               id="email"
                               name="email"
                               value="{{ $etudiant->email }}"
                               placeholder="Ex: amadou.diallo@isi.sn"
                               required>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Téléphone -->
                    <div class="form-group">
                        <label for="telephone">
                            <i class='bx bx-phone'></i>
                            Téléphone
                        </label>
                        <input type="text"
                               class="form-input @error('telephone') error @enderror"
                               id="telephone"
                               name="telephone"
                               value="{{ $etudiant->telephone }}"
                               placeholder="Ex: +221 77 123 45 67">
                        @error('telephone')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Date de naissance -->
                    <div class="form-group">
                        <label for="date_naissance">
                            <i class='bx bx-calendar'></i>
                            Date de Naissance <span class="required">*</span>
                        </label>
                        <input type="date"
                               class="form-input @error('date_naissance') error @enderror"
                               id="date_naissance"
                               name="date_naissance"
                               value="{{ $etudiant->date_naissance->format('Y-m-d') }}"
                               required>
                        @error('date_naissance')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Statut -->
                <div class="form-group-full">
                    <div class="toggle-wrapper">
                        <input type="checkbox"
                               id="statut"
                               name="statut"
                               value="{{ $etudiant->statut ? '1' : '0' }}"
                               {{ $etudiant->statut ? 'checked' : '' }}
                               hidden>
                        <label for="statut" class="toggle-label">
                            <div class="toggle-switch">
                                <div class="toggle-slider"></div>
                            </div>
                            <div class="toggle-text">
                                <i class='bx bx-check-circle'></i>
                                <span>Étudiant actif</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Boutons -->
                <div class="form-actions">
                    <button type="reset" class="btn-secondary">
                        <i class='bx bx-reset'></i>
                        Réinitialiser
                    </button>
                    <button type="submit" class="btn-primary">
                        <i class='bx bx-save'></i>
                        Mettre à jour l'étudiant
                    </button>
                </div>
            </form>
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
<link rel="stylesheet" href="{{ asset('css/createandedit.css') }}">
@endpush
