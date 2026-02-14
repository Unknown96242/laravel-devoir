<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Charger le theme de force pour eviter le flash --}}
    <script>
        (function() {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Work+Sans:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>@yield('title') | UniManage </title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">



    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        'display': ['Playfair Display', 'serif'],
                        'sans': ['Work Sans', 'sans-serif'],
                    },
                    colors: {
                        'academic': {
                            50: '#f0f4f8',
                            100: '#d9e6f2',
                            200: '#b3cde0',
                            300: '#6facd5',
                            400: '#3b8bc4',
                            500: '#1e5f8c',
                            600: '#164870',
                            700: '#0f3554',
                            800: '#0a2438',
                            900: '#05131c',
                        },
                        'accent': {
                            50: '#fef3e7',
                            100: '#fde0c2',
                            200: '#fbca9a',
                            300: '#f9b472',
                            400: '#f79e4a',
                            500: '#f58822',
                            600: '#c46d1b',
                            700: '#935214',
                            800: '#62370d',
                            900: '#311c07',
                        }
                    }
                }
            }
        }
    </script>
    <style>
       /* Charger  */
        canvas {
            max-width: 100% !important;
            height: auto !important;
        }
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }
    </style>
    @yield('style')
</head>
<body class="antialiased bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 text-slate-900 dark:text-slate-100 transition-colors duration-500">

    <x-toast />
    <x-modal-confirm />
    {{-- Sidebar  --}}
    <div>
        @include('partials.sidebar')
    </div>
    <div>

        {{-- Contenu --}}
        @yield('content')
    </div>

    {{-- script --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    @yield('script')
    @stack('script')
    <script src="{{ asset('js/animation.js') }}"></script>
    <script src="{{ asset('js/charts.js') }}"></script>
</body>
</html>
