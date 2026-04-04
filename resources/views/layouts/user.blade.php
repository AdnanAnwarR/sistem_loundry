<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fluid Ops - Customer Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Mobile Header -->
    <header class="md:hidden bg-white shadow-sm flex items-center justify-between p-4 sticky top-0 z-30">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                <i class='bx bx-water text-white'></i>
            </div>
            <span class="font-bold text-gray-900">Fluid Ops</span>
        </div>
        <button onclick="toggleSidebar()" class="text-gray-500 hover:text-blue-600 focus:outline-none">
            <i class='bx bx-menu text-2xl'></i>
        </button>
    </header>

    <!-- Mobile Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-gray-900/50 z-40 hidden md:hidden" onclick="toggleSidebar()"></div>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="flex w-64 bg-white border-r border-gray-100 flex-col fixed h-full z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300">
            <div class="p-6 border-b border-gray-100 flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-sm text-white text-xl">
                    <i class='bx bx-water'></i>
                </div>
                <h1 class="text-xl font-bold text-gray-900 tracking-tight">Fluid Ops</h1>
            </div>
            <div class="p-6 pb-2">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Menu Utama</p>
                <nav class="space-y-2">
                    <a href="/user/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->is('user/dashboard') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-500 hover:bg-gray-50 hover:text-blue-600 font-medium' }}">
                        <i class='bx bx-home-alt text-xl'></i> Dashboard
                    </a>
                    <a href="/user/order" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->is('user/order') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-500 hover:bg-gray-50 hover:text-blue-600 font-medium' }}">
                        <i class='bx bx-calendar-plus text-xl'></i> Booking Laundry
                    </a>
                    <a href="/user/history" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->is('user/history') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-500 hover:bg-gray-50 hover:text-blue-600 font-medium' }}">
                        <i class='bx bx-history text-xl'></i> Riwayat Pesanan
                    </a>
                </nav>
            </div>
            <div class="p-6 mt-auto border-t border-gray-100">
                <a href="/user/profile" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors mb-2 {{ request()->is('user/profile') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-500 hover:bg-gray-50 hover:text-blue-600 font-medium' }}">
                    <i class='bx bx-user text-xl'></i> Profil Saya
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 font-medium transition-colors border border-transparent">
                    <i class='bx bx-log-out text-xl'></i> Keluar
                </a>
            </div>
        </aside>

        <!-- Main Content (Dynamic via Layout) -->
        <main class="flex-1 md:ml-64 p-4 md:p-8">
            @yield('content')
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>
    @stack('scripts')
</body>
</html>
