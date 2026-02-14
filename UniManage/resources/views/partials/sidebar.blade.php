<aside id="sidebar" class="fixed left-0 top-0 h-screen w-72 bg-white dark:bg-slate-900 shadow-2xl shadow-slate-200/50 dark:shadow-slate-950/50 z-50 transition-all duration-500 ease-out -translate-x-full md:translate-x-0">
    <div class="h-full flex flex-col">
        <!-- Logo -->
        <div class="p-8 border-b border-slate-200 dark:border-slate-700">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-academic-500 to-academic-700 rounded-xl flex items-center justify-center shadow-lg">
                    <span class="material-symbols-outlined text-white text-2xl">school</span>
                </div>
                <div>
                    <h1 class="text-2xl font-display font-bold bg-gradient-to-r from-academic-600 to-academic-800 dark:from-academic-400 dark:to-academic-300 bg-clip-text text-transparent">UniManage</h1>
                    <p class="text-xs text-slate-500 dark:text-slate-400 font-sans">Gestion Académique</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-2">
            <a href="{{ route('dashboard') }}" class="nav-item group flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">dashboard</span>
                <span class="font-sans font-medium">Tableau de Bord</span>
            </a>
            <a href="{{ route('enseignants.index') }}" class="nav-item group flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('enseignants.index') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">group</span>
                <span class="font-sans font-medium">Enseignants</span>
            </a>
            <a href="#" class="nav-item group flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300">
                <span class="material-symbols-outlined text-xl">menu_book</span>
                <span class="font-sans font-medium">Cours</span>
            </a>
            <a href="{{ route('statistiques') }}" class="nav-item group flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('statistiques') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">analytics</span>
                <span class="font-sans font-medium">Statistiques</span>
            </a>

            <div class="pt-4 border-t border-slate-200 dark:border-slate-700 mt-4">
                <a href="#" class="nav-item group flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300">
                    <span class="material-symbols-outlined text-xl">calendar_month</span>
                    <span class="font-sans font-medium">Emploi du temps</span>
                </a>
                <a href="#" class="nav-item group flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300">
                    <span class="material-symbols-outlined text-xl">folder</span>
                    <span class="font-sans font-medium">Documents</span>
                </a>
                <a href="#" class="nav-item group flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300">
                    <span class="material-symbols-outlined text-xl">settings</span>
                    <span class="font-sans font-medium">Paramètres</span>
                </a>
            </div>
        </nav>

        <!-- User Profile -->
        <div class="p-4 border-t border-slate-200 dark:border-slate-700">
            <div class="flex items-center space-x-3 p-3 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-all duration-300 cursor-pointer">
                <div class="w-10 h-10 bg-gradient-to-br from-accent-400 to-accent-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg">
                    AM
                </div>
                <div class="flex-1">
                    <p class="font-sans font-semibold text-sm">Admin User</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">admin@unimanage.sn</p>
                </div>
                <span class="material-symbols-outlined text-slate-400 text-xl">logout</span>
            </div>
        </div>
    </div>
</aside>
