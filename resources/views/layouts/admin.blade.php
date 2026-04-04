<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Fluid Ops')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
    @stack('styles')
</head>
<body class="bg-[#f8f9fc] text-gray-800 flex h-screen overflow-hidden relative">

    <!-- Mobile Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-gray-900/50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-white border-r border-gray-100 flex flex-col justify-between h-full shrink-0 fixed lg:static z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
        <div>
            <div class="h-20 flex items-center px-8 border-b border-gray-50">
                <h1 class="text-xl font-bold text-blue-600 tracking-tight"><i class='bx bx-water mr-2'></i>Fluid Ops</h1>
            </div>
            <nav class="p-4 space-y-1 text-sm font-medium">
                <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->is('admin/dashboard') ? 'text-blue-700 bg-blue-50' : 'text-gray-500 hover:text-blue-600 hover:bg-blue-50' }}">
                    <i class='bx bx-grid-alt text-lg'></i> Dashboard
                </a>
                <a href="/admin/orders" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->is('admin/orders') ? 'text-blue-700 bg-blue-50' : 'text-gray-500 hover:text-blue-600 hover:bg-blue-50' }}">
                    <i class='bx bx-receipt text-lg'></i> Orders
                </a>
                <a href="/admin/customers" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->is('admin/customers') ? 'text-blue-700 bg-blue-50' : 'text-gray-500 hover:text-blue-600 hover:bg-blue-50' }}">
                    <i class='bx bx-user-pin text-lg'></i> Customers
                </a>
                <a href="/admin/employees" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->is('admin/employees') ? 'text-blue-700 bg-blue-50' : 'text-gray-500 hover:text-blue-600 hover:bg-blue-50' }}">
                    <i class='bx bx-group text-lg'></i> Employees
                </a>
                <a href="/admin/services" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->is('admin/services') ? 'text-blue-700 bg-blue-50' : 'text-gray-500 hover:text-blue-600 hover:bg-blue-50' }}">
                    <i class='bx bx-layer text-lg'></i> Services
                </a>
            </nav>
        </div>
        <div class="p-4 space-y-1 text-sm font-medium border-t border-gray-50">
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:text-gray-800 transition"><i class='bx bx-help-circle text-lg'></i> Help Center</a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-xl transition"><i class='bx bx-log-out text-lg'></i> Logout</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-4 lg:px-8 shrink-0">
            <div class="flex items-center gap-4 flex-1">
                <!-- Mobile Menu Button -->
                <button onclick="toggleSidebar()" class="lg:hidden text-gray-500 hover:text-blue-600 focus:outline-none bg-gray-50 w-10 h-10 rounded-xl flex items-center justify-center">
                    <i class='bx bx-menu text-2xl'></i>
                </button>
                
                <div class="relative w-full max-w-md hidden sm:block">
                    <i class='bx bx-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg'></i>
                    <input type="text" placeholder="Search operations..." class="w-full bg-[#f8f9fc] border-none rounded-full py-2.5 pl-12 pr-4 focus:outline-none focus:ring-2 focus:ring-blue-100 text-sm">
                </div>
            </div>
            <div class="flex items-center gap-6">
                <button class="text-gray-400 hover:text-gray-600 relative">
                    <i class='bx bx-bell text-xl'></i>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <button class="text-gray-400 hover:text-gray-600"><i class='bx bx-cog text-xl'></i></button>
                <div class="flex items-center gap-3 border-l pl-6 border-gray-100">
                    <div class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center text-white font-bold text-sm">AU</div>
                    <div class="text-sm hidden md:block">
                        <p class="font-semibold text-gray-700">Admin User</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="flex-1 overflow-auto p-8">
            @yield('content')
        </div>

    </main>

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
