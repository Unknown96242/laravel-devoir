// Charger le chart lorsque le DOM est prêt
(function() {
    'use strict';

    function initializeCharts() {
        // Verifier si Chart.js est chargé
        if (typeof Chart === 'undefined') {
            console.error('Chart.js not loaded');
            return;
        }

        // Verifier si le mode sombre est actif
        const isDarkMode = document.documentElement.classList.contains('dark');
        const textColor = isDarkMode ? '#cbd5e1' : '#64748b';
        const gridColor = isDarkMode ? 'rgba(148, 163, 184, 0.1)' : 'rgba(148, 163, 184, 0.2)';

        // Options communes pour tous les graphiques
        const commonOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        font: {
                            family: 'Work Sans',
                            size: 12
                        },
                        color: textColor,
                        usePointStyle: true,
                        padding: 15
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(15, 23, 42, 0.95)',
                    titleFont: {
                        family: 'Work Sans',
                        size: 14,
                        weight: '600'
                    },
                    bodyFont: {
                        family: 'Work Sans',
                        size: 13
                    },
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: true,
                    boxPadding: 6
                }
            }
        };

        // Enrollment Chart (Dashboard)
        const enrollmentCanvas = document.getElementById('enrollmentChart');
        if (enrollmentCanvas) {
            const enrollmentCtx = enrollmentCanvas.getContext('2d');
            new Chart(enrollmentCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
                    datasets: [
                        {
                            label: 'Inscriptions 2024',
                            data: [320, 340, 365, 385, 410, 445, 480, 520, 560, 595, 630, 670],
                            borderColor: '#1e5f8c',
                            backgroundColor: 'rgba(30, 95, 140, 0.1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            pointBackgroundColor: '#1e5f8c',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2
                        },
                        {
                            label: 'Inscriptions 2023',
                            data: [280, 295, 310, 325, 350, 375, 400, 430, 455, 480, 510, 540],
                            borderColor: '#6facd5',
                            backgroundColor: 'rgba(111, 172, 213, 0.1)',
                            borderWidth: 2,
                            borderDash: [5, 5],
                            fill: false,
                            tension: 0.4,
                            pointRadius: 3,
                            pointHoverRadius: 5,
                            pointBackgroundColor: '#6facd5'
                        }
                    ]
                },
                options: {
                    ...commonOptions,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: gridColor,
                                drawBorder: false
                            },
                            ticks: {
                                color: textColor,
                                font: {
                                    family: 'Work Sans',
                                    size: 11
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                color: textColor,
                                font: {
                                    family: 'Work Sans',
                                    size: 11
                                }
                            }
                        }
                    }
                }
            });
        }

        // Performance Chart (Statistics - statistiques.html)
        const performanceCanvas = document.getElementById('performanceChart');
        if (performanceCanvas) {
            const performanceCtx = performanceCanvas.getContext('2d');
            new Chart(performanceCtx, {
                type: 'bar',
                data: {
                    labels: ['Informatique', 'Mathématiques', 'Physique', 'Chimie', 'Biologie', 'Littérature'],
                    datasets: [
                        {
                            label: 'Taux de réussite (%)',
                            data: [95.2, 93.8, 91.4, 88.6, 90.1, 87.3],
                            backgroundColor: [
                                'rgba(59, 130, 246, 0.8)',
                                'rgba(139, 92, 246, 0.8)',
                                'rgba(16, 185, 129, 0.8)',
                                'rgba(245, 158, 11, 0.8)',
                                'rgba(239, 68, 68, 0.8)',
                                'rgba(245, 136, 34, 0.8)'
                            ],
                            borderColor: [
                                'rgb(59, 130, 246)',
                                'rgb(139, 92, 246)',
                                'rgb(16, 185, 129)',
                                'rgb(245, 158, 11)',
                                'rgb(239, 68, 68)',
                                'rgb(245, 136, 34)'
                            ],
                            borderWidth: 2,
                            borderRadius: 8,
                            borderSkipped: false
                        }
                    ]
                },
                options: {
                    ...commonOptions,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            grid: {
                                color: gridColor,
                                drawBorder: false
                            },
                            ticks: {
                                color: textColor,
                                font: {
                                    family: 'Work Sans',
                                    size: 11
                                },
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                color: textColor,
                                font: {
                                    family: 'Work Sans',
                                    size: 11
                                }
                            }
                        }
                    }
                }
            });
        }

        // Departement distribution Chart (Statistics)
        const departementCanvas = document.getElementById('departementChart');
        if (departementCanvas) {
            const departementCtx = departementCanvas.getContext('2d');
            new Chart(departementCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Informatique', 'Mathématiques', 'Physique', 'Chimie', 'Biologie', 'Autres'],
                    datasets: [{
                        data: [65, 48, 42, 38, 32, 22],
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(139, 92, 246, 0.8)',
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(245, 158, 11, 0.8)',
                            'rgba(239, 68, 68, 0.8)',
                            'rgba(156, 163, 175, 0.8)'
                        ],
                        borderColor: isDarkMode ? '#0f172a' : '#ffffff',
                        borderWidth: 3,
                        hoverOffset: 8
                    }]
                },
                options: {
                    ...commonOptions,
                    cutout: '65%',
                    plugins: {
                        ...commonOptions.plugins,
                        legend: {
                            ...commonOptions.plugins.legend,
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        // Etudiant Growth Chart (Statistics)
        const studentGrowthCanvas = document.getElementById('studentGrowthChart');
        if (studentGrowthCanvas) {
            const studentGrowthCtx = studentGrowthCanvas.getContext('2d');
            new Chart(studentGrowthCtx, {
                type: 'line',
                data: {
                    labels: ['2019', '2020', '2021', '2022', '2023', '2024'],
                    datasets: [{
                        label: 'Nombre d\'étudiants',
                        data: [2100, 2450, 2800, 3200, 3500, 3847],
                        borderColor: '#f58822',
                        backgroundColor: 'rgba(245, 136, 34, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        pointBackgroundColor: '#f58822',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2
                    }]
                },
                options: {
                    ...commonOptions,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: gridColor,
                                drawBorder: false
                            },
                            ticks: {
                                color: textColor,
                                font: {
                                    family: 'Work Sans',
                                    size: 11
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                color: textColor,
                                font: {
                                    family: 'Work Sans',
                                    size: 11
                                }
                            }
                        }
                    }
                }
            });
        }

        // Comparaison de la présence et de la performance mensuelles (Statistics)
        const monthlyComparisonCanvas = document.getElementById('monthlyComparisonChart');
        if (monthlyComparisonCanvas) {
            const monthlyComparisonCtx = monthlyComparisonCanvas.getContext('2d');
            new Chart(monthlyComparisonCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
                    datasets: [
                        {
                            label: 'Présence (%)',
                            data: [88, 86, 89, 91, 87, 85, 90, 92, 94, 91, 89, 87],
                            backgroundColor: 'rgba(16, 185, 129, 0.7)',
                            borderColor: 'rgb(16, 185, 129)',
                            borderWidth: 2,
                            borderRadius: 6,
                            borderSkipped: false
                        },
                        {
                            label: 'Performance (%)',
                            data: [85, 87, 88, 90, 89, 91, 92, 93, 95, 94, 92, 93],
                            backgroundColor: 'rgba(59, 130, 246, 0.7)',
                            borderColor: 'rgb(59, 130, 246)',
                            borderWidth: 2,
                            borderRadius: 6,
                            borderSkipped: false
                        }
                    ]
                },
                options: {
                    ...commonOptions,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            grid: {
                                color: gridColor,
                                drawBorder: false
                            },
                            ticks: {
                                color: textColor,
                                font: {
                                    family: 'Work Sans',
                                    size: 11
                                },
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                color: textColor,
                                font: {
                                    family: 'Work Sans',
                                    size: 11
                                }
                            }
                        }
                    }
                }
            });
        }

        console.log('📊Initialisation de la chart reussie!');
    }

    // Attendre que le DOM soit prêt avant d'initialiser les graphiques
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(initializeCharts, 100);
        });
    } else {
        setTimeout(initializeCharts, 100);
    }
})();
