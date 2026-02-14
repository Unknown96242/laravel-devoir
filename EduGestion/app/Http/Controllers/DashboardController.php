<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques globales
        $totalEtudiants = Etudiant::count();
        $etudiantsActifs = Etudiant::where('statut', true)->count();
        $etudiantsInactifs = Etudiant::where('statut', false)->count();

        // Nouveaux étudiants ce mois
        $nouveauxCeMois = Etudiant::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // 5 derniers étudiants inscrits
        $derniersEtudiants = Etudiant::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalEtudiants',
            'etudiantsActifs',
            'etudiantsInactifs',
            'nouveauxCeMois',
            'derniersEtudiants'
        ));
    }

    public function statistiques()
    {
        // Statistiques générales
        $totalEtudiants = Etudiant::count();
        $etudiantsActifs = Etudiant::where('statut', true)->count();
        $etudiantsInactifs = Etudiant::where('statut', false)->count();

        // Étudiants 12 derniers mois
        $etudiantsParMois = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $count = Etudiant::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $etudiantsParMois[] = [
                'mois' => $date->locale('fr')->isoFormat('MMM YYYY'),
                'count' => $count,
            ];
        }

        // Tranches d'âge
        $tranchesAge = [
            '18-20 ans' => Etudiant::whereRaw('EXTRACT(YEAR FROM AGE(CURRENT_DATE, date_naissance)) BETWEEN 18 AND 20')->count(),
            '21-23 ans' => Etudiant::whereRaw('EXTRACT(YEAR FROM AGE(CURRENT_DATE, date_naissance)) BETWEEN 21 AND 23')->count(),
            '24-26 ans' => Etudiant::whereRaw('EXTRACT(YEAR FROM AGE(CURRENT_DATE, date_naissance)) BETWEEN 24 AND 26')->count(),
            '27+ ans' => Etudiant::whereRaw('EXTRACT(YEAR FROM AGE(CURRENT_DATE, date_naissance)) >= 27')->count(),
        ];

        // Nouveaux étudiants par trimestre
        $trimestres = [];
        for ($i = 3; $i >= 0; $i--) {
            $startMonth = now()->subMonths($i * 3)->startOfQuarter();
            $endMonth = now()->subMonths($i * 3)->endOfQuarter();

            $count = Etudiant::whereBetween('created_at', [$startMonth, $endMonth])->count();
            $trimestres[] = [
                'nom' => 'Q'.$startMonth->quarter.' '.$startMonth->year,
                'count' => $count,
            ];
        }

        // Taux de croissance mensuel
        $moisActuel = Etudiant::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        $moisPrecedent = Etudiant::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();

        $tauxCroissance = $moisPrecedent > 0
            ? (($moisActuel - $moisPrecedent) / $moisPrecedent) * 100
            : 0;

        return view('statistiques', compact(
            'totalEtudiants',
            'etudiantsActifs',
            'etudiantsInactifs',
            'etudiantsParMois',
            'tranchesAge',
            'trimestres',
            'tauxCroissance',
            'moisActuel',
            'moisPrecedent'
        ));
    }
}
