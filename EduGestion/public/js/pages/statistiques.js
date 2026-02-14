/**
 * Statistiques - Gestion des graphiques et analyses
 */

// Fonction pour obtenir les couleurs selon le thème
function getThemeColors() {
    const isDark = document.documentElement.classList.contains('dark');
    return {
        primary: '#3C91E6',
        success: '#10b981',
        danger: '#DB504A',
        warning: '#FFCE26',
        text: isDark ? '#FBFBFB' : '#342E37',
        grid: isDark ? '#060714' : '#eee'
    };
}

// Initialisation des graphiques
function initStatistiques(data) {
    // Configuration globale des graphiques
    Chart.defaults.font.family = "'Poppins', sans-serif";
    Chart.defaults.color = getThemeColors().text;

    // 1. Graphique d'évolution mensuelle
    const evolutionChart = createEvolutionChart(data.etudiantsParMois);

    // 2. Graphique de statut
    const statutChart = createStatutChart(data.etudiantsActifs, data.etudiantsInactifs, data.totalEtudiants);

    // 3. Graphique des tranches d'âge
    const ageChart = createAgeChart(data.tranchesAge);

    // 4. Graphique des trimestres
    const trimestreChart = createTrimestreChart(data.trimestres);

    // Observer le changement de thème
    observeThemeChange([evolutionChart, statutChart, ageChart, trimestreChart]);
}

// Graphique d'évolution mensuelle
function createEvolutionChart(evolutionData) {
    const ctx = document.getElementById('evolutionChart');
    if (!ctx) return null;

    return new Chart(ctx.getContext('2d'), {
        type: 'line',
        data: {
            labels: evolutionData.map(d => d.mois),
            datasets: [{
                label: 'Inscriptions',
                data: evolutionData.map(d => d.count),
                borderColor: getThemeColors().primary,
                backgroundColor: getThemeColors().primary + '20',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointHoverRadius: 7,
                pointBackgroundColor: '#fff',
                pointBorderColor: getThemeColors().primary,
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    borderRadius: 8,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 13
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: getThemeColors().grid
                    },
                    ticks: {
                        precision: 0
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

// Graphique de statut (Doughnut)
function createStatutChart(actifs, inactifs, total) {
    const ctx = document.getElementById('statutChart');
    if (!ctx) return null;

    return new Chart(ctx.getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Actifs', 'Inactifs'],
            datasets: [{
                data: [actifs, inactifs],
                backgroundColor: [
                    getThemeColors().success,
                    getThemeColors().danger
                ],
                borderWidth: 0,
                cutout: '70%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    borderRadius: 8,
                    callbacks: {
                        label: function(context) {
                            const percentage = ((context.parsed / total) * 100).toFixed(1);
                            return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                        }
                    }
                }
            }
        }
    });
}

// Graphique des tranches d'âge
function createAgeChart(ageData) {
    const ctx = document.getElementById('ageChart');
    if (!ctx) return null;

    return new Chart(ctx.getContext('2d'), {
        type: 'bar',
        data: {
            labels: Object.keys(ageData),
            datasets: [{
                label: 'Étudiants',
                data: Object.values(ageData),
                backgroundColor: [
                    getThemeColors().primary + '80',
                    getThemeColors().success + '80',
                    getThemeColors().warning + '80',
                    getThemeColors().danger + '80'
                ],
                borderColor: [
                    getThemeColors().primary,
                    getThemeColors().success,
                    getThemeColors().warning,
                    getThemeColors().danger
                ],
                borderWidth: 2,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: getThemeColors().grid
                    },
                    ticks: {
                        precision: 0
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

// Graphique des trimestres
function createTrimestreChart(trimestreData) {
    const ctx = document.getElementById('trimestreChart');
    if (!ctx) return null;

    return new Chart(ctx.getContext('2d'), {
        type: 'bar',
        data: {
            labels: trimestreData.map(d => d.nom),
            datasets: [{
                label: 'Inscriptions',
                data: trimestreData.map(d => d.count),
                backgroundColor: getThemeColors().primary + '60',
                borderColor: getThemeColors().primary,
                borderWidth: 2,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: getThemeColors().grid
                    },
                    ticks: {
                        precision: 0
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

// Observer le changement de thème
function observeThemeChange(charts) {
    const observer = new MutationObserver(() => {
        const colors = getThemeColors();
        Chart.defaults.color = colors.text;

        charts.forEach(chart => {
            if (chart && chart.options.scales?.y?.grid) {
                chart.options.scales.y.grid.color = colors.grid;
                chart.update();
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['class']
    });
}

// Fonction d'export
function exportData() {
    if (typeof toast !== 'function') {
        alert('Export en cours...');
        return;
    }

    toast({
        type: 'info',
        title: 'Export en cours',
        description: 'Les données sont en cours d\'exportation...',
        duration: 2000
    });

    // Simuler un délai d'export
    setTimeout(() => {
        toast({
            type: 'success',
            title: 'Export réussi',
            description: 'Les données ont été exportées avec succès !',
            duration: 3000
        });


    }, 2000);
}

// Export pour utilisation globale
window.initStatistiques = initStatistiques;
window.exportData = exportData;
