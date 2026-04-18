<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LaundrySwift</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen bg-gray-100 flex flex-col" style="font-family:'Inter',sans-serif">

    <nav x-data="{ open: false }" class="w-full py-6 bg-[#fcfdfd] z-50 sticky top-0">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center ">
            <!-- Logo -->
            <a href="#" class="flex items-center gap-2 font-extrabold text-xl text-slate-900 z-50">
                <div class="bg-[#2580ff] text-white rounded-lg p-1.5 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                        <line x1="4" y1="22" x2="4" y2="15"></line>
                    </svg>
                </div>
                LaundrySwift
            </a>
            
            <!-- Desktop Links -->
            <div class="hidden md:flex gap-8 items-center text-[0.95rem] font-bold text-[#64748b]">
                <a href="/#" class="hover:text-[#0f172a] transition-colors">Home</a>
                <a href="/#how-it-works" class="hover:text-[#0f172a] transition-colors">Process</a>
                <a href="/#services" class="hover:text-[#0f172a] transition-colors">Services</a>
                <a href="/#testi" class="hover:text-[#0f172a] transition-colors">Testimoni</a>
            </div>
            
            <!-- Auth Buttons (Desktop) -->
            <div class="hidden md:flex gap-6 items-center z-50">
                <a href="/login" class="font-bold text-[0.95rem] text-[#64748b] hover:text-[#0f172a] transition-colors">Login</a>
                <a href="/register" class="inline-flex items-center justify-center px-6 py-2.5 rounded-full text-[0.95rem] font-bold text-white bg-[#2580ff] hover:bg-blue-600 shadow-sm transition-colors">
                    Register
                </a>
            </div>

            <!-- Hamburger Button (Mobile) -->
            <button @click="open = !open" class="md:hidden flex items-center justify-center p-2 text-slate-600 hover:text-slate-900 focus:outline-none z-50 relative">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg x-show="open" class="w-6 h-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-5"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-5"
             class="absolute top-0 left-0 w-full h-screen bg-white z-40 flex flex-col pt-24 px-6 md:hidden pb-10" 
             style="display: none;">
            
            <div class="flex flex-col gap-6 text-[1.25rem] font-bold text-[#0f172a] mb-auto">
                <a href="/#" @click="open = false" class="py-2 border-b border-gray-100">Home</a>
                <a href="/#how-it-works" @click="open = false" class="py-2 border-b border-gray-100">Process</a>
                <a href="/#services" @click="open = false" class="py-2 border-b border-gray-100">Services</a>
                <a href="/#testi" @click="open = false" class="py-2 border-b border-gray-100">Testimoni</a>
            </div>

            <div class="flex flex-col gap-4 mt-8">
                <a href="/login" class="w-full text-center py-3.5 rounded-xl font-bold text-[#0f172a] bg-gray-50 border border-gray-200">Login</a>
                <a href="/register" class="w-full text-center py-3.5 rounded-xl font-bold text-white bg-[#2580ff] shadow-sm">Register</a>
            </div>
        </div>
    </nav>

    <div class="flex-1 flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-sm bg-white rounded-2xl shadow-md px-8 py-10">

            <!-- Header -->
            <div class="text-center mb-7">
                <h1 class="text-2xl font-bold text-gray-900">Create Account</h1>
                <p class="text-sm text-gray-500 mt-1">Join LaundrySwift for effortless laundry management.</p>
            </div>

            @if (session('success'))
                <div id="toast-success"
                    class="fixed top-5 right-5 z-50 bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg">
                    {{ session('success') }}
                </div>

                <script>
                    setTimeout(() => {
                        const toast = document.getElementById('toast-success');
                        if (toast) toast.remove();
                    }, 4000);
                </script>
            @endif

            @if ($errors->any())
                <div id="toast-error"
                    class="fixed top-5 right-5 z-50 bg-red-500 text-white px-4 py-3 rounded-lg shadow-lg">
                    {{ $errors->first() }}
                </div>

                <script>
                    setTimeout(() => {
                        const toast = document.getElementById('toast-error');
                        if (toast) toast.remove();
                    }, 4000);
                </script>
            @endif

            <!-- Form -->
            <form action="register/store" method="POST" class="space-y-4">
                @csrf
                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Full Name</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                        </span>
                        <input
                            type="text" id="name" name="name"
                            placeholder="John Doe"
                            required autocomplete="name"
                            class="w-full border border-gray-200 bg-gray-50 text-gray-800 text-sm placeholder-gray-400 rounded-lg pl-10 pr-4 py-2.5 outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:bg-white"
                        >
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline stroke-linecap="round" stroke-linejoin="round" points="22,6 12,13 2,6"/>
                            </svg>
                        </span>
                        <input
                            type="email" id="email" name="email"
                            placeholder="john@example.com"
                            required autocomplete="email"
                            class="w-full border border-gray-200 bg-gray-50 text-gray-800 text-sm placeholder-gray-400 rounded-lg pl-10 pr-4 py-2.5 outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:bg-white"
                        >
                    </div>
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1.5">Phone Number</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.18 6.18l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </span>
                        <input
                            type="tel" id="phone" name="phone"
                            placeholder="+1 (555) 000-0000"
                            autocomplete="tel"
                            class="w-full border border-gray-200 bg-gray-50 text-gray-800 text-sm placeholder-gray-400 rounded-lg pl-10 pr-4 py-2.5 outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:bg-white"
                        >
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path stroke-linecap="round" d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                        </span>
                        <input
                            type="password" id="password" name="password"
                            placeholder="••••••••"
                            required autocomplete="new-password"
                            class="w-full border border-gray-200 bg-gray-50 text-gray-800 text-sm placeholder-gray-400 rounded-lg pl-10 pr-11 py-2.5 outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:bg-white"
                        >
                        <button
                            type="button"
                            onclick="togglePwd(this)"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600 transition"
                            aria-label="Toggle password"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Terms & Privacy -->
                <div class="flex items-start gap-2.5">
                    <input
                        type="checkbox" id="terms" name="terms" required
                        class="w-4 h-4 mt-0.5 rounded border-gray-300 text-blue-500 focus:ring-blue-400 focus:ring-offset-0 cursor-pointer flex-shrink-0"
                    >
                    <label for="terms" class="text-xs text-gray-500 cursor-pointer leading-relaxed">
                        By creating an account, you agree to LaundrySwift's
                        <a href="#" class="text-blue-500 hover:underline font-medium">Terms of Service</a>
                        and
                        <a href="#" class="text-blue-500 hover:underline font-medium">Privacy Policy</a>.
                    </label>
                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full py-3 bg-blue-500 hover:bg-blue-600 active:bg-blue-700 text-white text-sm font-semibold rounded-xl transition-all duration-200 shadow-sm shadow-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1 mt-2"
                >
                    Create Account
                </button>

            </form>

            <!-- Login link -->
            <p class="text-center text-sm text-gray-500 mt-6">
                Already have an account?
                <a href="/login" class="text-blue-500 hover:text-blue-600 font-semibold hover:underline transition ml-1">Login</a>
            </p>

        </div>
    </div>

    <!-- Footer -->
    <footer class="py-4 px-6">
        <div class="flex flex-wrap items-center justify-center gap-x-5 gap-y-1 text-xs text-gray-400">
            <a href="#" class="hover:text-gray-600 transition">Privacy Policy</a>
            <a href="#" class="hover:text-gray-600 transition">Terms of Service</a>
            <a href="#" class="hover:text-gray-600 transition">Support Center</a>
            <span>© 2024 LaundrySwift, Inc.</span>
        </div>
    </footer>

    

</body>
</html>