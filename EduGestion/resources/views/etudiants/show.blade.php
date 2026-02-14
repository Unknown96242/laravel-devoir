@extends('layouts.base')

@section('title', 'Profil Étudiant')

@section('content')
    <x-toast />

    <main>
        <div class="head-title">
            <div class="left">
                <h1>Profil Étudiant</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li><a href="{{ route('etudiants.list') }}">Étudiants</a></li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li><a class="active" href="#">{{ $etudiant->prenom }} {{ $etudiant->nom }}</a></li>
                </ul>
            </div>
            <div style="display: flex; gap: 12px;">
                <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn-download">
                    <i class='bx bx-edit'></i>
                    <span class="text">Modifier</span>
                </a>
                <a href="{{ route('etudiants.list') }}" class="btn-secondary-action">
                    <i class='bx bx-arrow-back'></i>
                    <span class="text">Retour</span>
                </a>
            </div>
        </div>

        <div class="student-profile-container">
            <!-- Carte d'identité étudiant -->
            <div class="student-id-card">
                <!-- Header de la carte avec logo -->
                <div class="card-header-section">
                    <div class="school-logo">
                        <i class='bx bxs-graduation'></i>
                    </div>
                    <div class="school-info">
                        <h3>Institut Supérieur d'Informatique</h3>
                        <p>ISI - Dakar, Sénégal</p>
                    </div>
                    <div class="card-status">
                        @if ($etudiant->statut)
                            <span class="status-badge active">
                                <i class='bx bx-check-circle'></i>
                                Actif
                            </span>
                        @else
                            <span class="status-badge inactive">
                                <i class='bx bx-x-circle'></i>
                                Inactif
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Photo et infos principales -->
                <div class="student-main-info">
                    <div class="student-photo-container">
                        <div class="student-photo">
                            <span class="initials">
                                {{ strtoupper(substr($etudiant->prenom, 0, 1) . substr($etudiant->nom, 0, 1)) }}
                            </span>
                        </div>
                        <div class="photo-decoration"></div>
                    </div>

                    <div class="student-identity">
                        <h1 class="student-fullname">{{ $etudiant->prenom }} {{ $etudiant->nom }}</h1>
                        <div class="matricule-badge">
                            <i class='bx bx-id-card'></i>
                            {{ $etudiant->matricule }}
                        </div>
                    </div>
                </div>

                <!-- Informations de contact -->
                <div class="contact-grid">
                    <div class="contact-item">
                        <div class="contact-icon email">
                            <i class='bx bx-envelope'></i>
                        </div>
                        <div class="contact-details">
                            <span class="contact-label">Email</span>
                            <a href="mailto:{{ $etudiant->email }}" class="contact-value">{{ $etudiant->email }}</a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon phone">
                            <i class='bx bx-phone'></i>
                        </div>
                        <div class="contact-details">
                            <span class="contact-label">Téléphone</span>
                            <span class="contact-value">{{ $etudiant->telephone ?? 'Non renseigné' }}</span>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon birthday">
                            <i class='bx bx-cake'></i>
                        </div>
                        <div class="contact-details">
                            <span class="contact-label">Date de naissance</span>
                            <span
                                class="contact-value">{{ \Carbon\Carbon::parse($etudiant->date_naissance)->format('d/m/Y') }}</span>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon age">
                            <i class='bx bx-calendar'></i>
                        </div>
                        <div class="contact-details">
                            <span class="contact-label">Âge</span>
                            <span class="contact-value">{{ \Carbon\Carbon::parse($etudiant->date_naissance)->age }}
                                ans</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Parcours scolaire -->
            <div class="academic-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class='bx bxs-book-bookmark'></i>
                    </div>
                    <h2>Parcours Scolaire</h2>
                </div>

                <div class="academic-grid">
                    <!-- Inscription -->
                    <div class="academic-card">
                        <div class="academic-card-icon">
                            <i class='bx bx-calendar-check'></i>
                        </div>
                        <div class="academic-card-content">
                            <h4>Date d'inscription</h4>
                            <p>{{ $etudiant->created_at->format('d F Y') }}</p>
                            <span class="academic-card-badge">Il y a {{ $etudiant->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <!-- Durée -->
                    <div class="academic-card">
                        <div class="academic-card-icon">
                            <i class='bx bx-time-five'></i>
                        </div>
                        <div class="academic-card-content">
                            <h4>Durée de scolarité</h4>
                            <p>{{ \App\Helpers\DateHelper::formatDuration($etudiant->created_at) }}</p>
                            <span class="academic-card-badge">
                                {{ $etudiant->created_at->diffInDays(now()) }}
                                jour{{ $etudiant->created_at->diffInDays(now()) > 1 ? 's' : '' }} au total
                            </span>
                        </div>
                    </div>

                    <!-- Statut académique -->
                    <div class="academic-card">
                        <div class="academic-card-icon">
                            <i class='bx bx-badge-check'></i>
                        </div>
                        <div class="academic-card-content">
                            <h4>Statut académique</h4>
                            <p>{{ $etudiant->statut ? 'Inscrit' : 'Suspendu' }}</p>
                            <span class="academic-card-badge">
                                {{ $etudiant->statut ? 'En cours' : 'Inactif' }}
                            </span>
                        </div>
                    </div>

                    <!-- Dernière mise à jour -->
                    <div class="academic-card">
                        <div class="academic-card-icon">
                            <i class='bx bx-refresh'></i>
                        </div>
                        <div class="academic-card-content">
                            <h4>Dernière mise à jour</h4>
                            <p>{{ $etudiant->updated_at->format('d/m/Y') }}</p>
                            <span class="academic-card-badge">{{ $etudiant->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

                <!-- Timeline fictive -->
                <div class="timeline-section">
                    <h3>Historique</h3>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-dot active"></div>
                            <div class="timeline-content">
                                <div class="timeline-date">{{ $etudiant->created_at->format('d M Y') }}</div>
                                <h4>Inscription à l'ISI</h4>
                                <p>Première inscription au sein de l'établissement</p>
                            </div>
                        </div>

                        @if ($etudiant->updated_at != $etudiant->created_at)
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <div class="timeline-content">
                                    <div class="timeline-date">{{ $etudiant->updated_at->format('d M Y') }}</div>
                                    <h4>Mise à jour du profil</h4>
                                    <p>Dernière modification des informations</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="profile-actions">
            <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST"
                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">
                    <i class='bx bx-trash'></i>
                    Supprimer l'étudiant
                </button>
            </form>
        </div>
    </main>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endpush

{{-- @push('scripts')
<script src="{{ asset('js/pages/show.js') }}"></script>
@endpush --}}
