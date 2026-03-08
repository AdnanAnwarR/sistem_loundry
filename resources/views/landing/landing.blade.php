<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaundrySwift</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Fallback to Tailwind CDN if Vite isn't running -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    @endif
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans text-[#0f172a] bg-[#fcfdfd] antialiased overflow-x-hidden selection:bg-[#2580ff] selection:text-white">

<<<<<<< HEAD
    <x-landing.navbar />
    
    <main>
        <x-landing.home />
        <x-landing.services />
        <x-landing.pricing />
        <x-landing.contact />
    </main>

</body>
</html>
=======
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
    
    <main>
        <section class="pb-24 pt-12 bg-[#fcfdfd] relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="space-y-8 z-10 antialiased">
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#e8f1ff] text-[#4f95ff] font-bold text-[0.65rem] tracking-widest uppercase">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15l-5-5 1.41-1.41L11 14.17l7.59-7.59L20 8l-9 9z"/></svg>
                        Premium Care For Your Clothes
                    </div>
                    <h1 class="text-[4rem] font-extrabold text-[#111827] leading-[1.05] tracking-tight">
                        Fast & Reliable <br>
                        <span class="text-[#2580ff]">Laundry<br>Service</span>
                    </h1>
                    <p class="text-[1.1rem] text-[#6b7280] max-w-[28rem] leading-relaxed font-medium">
                        We wash, iron, pack, and deliver your clothes with care. Experience the ultimate convenience in garment maintenance.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="#order" class="inline-flex items-center justify-center px-8 py-4 rounded-xl font-bold text-white bg-[#2580ff] hover:bg-blue-600 shadow-lg shadow-blue-500/20 transition-all">
                            Order Now
                        </a>
                        <a href="#services" class="inline-flex items-center justify-center px-8 py-4 rounded-xl font-bold text-[#374151] bg-[#e2e8f0]/40 hover:bg-gray-200 transition-all">
                            View Services
                        </a>
                    </div>
                    <!-- Stats -->
                    <div class="flex items-center gap-10 pt-10 border-t border-gray-100 mt-12 overflow-hidden">
                        <div>
                            <div class="text-[1.75rem] font-extrabold text-[#111827] leading-tight">24h</div>
                            <div class="text-[0.65rem] font-bold text-[#9ca3af] uppercase tracking-widest mt-0.5">Turnaround</div>
                        </div>
                        <div class="w-px h-10 bg-gray-200"></div>
                        <div>
                            <div class="text-[1.75rem] font-extrabold text-[#111827] leading-tight">10k+</div>
                            <div class="text-[0.65rem] font-bold text-[#9ca3af] uppercase tracking-widest mt-0.5">Happy Clients</div>
                        </div>
                        <div class="w-px h-10 bg-gray-200"></div>
                        
                    </div>
                </div>
                <!-- Right Graphic -->
                <div class="relative w-full aspect-[4/3] rounded-[2rem] bg-gray-200 overflow-visible z-10 shadow-[0_20px_50px_-12px_rgba(0,0,0,0.15)] mt-12 lg:mt-0">
                    <img src="/images/hero.png" alt="Laundry Room" class="w-full h-full object-cover rounded-[2rem]">
                    
                    <!-- Float 1: Eco-Friendly -->
                    <div class="absolute top-6 right-6 bg-[#2580ff] text-white px-5 py-3 rounded-full flex items-center gap-2.5 shadow-xl hover:-translate-y-1 transition-transform">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.3 5.4c-.6-.7-1.4-1.2-2.3-1.4C12.8 3.5 10 5.4 10 5.4S6 4 3.7 6.3c-2.3 2.3-2.3 6.1 0 8.5 2.3 2.3 6.1 2.3 8.5 0 2.3-2.3 2.3-6.1 0-8.5-.2-.1-.4-.3-.6-.5.1 1.1-.3 2.2-1.1 3-1.6 1.6-4.1 1.6-5.7 0-1.6-1.6-1.6-4.1 0-5.7.8-.8 1.9-1.2 3.1-1.1z M8 18c-1.1 0-2-.9-2-2h4c0 1.1-.9 2-2 2z" />
                        </svg>
                        <span class="font-bold text-[0.85rem]">Eco-Friendly Soap</span>
                    </div>
                    <!-- Float 2: Delivered -->
                    <div class="absolute -bottom-6 left-6 bg-white pl-4 pr-6 py-4 rounded-[1.25rem] flex items-center gap-4 shadow-xl hover:-translate-y-1 transition-transform">
                        <div class="w-10 h-10 rounded-full bg-[#10b981] flex items-center justify-center text-white">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <div>
                            <div class="text-[0.65rem] font-bold text-[#9ca3af] uppercase tracking-widest leading-none mb-1">Status</div>
                            <div class="font-extrabold text-[#111827] text-sm leading-none">Order Delivered</div>
                        </div>
                    </div>
                </div>
                
                <!-- Background faint circle gradient -->
                <div class="absolute -right-[20%] top-0 w-[80%] h-[80%] bg-blue-50/50 rounded-full blur-3xl -z-10"></div>
            </div>
        </section>

        <section id="how-it-works" class="py-24 bg-[#f8f9fc] border-t border-gray-100/50">
            <div class="max-w-7xl mx-auto px-6 text-center antialiased">
                <h2 class="text-[2.5rem] font-extrabold text-[#0f172a] mb-5 tracking-tight">How it Works</h2>
                <p class="text-[#64748b] max-w-[28rem] mx-auto mb-20 text-[1.05rem] leading-relaxed">Three simple steps to fresh, clean clothes. We handle everything from pickup to drop-off.</p>
                
                <div class="relative grid md:grid-cols-3 gap-12 max-w-5xl mx-auto text-center items-start">
                    <!-- Connecting Line -->
                    <div class="hidden md:block absolute top-[4.5rem] left-[16%] right-[16%] h-[2px] bg-[#eef5ff]"></div>
                    
                    <!-- Step 1 -->
                    <div class="relative flex flex-col items-center">
                        <div class="relative mb-8">
                            <div class="w-36 h-36 bg-[#eef5ff] rounded-[2rem] flex items-center justify-center text-[#2580ff]">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <!-- Bubble Badge -->
                            <div class="absolute -top-1.5 -right-1.5 w-8 h-8 bg-[#2580ff] text-white rounded-full flex items-center justify-center font-bold text-sm border-4 border-[#f8f9fc]">1</div>
                        </div>
                        <h3 class="text-[1.35rem] font-bold text-[#0f172a] mb-3">Place Order</h3>
                        <p class="text-[#64748b] leading-relaxed text-[0.95rem] max-w-[240px]">Select your services and schedule a convenient pickup time via our app or website.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative flex flex-col items-center">
                        <div class="relative mb-8">
                            <div class="w-36 h-36 bg-[#eef5ff] rounded-[2rem] flex items-center justify-center text-[#2580ff]">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <!-- Bubble Badge -->
                            <div class="absolute -top-1.5 -right-1.5 w-8 h-8 bg-[#2580ff] text-white rounded-full flex items-center justify-center font-bold text-sm border-4 border-[#f8f9fc]">2</div>
                        </div>
                        <h3 class="text-[1.35rem] font-bold text-[#0f172a] mb-3">Our Team Processes</h3>
                        <p class="text-[#64748b] leading-relaxed text-[0.95rem] max-w-[240px]">Our professional cleaners handle your garments with care using eco-friendly methods.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative flex flex-col items-center">
                        <div class="relative mb-8">
                            <div class="w-36 h-36 bg-[#eef5ff] rounded-[2rem] flex items-center justify-center text-[#2580ff]">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <rect x="1" y="3" width="15" height="13"></rect>
                                    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                </svg>
                            </div>
                            <!-- Bubble Badge -->
                            <div class="absolute -top-1.5 -right-1.5 w-8 h-8 bg-[#2580ff] text-white rounded-full flex items-center justify-center font-bold text-sm border-4 border-[#f8f9fc]">3</div>
                        </div>
                        <h3 class="text-[1.35rem] font-bold text-[#0f172a] mb-3">Finish</h3>
                        <p class="text-[#64748b] leading-relaxed text-[0.95rem] max-w-[240px]">Freshly laundered and folded clothes are delivered back to your doorstep within 24 hours.</p>
                    </div>
                </div>
                
                <div class="mt-20">
                    <a href="#order" class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#2580ff] hover:bg-blue-600 text-white font-bold rounded-full shadow-lg shadow-blue-500/20 transition-all">
                        Get Started Now
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <section id="services" class="py-24 bg-[#fcfdfd] antialiased">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16 px-4">
                    <h2 class="text-[2.5rem] font-extrabold text-[#0f172a] mb-5 tracking-tight">Choose Your Service</h2>
                    <p class="text-[#64748b] max-w-[28rem] mx-auto text-[1.05rem] leading-relaxed">Transparent pricing for every need. No hidden fees, just professional care for your clothes.</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto mb-20">
                    <!-- Cuci -->
                    <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] transition-all flex flex-col group">
                        <div class="bg-[#f8f9fc] w-full aspect-[4/3] rounded-[1.5rem] mb-8 flex items-center justify-center overflow-hidden relative">
                            <div class="w-16 h-16 bg-white rounded-full shadow-sm flex items-center justify-center text-[#2580ff] group-hover:scale-110 transition-transform z-10">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                    <circle cx="12" cy="15" r="3"></circle>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-[#0f172a] mb-3">Cuci</h3>
                        <p class="text-[#64748b] text-[0.95rem] leading-relaxed mb-8 flex-grow">Professional high-speed washing and sanitizing to maintain fabric quality.</p>
                        <div class="flex items-center justify-between border-t border-gray-100 pt-6 mt-auto">
                            <span class="text-[0.65rem] font-bold text-[#9ca3af] uppercase tracking-widest">Starting at</span>
                            <span class="text-[#64748b] font-medium"><strong class="text-[#2580ff] text-xl font-extrabold mr-0.5">Rp 8.000</strong>/kg</span>
                        </div>
                    </div>

                    <!-- Setrika -->
                    <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] transition-all flex flex-col group">
                        <div class="bg-[#f8f9fc] w-full aspect-[4/3] rounded-[1.5rem] mb-8 flex items-center justify-center overflow-hidden relative">
                            <div class="w-16 h-16 bg-white rounded-full shadow-sm flex items-center justify-center text-[#2580ff] group-hover:scale-110 transition-transform z-10">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path d="M12 21h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3L8 3H4v17h4"></path>
                                    <line x1="8" y1="21" x2="12" y2="21"></line>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-[#0f172a] mb-3">Setrika</h3>
                        <p class="text-[#64748b] text-[0.95rem] leading-relaxed mb-8 flex-grow">Expert ironing for crisp, wrinkle-free garments ready to wear.</p>
                        <div class="flex items-center justify-between border-t border-gray-100 pt-6 mt-auto">
                            <span class="text-[0.65rem] font-bold text-[#9ca3af] uppercase tracking-widest">Starting at</span>
                            <span class="text-[#64748b] font-medium"><strong class="text-[#2580ff] text-xl font-extrabold mr-0.5">Rp 10.000</strong>/kg</span>
                        </div>
                    </div>

                    <!-- Packing -->
                    <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] transition-all flex flex-col group">
                        <div class="bg-[#f8f9fc] w-full aspect-[4/3] rounded-[1.5rem] mb-8 flex items-center justify-center overflow-hidden relative">
                            <div class="w-16 h-16 bg-white rounded-full shadow-sm flex items-center justify-center text-[#2580ff] group-hover:scale-110 transition-transform z-10">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-[#0f172a] mb-3">Packing</h3>
                        <p class="text-[#64748b] text-[0.95rem] leading-relaxed mb-8 flex-grow">Secure, eco-friendly packaging for safe travel and storage of your clean clothes.</p>
                        <div class="flex items-center justify-between border-t border-gray-100 pt-6 mt-auto">
                            <span class="text-[0.65rem] font-bold text-[#9ca3af] uppercase tracking-widest">Starting at</span>
                            <span class="text-[#64748b] font-medium"><strong class="text-[#2580ff] text-xl font-extrabold mr-0.5">Rp 5.000</strong>/kg</span>
                        </div>
                    </div>
                </div>

                
            </div>
        </section>

        <section class="py-24 bg-[#f8f9fc] antialiased">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16 px-4">
                    <div class="text-[0.7rem] font-bold text-[#2580ff] uppercase tracking-widest mb-4">Success Stories</div>
                    <h2 class="text-[2.5rem] font-extrabold text-[#0f172a] mb-5 tracking-tight">What Our Customers Say</h2>
                    <p class="text-[#64748b] max-w-[32rem] mx-auto text-[1.05rem] leading-relaxed">Join thousands of happy users who have reclaimed their time with LaundrySwift's premium door-to-door service.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto mb-28">
                    <!-- Review 1 -->
                    <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:shadow-lg transition-all flex flex-col">
                        <div class="flex text-[#2580ff] mb-6">
                            @for($i=0; $i<5; $i++)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-[#475569] italic leading-relaxed text-[1.05rem] mb-8 flex-grow">"LaundrySwift has completely transformed how I manage my weekly chores. The pickup is always on time and the quality is exceptional."</p>
                        <div class="flex items-center gap-4 pt-4 mt-auto border-t border-gray-50">
                            <img src="/images/sarah.png" alt="Sarah Jenkins" class="w-12 h-12 rounded-full object-cover">
                            <div>
                                <div class="font-extrabold text-[#0f172a] text-sm">Sarah Jenkins</div>
                                <div class="text-[0.75rem] text-[#64748b]">Marketing Manager</div>
                            </div>
                        </div>
                    </div>

                    <!-- Review 2 -->
                    <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:shadow-lg transition-all flex flex-col">
                        <div class="flex text-[#2580ff] mb-6">
                            @for($i=0; $i<5; $i++)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-[#475569] italic leading-relaxed text-[1.05rem] mb-8 flex-grow">"As a business owner, I need absolute reliability. They deliver perfectly clean linens every single time. A must-have service."</p>
                        <div class="flex items-center gap-4 pt-4 mt-auto border-t border-gray-50">
                            <img src="/images/marcus.png" alt="Marcus Thorne" class="w-12 h-12 rounded-full object-cover">
                            <div>
                                <div class="font-extrabold text-[#0f172a] text-sm">Marcus Thorne</div>
                                <div class="text-[0.75rem] text-[#64748b]">Business Owner</div>
                            </div>
                        </div>
                    </div>

                    <!-- Review 3 -->
                    <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] hover:shadow-lg transition-all flex flex-col">
                        <div class="flex text-[#2580ff] mb-6">
                            @for($i=0; $i<5; $i++)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-[#475569] italic leading-relaxed text-[1.05rem] mb-8 flex-grow">"The app is so intuitive and the service is professional. Highly recommend for busy professionals who value their weekends."</p>
                        <div class="flex items-center gap-4 pt-4 mt-auto border-t border-gray-50">
                            <img src="/images/elena.png" alt="Elena Rodriguez" class="w-12 h-12 rounded-full object-cover">
                            <div>
                                <div class="font-extrabold text-[#0f172a] text-sm">Elena Rodriguez</div>
                                <div class="text-[0.75rem] text-[#64748b]">Consultant</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partners -->
                <div class="max-w-4xl mx-auto text-center">
                    <div class="flex flex-wrap justify-center gap-x-16 gap-y-8 text-[1.35rem] font-extrabold text-[#cbd5e1] tracking-widest mb-20 uppercase">
                        <span>Partner A</span>
                        <span>Corp B</span>
                        <span>Trust C</span>
                        <span>Global D</span>
                    </div>
                    
                    <div class="flex flex-col items-center justify-center">
                        <div class="text-[0.8rem] font-medium text-[#94a3b8] mb-4">Loved by people from top companies</div>
                        <div class="flex -space-x-3 items-center">
                            <div class="w-10 h-10 rounded-full bg-[#40916c] border-2 border-[#fcfdfd]"></div>
                            <div class="w-10 h-10 rounded-full bg-[#f4e285] border-2 border-[#fcfdfd]"></div>
                            <div class="w-10 h-10 rounded-full bg-[#32988e] border-2 border-[#fcfdfd]"></div>
                            <div class="w-10 h-10 rounded-full bg-[#206950] border-2 border-[#fcfdfd]"></div>
                            <div class="w-10 h-10 rounded-full bg-[#2580ff] border-2 border-[#fcfdfd] flex items-center justify-center text-[0.65rem] font-bold text-white z-10 shadow-sm">
                                +2k
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-12 bg-[#f8f9fc] border-t border-gray-100 antialiased">
        <div class="max-w-7xl mx-auto px-6 flex flex-col items-center text-center">
            <a href="#" class="flex items-center gap-2 font-extrabold text-xl text-slate-900 mb-8">
                <div class="bg-[#2580ff] text-white rounded-lg p-1.5 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                        <line x1="4" y1="22" x2="4" y2="15"></line>
                    </svg>
                </div>
                LaundrySwift
            </a>
            
            <div class="flex flex-wrap justify-center gap-x-10 gap-y-4 text-[0.85rem] font-medium text-[#64748b] mb-8">
                <a href="#" class="hover:text-[#0f172a] transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-[#0f172a] transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-[#0f172a] transition-colors">Help Center</a>
            </div>
            
            <div class="text-[0.8rem] text-[#94a3b8]">
                &copy; 2024 LaundrySwift. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>
>>>>>>> page/landing_page
