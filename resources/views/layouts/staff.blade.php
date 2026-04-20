<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Staff Teknisi - Fluid Ops')</title>
    <!-- Tailwind CSS (CDN for simplicity) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        /* Custom scrollbar for webkit */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9; 
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1; 
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8; 
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden">

    <div class="flex h-screen overflow-hidden relative">

        <!-- Sidebar (Desktop & Mobile) -->
        <aside id="sidebar" class="bg-blue-900 border-r border-blue-800 w-64 flex-shrink-0 flex flex-col hidden lg:flex transition-transform duration-300 z-50 h-full">
            <div class="h-16 flex items-center px-6 border-b border-blue-800/50 flex-shrink-0">
                <i class='bx bxs-washer text-blue-400 text-2xl mr-2'></i>
                <h1 class="text-white font-bold text-lg tracking-wide">Fluid Ops <span class="text-blue-400 text-xs uppercase tracking-widest block font-medium">Teknisi</span></h1>
                <!-- Mobile Close Button -->
                <button id="closeSidebar" class="lg:hidden ml-auto text-blue-300 hover:text-white">
                    <i class='bx bx-x text-2xl'></i>
                </button>
            </div>

            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('staff.dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('staff.dashboard') ? 'bg-blue-800 text-white shadow-sm' : 'text-blue-200 hover:bg-blue-800/50 hover:text-white transition' }}">
                    <i class='bx bxs-dashboard text-xl mr-3 {{ request()->routeIs('staff.dashboard') ? 'text-blue-400' : 'text-blue-300/70' }}'></i>
                    Dashboard
                </a>

                <div class="pt-4 pb-1">
                    <p class="px-3 text-xs font-bold uppercase tracking-wider text-blue-400/80 mb-2">Pekerjaan</p>
                    
                    <!-- Tasks -->
                    <a href="{{ route('staff.tasks') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('staff.tasks') ? 'bg-blue-800 text-white shadow-sm' : 'text-blue-200 hover:bg-blue-800/50 hover:text-white transition' }}">
                        <i class='bx bx-list-check text-xl mr-3 {{ request()->routeIs('staff.tasks') ? 'text-blue-400' : 'text-blue-300/70' }}'></i>
                        Jadwal Tugas Harian
                    </a>

                    <!-- Riwayat -->
                    <a href="{{ route('staff.history') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('staff.history') ? 'bg-blue-800 text-white shadow-sm' : 'text-blue-200 hover:bg-blue-800/50 hover:text-white transition' }}">
                        <i class='bx bx-history text-xl mr-3 {{ request()->routeIs('staff.history') ? 'text-blue-400' : 'text-blue-300/70' }}'></i>
                        Riwayat Pekerjaan
                    </a>
                </div>
            </nav>

            <div class="p-4 border-t border-blue-800/50 flex-shrink-0">
                <form action="{{ route('login.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-3 py-2 text-sm font-medium text-blue-200 rounded-lg hover:bg-red-500/10 hover:text-red-400 transition group">
                        <i class='bx bx-log-out text-xl mr-3 text-blue-400 group-hover:text-red-400 transition'></i>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-full overflow-hidden bg-slate-50">
            <!-- Topbar -->
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-6 z-10 flex-shrink-0 shadow-sm">
                <div class="flex items-center">
                    <!-- Mobile Menu Button -->
                    <button id="openSidebar" class="lg:hidden text-slate-500 hover:text-slate-700 mr-4 focus:outline-none rounded-md p-1 hover:bg-slate-100 transition">
                        <i class='bx bx-menu text-2xl'></i>
                    </button>
                    <!-- Page Title shown on mobile -->
                    <h2 class="text-lg font-bold text-slate-800 lg:hidden">Teknisi Area</h2>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Notifications -->
                    <button class="relative text-slate-400 hover:text-blue-600 transition p-1.5 rounded-full hover:bg-blue-50">
                        <i class='bx bx-bell text-xl'></i>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    
                    <!-- Profile Dropdown (Static for UI) -->
                    <div class="flex items-center gap-3 cursor-pointer pl-4 border-l border-slate-200">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold overflow-hidden border border-blue-200 shadow-sm">
                            <span class="text-sm">T</span>
                        </div>
                        <div class="hidden sm:block text-sm">
                            <p class="font-bold text-slate-700 leading-tight">Teknisi / Staff</p>
                            <p class="text-xs text-slate-500">Divisi Operasional</p>
                        </div>
                        <i class='bx bx-chevron-down text-slate-400 hidden sm:block'></i>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto w-full relative">
                <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 relative">
                    
                    @if(session('success'))
                        <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 flex items-start gap-3 shadow-sm animate-fade-in-down">
                            <i class='bx bx-check-circle text-xl text-green-600 mt-0.5'></i>
                            <div>
                                <h4 class="text-sm font-bold text-green-800">Berhasil!</h4>
                                <p class="text-sm text-green-700 mt-0.5">{{ session('success') }}</p>
                            </div>
                            <button type="button" onclick="this.parentElement.style.display='none'" class="ml-auto text-green-400 hover:text-green-600">
                                <i class='bx bx-x text-xl'></i>
                            </button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
            
        </div>

        <!-- Mobile Sidebar Overlay overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-40 hidden lg:hidden transition-opacity"></div>
    </div>

    <!-- Script for mobile sidebar toggle -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const openSidebarBtn = document.getElementById('openSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.remove('hidden');
            sidebarOverlay.classList.remove('hidden');
            // Give a tiny delay to allow display:block to apply before animating transform if using transform classes
            setTimeout(() => {
                sidebar.classList.add('absolute', 'inset-y-0', 'left-0');
            }, 10);
        }

        function closeSidebar() {
            sidebar.classList.add('hidden');
            sidebarOverlay.classList.add('hidden');
            sidebar.classList.remove('absolute', 'inset-y-0', 'left-0');
        }

        openSidebarBtn.addEventListener('click', openSidebar);
        closeSidebarBtn.addEventListener('click', closeSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);
    </script>
    
    <!-- Custom scripts push -->
    @stack('scripts')
</body>
</html>
