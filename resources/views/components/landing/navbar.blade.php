<nav x-data="{ open: false }" class="w-full py-6 bg-[#fcfdfd] z-50 relative">
    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
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
            <a href="#" class="hover:text-[#0f172a] transition-colors">Home</a>
            <a href="#services" class="hover:text-[#0f172a] transition-colors">Services</a>
            <a href="#how-it-works" class="hover:text-[#0f172a] transition-colors">Pricing</a>
            <a href="#contact" class="hover:text-[#0f172a] transition-colors">Contact</a>
        </div>
        
        <!-- Auth Buttons (Desktop) -->
        <div class="hidden md:flex gap-6 items-center z-50">
            <a href="/" class="font-bold text-[0.95rem] text-[#64748b] hover:text-[#0f172a] transition-colors">Log In</a>
            <a href="/" class="inline-flex items-center justify-center px-6 py-2.5 rounded-full text-[0.95rem] font-bold text-white bg-[#2580ff] hover:bg-blue-600 shadow-sm transition-colors">
                Sign Up
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
            <a href="#" @click="open = false" class="py-2 border-b border-gray-100">Home</a>
            <a href="#services" @click="open = false" class="py-2 border-b border-gray-100">Services</a>
            <a href="#how-it-works" @click="open = false" class="py-2 border-b border-gray-100">Pricing</a>
            <a href="#contact" @click="open = false" class="py-2 border-b border-gray-100">Contact</a>
        </div>

        <div class="flex flex-col gap-4 mt-8">
            <a href="/" class="w-full text-center py-3.5 rounded-xl font-bold text-[#0f172a] bg-gray-50 border border-gray-200">Log In</a>
            <a href="/" class="w-full text-center py-3.5 rounded-xl font-bold text-white bg-[#2580ff] shadow-sm">Sign Up</a>
        </div>
    </div>
</nav>
