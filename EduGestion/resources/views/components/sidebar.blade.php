<section id="sidebar">
    <a href="{{ route('dashboard') }}" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">EduGestion</span>
    </a>
    <ul class="side-menu top">
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('etudiants.list') ? 'active' : '' }}">
            <a href="{{ route('etudiants.list') }}">
                <i class='bx bxs-user-detail'></i>
                <span class="text">Liste Étudiants</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('etudiants.create') ? 'active' : '' }}">
            <a href="{{ route('etudiants.create') }}">
                <i class='bx bxs-user-plus'></i>
                <span class="text">Ajouter Étudiant</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('statistiques') ? 'active' : '' }}">
            <a href="{{ route('statistiques') }}">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Statistiques</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog'></i>
                <span class="text">Paramètres</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Déconnexion</span>
            </a>
        </li>
    </ul>
</section>

@once
    @push('scripts')
        <script src="{{ asset('js/components/sidebar.js') }}"></script>
        <script src="{{ asset('js/dark-mode.js') }}"></script>
    @endpush
@endonce
