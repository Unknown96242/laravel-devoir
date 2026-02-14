<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script>
        (function() {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>@yield('title', 'Gestion des Étudiants de ISI')</title>

    @yield('styles')
    @stack('styles')
</head>
<body>

    <x-sidebar />
    <section id="content">
        <!-- Header avec bouton toggle -->
        <nav>
			{{-- <i class='bx bx-menu' ></i> --}}
			<form action="#">
				<div class="form-input m-4">
					<input type="search" placeholder="Rechercher...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="{{ asset('image/people.png') }}">
			</a>
		</nav>
        <main>
            {{-- contenu --}}
            @yield('content')
        </main>


    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')
    @stack('scripts')
</body>
</html>
