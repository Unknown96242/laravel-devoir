@extends('layouts.base')

@section('title', 'Statistiques')

@section('content')
    <x-toast />
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Statistiques & Analyses</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li><a class="active" href="#">Statistiques</a></li>
                </ul>
            </div>
            <div style="display: flex; gap: 12px;">
                <button class="btn-download" onclick="exportData()">
                    <i class='bx bx-download'></i>
                    <span class="text">Exporter</span>
                </button>
                <button class="btn-print" onclick="window.print()">
                    <i class='bx bx-printer'></i>
                    <span class="text">Imprimer</span>
                </button>
            </div>
        </div>

        <!-- KPIs Cards -->
        <div class="stats-kpi-grid">
            <!-- Total -->
            <div class="kpi-card">
                <div class="kpi-icon total">
                    <i class='bx bxs-group'></i>
                </div>
                <div class="kpi-content">
                    <span class="kpi-label">Total Étudiants</span>
                    <h2 class="kpi-value">{{ $totalEtudiants }}</h2>
                    <div class="kpi-footer">
                        <span class="kpi-badge neutral">
                            <i class='bx bx-data'></i>
                            Base complète
                        </span>
                    </div>
                </div>
            </div>

            <!-- Actifs -->
            <div class="kpi-card">
                <div class="kpi-icon success">
                    <i class='bx bxs-check-circle'></i>
                </div>
                <div class="kpi-content">
                    <span class="kpi-label">Actifs</span>
                    <h2 class="kpi-value">{{ $etudiantsActifs }}</h2>
                    <div class="kpi-footer">
                        <span class="kpi-badge success">
                            <i class='bx bx-trending-up'></i>
                            {{ $totalEtudiants > 0 ? number_format(($etudiantsActifs / $totalEtudiants) * 100, 1) : 0 }}%
                        </span>
                    </div>
                </div>
            </div>

            <!-- Inactifs -->
            <div class="kpi-card">
                <div class="kpi-icon danger">
                    <i class='bx bxs-x-circle'></i>
                </div>
                <div class="kpi-content">
                    <span class="kpi-label">Inactifs</span>
                    <h2 class="kpi-value">{{ $etudiantsInactifs }}</h2>
                    <div class="kpi-footer">
                        <span class="kpi-badge danger">
                            <i class='bx bx-trending-down'></i>
                            {{ $totalEtudiants > 0 ? number_format(($etudiantsInactifs / $totalEtudiants) * 100, 1) : 0 }}%
                        </span>
                    </div>
                </div>
            </div>

            <!-- Croissance -->
            <div class="kpi-card">
                <div class="kpi-icon {{ $tauxCroissance >= 0 ? 'success' : 'danger' }}">
                    <i class='bx {{ $tauxCroissance >= 0 ? 'bxs-up-arrow' : 'bxs-down-arrow' }}'></i>
                </div>
                <div class="kpi-content">
                    <span class="kpi-label">Taux de croissance</span>
                    <h2 class="kpi-value">{{ number_format(abs($tauxCroissance), 1) }}%</h2>
                    <div class="kpi-footer">
                        <span class="kpi-badge {{ $tauxCroissance >= 0 ? 'success' : 'danger' }}">
                            <i class='bx bx-calendar'></i>
                            Ce mois: {{ $moisActuel }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphiques principaux -->
        <div class="charts-grid">
            <!-- Évolution mensuelle -->
            <div class="chart-card large">
                <div class="chart-header">
                    <div>
                        <h3>Évolution des inscriptions</h3>
                        <p>12 derniers mois</p>
                    </div>
                    <div class="chart-actions">
                        <button class="chart-btn active" data-period="12">12M</button>
                        <button class="chart-btn" data-period="6">6M</button>
                        <button class="chart-btn" data-period="3">3M</button>
                    </div>
                </div>
                <div class="chart-body">
                    <canvas id="evolutionChart"></canvas>
                </div>
            </div>

            <!-- Répartition statut -->
            <div class="chart-card">
                <div class="chart-header">
                    <div>
                        <h3>Répartition par statut</h3>
                        <p>Actifs vs Inactifs</p>
                    </div>
                </div>
                <div class="chart-body">
                    <canvas id="statutChart"></canvas>
                </div>
                <div class="chart-legend">
                    <div class="legend-item">
                        <span class="legend-dot success"></span>
                        <span>Actifs ({{ $etudiantsActifs }})</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-dot danger"></span>
                        <span>Inactifs ({{ $etudiantsInactifs }})</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphiques secondaires -->
        <div class="charts-grid">
            <!-- Tranches d'âge -->
            <div class="chart-card">
                <div class="chart-header">
                    <div>
                        <h3>Répartition par âge</h3>
                        <p>Tranches d'âge</p>
                    </div>
                </div>
                <div class="chart-body">
                    <canvas id="ageChart"></canvas>
                </div>
            </div>

            <!-- Trimestres -->
            <div class="chart-card">
                <div class="chart-header">
                    <div>
                        <h3>Inscriptions par trimestre</h3>
                        <p>4 derniers trimestres</p>
                    </div>
                </div>
                <div class="chart-body">
                    <canvas id="trimestreChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Analyses détaillées -->
        <div class="analysis-section">
            <div class="analysis-header">
                <div class="section-icon">
                    <i class='bx bxs-bar-chart-alt-2'></i>
                </div>
                <h2>Analyses détaillées</h2>
            </div>

            <div class="analysis-grid">
                <!-- Tendances -->
                <div class="analysis-card">
                    <div class="analysis-icon trend">
                        <i class='bx bx-trending-up'></i>
                    </div>
                    <div class="analysis-content">
                        <h4>Tendance générale</h4>
                        <p>
                            @if ($tauxCroissance > 0)
                                Les inscriptions sont en <strong>hausse de
                                    {{ number_format($tauxCroissance, 1) }}%</strong> par rapport au mois dernier.
                            @elseif($tauxCroissance < 0)
                                Les inscriptions sont en <strong>baisse de
                                    {{ number_format(abs($tauxCroissance), 1) }}%</strong> par rapport au mois dernier.
                            @else
                                Les inscriptions sont <strong>stables</strong> par rapport au mois dernier.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Moyenne -->
                <div class="analysis-card">
                    <div class="analysis-icon average">
                        <i class='bx bx-calculator'></i>
                    </div>
                    <div class="analysis-content">
                        <h4>Moyenne mensuelle</h4>
                        <p>
                            En moyenne, <strong>{{ number_format(collect($etudiantsParMois)->avg('count'), 1) }}
                                étudiants</strong> s'inscrivent chaque mois.
                        </p>
                    </div>
                </div>

                <!-- Pic -->
                <div class="analysis-card">
                    <div class="analysis-icon peak">
                        <i class='bx bx-bar-chart-alt'></i>
                    </div>
                    <div class="analysis-content">
                        <h4>Mois record</h4>
                        <p>
                            Le pic d'inscriptions a eu lieu en
                            <strong>{{ collect($etudiantsParMois)->sortByDesc('count')->first()['mois'] ?? 'N/A' }}</strong>
                            avec {{ collect($etudiantsParMois)->max('count') }} inscriptions.
                        </p>
                    </div>
                </div>

                <!-- Taux d'activité -->
                <div class="analysis-card">
                    <div class="analysis-icon activity">
                        <i class='bx bx-check-shield'></i>
                    </div>
                    <div class="analysis-content">
                        <h4>Taux d'activité</h4>
                        <p>
                            <strong>{{ $totalEtudiants > 0 ? number_format(($etudiantsActifs / $totalEtudiants) * 100, 1) : 0 }}%</strong>
                            des étudiants sont actuellement actifs dans le système.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="{{ asset('js/pages/statistiques.js') }}"></script>
    <script>
        // Initialiser les graphiques au chargement du DOM
        document.addEventListener('DOMContentLoaded', function() {
            // Passer les données PHP au JavaScript
            const statistiquesData = {
                etudiantsParMois: @json($etudiantsParMois),
                etudiantsActifs: {{ $etudiantsActifs }},
                etudiantsInactifs: {{ $etudiantsInactifs }},
                totalEtudiants: {{ $totalEtudiants }},
                tranchesAge: @json($tranchesAge),
                trimestres: @json($trimestres)
            };

            // Initialiser les graphiques
            initStatistiques(statistiquesData);
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/statistiques.css') }}">
@endpush
