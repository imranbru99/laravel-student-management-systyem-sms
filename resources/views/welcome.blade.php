<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'EduManage') }} - Premium Student Management</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', system-ui, sans-serif;
            background-color: #09090b; /* zinc-950 */
            color: #fafafa;
        }

        /* Premium subtle grid background */
        .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(255,255,255,0.03) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Smooth card hover lift */
        .premium-card {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .premium-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -15px rgba(139, 92, 246, 0.15);
            border-color: rgba(139, 92, 246, 0.3);
        }

        /* Ambient background glow */
        .ambient-glow {
            position: absolute;
            top: -10%;
            left: 50%;
            transform: translateX(-50%);
            width: 80vw;
            height: 60vh;
            background: radial-gradient(ellipse at top, rgba(124, 58, 237, 0.20), transparent 60%);
            z-index: -1;
            pointer-events: none;
        }

        .ambient-glow-emerald {
            position: absolute;
            top: 30%;
            right: -20%;
            width: 60vw;
            height: 60vh;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.1), transparent 50%);
            z-index: -1;
            pointer-events: none;
        }
    </style>
</head>
<body class="relative overflow-x-hidden antialiased selection:bg-violet-500/30">

    <div class="ambient-glow"></div>
    <div class="ambient-glow-emerald"></div>
    <div class="fixed inset-0 bg-grid-pattern [mask-image:linear-gradient(to_bottom,white,transparent_80%)] -z-10 pointer-events-none"></div>

    <nav class="fixed w-full z-50 border-b border-white/5 bg-zinc-950/60 backdrop-blur-xl transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3 group cursor-pointer">
                <div class="w-10 h-10 bg-gradient-to-tr from-violet-600 to-fuchsia-500 rounded-xl flex items-center justify-center text-xl shadow-lg shadow-violet-500/20 ring-1 ring-white/10 group-hover:scale-105 transition-transform duration-300">
                    <i class="fas fa-graduation-cap text-white"></i>
                </div>
                <div>
                    <span class="text-xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white to-zinc-400">EduManage</span>
                </div>
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="px-6 py-2.5 bg-white text-zinc-950 text-sm font-semibold rounded-full hover:bg-zinc-200 transition-all duration-300 flex items-center gap-2 shadow-[0_0_20px_rgba(255,255,255,0.15)] hover:shadow-[0_0_25px_rgba(255,255,255,0.25)]">
                        <i class="fas fa-chart-pie"></i> Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-5 py-2.5 text-zinc-300 hover:text-white text-sm font-medium transition-colors">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}"
                       class="px-6 py-2.5 bg-white text-zinc-950 text-sm font-semibold rounded-full hover:bg-zinc-200 hover:scale-105 transition-all duration-300 shadow-[0_0_20px_rgba(255,255,255,0.1)]">
                        Get Started
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <section class="relative min-h-screen flex items-center pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center w-full">

            <div class="space-y-8 relative z-10">
                <div class="inline-flex items-center gap-2.5 bg-white/5 border border-white/10 px-4 py-2 rounded-full backdrop-blur-md">
                    <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-xs font-medium text-zinc-300 tracking-wide uppercase">EduManage Premium 2.0</span>
                </div>

                <h1 class="text-5xl lg:text-7xl font-bold leading-[1.1] tracking-tighter text-transparent bg-clip-text bg-gradient-to-b from-white to-zinc-400">
                    The modern operating system for <span class="bg-clip-text text-transparent bg-gradient-to-r from-violet-400 to-fuchsia-400">education.</span>
                </h1>

                <p class="text-lg lg:text-xl text-zinc-400 max-w-lg leading-relaxed font-light">
                    A beautifully designed, deeply integrated platform to manage students, staff roles, and institutional data with zero friction.
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="px-8 py-4 bg-white text-zinc-950 font-semibold rounded-full flex items-center gap-3 hover:scale-105 transition-all duration-300 shadow-[0_0_30px_rgba(255,255,255,0.15)] group">
                            Enter Workspace <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                           class="px-8 py-4 bg-white text-zinc-950 font-semibold rounded-full hover:bg-zinc-100 hover:scale-105 transition-all duration-300 shadow-[0_0_30px_rgba(255,255,255,0.15)] group flex items-center gap-2">
                            Start Free Trial <i class="fas fa-chevron-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="{{ route('login') }}"
                           class="px-8 py-4 bg-zinc-900 border border-white/10 text-white font-medium rounded-full hover:bg-zinc-800 transition-all duration-300">
                            Book Demo
                        </a>
                    @endauth
                </div>

                <div class="flex items-center gap-8 text-sm pt-6 border-t border-white/5">
                    <div class="flex items-center gap-2 text-zinc-400">
                        <i class="fas fa-shield-check text-emerald-400"></i> Roles & Permissions
                    </div>
                    <div class="flex items-center gap-2 text-zinc-400">
                        <i class="fas fa-bolt text-amber-400"></i> Laravel Powered
                    </div>
                </div>
            </div>

            <div class="relative lg:h-[600px] flex items-center justify-center w-full z-10 perspective-1000">
                <div class="relative w-full max-w-lg rounded-2xl bg-zinc-900/40 border border-white/10 backdrop-blur-2xl shadow-2xl shadow-violet-500/20 overflow-hidden transform -rotate-2 hover:rotate-0 transition-transform duration-700 ease-out">

                    <div class="h-10 bg-zinc-900/80 border-b border-white/5 flex items-center px-4 gap-2">
                        <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                        <div class="w-3 h-3 rounded-full bg-amber-500/80"></div>
                        <div class="w-3 h-3 rounded-full bg-emerald-500/80"></div>
                    </div>

                    <div class="p-6 bg-[#09090b]/80">
                        <div class="flex justify-between items-start mb-8">
                            <div>
                                <h3 class="text-xl font-semibold text-white">Overview</h3>
                                <p class="text-emerald-400 text-xs mt-1 font-medium bg-emerald-400/10 inline-block px-2 py-0.5 rounded-full">System Healthy</p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-violet-600 to-fuchsia-600 flex items-center justify-center font-bold text-sm shadow-lg shadow-violet-500/30">
                                SA
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-white/5 border border-white/5 rounded-xl p-4">
                                <div class="text-zinc-400 text-xs mb-1">Total Students</div>
                                <div class="text-3xl font-bold text-white">248</div>
                            </div>
                            <div class="bg-violet-500/10 border border-violet-500/20 rounded-xl p-4">
                                <div class="text-violet-300 text-xs mb-1">Active Classes</div>
                                <div class="text-3xl font-bold text-violet-400">12</div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div class="text-xs text-zinc-500 font-medium uppercase tracking-wider mb-2">Recent Enrollments</div>

                            <div class="flex items-center gap-4 bg-white/5 border border-white/5 px-4 py-3 rounded-xl">
                                <div class="w-10 h-10 bg-zinc-800 rounded-full flex items-center justify-center text-lg">👨‍🎓</div>
                                <div class="flex-1">
                                    <p class="font-medium text-sm text-zinc-100">Imran Ahmed</p>
                                    <p class="text-xs text-zinc-500">Class 10 • Sec A</p>
                                </div>
                                <div class="text-xs font-medium text-emerald-400">Active</div>
                            </div>

                            <div class="flex items-center gap-4 bg-white/5 border border-white/5 px-4 py-3 rounded-xl">
                                <div class="w-10 h-10 bg-zinc-800 rounded-full flex items-center justify-center text-lg">👩‍🎓</div>
                                <div class="flex-1">
                                    <p class="font-medium text-sm text-zinc-100">Sadia Islam</p>
                                    <p class="text-xs text-zinc-500">Class 9 • Sec B</p>
                                </div>
                                <div class="text-xs font-medium text-emerald-400">Active</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 relative bg-[#09090b] border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="text-3xl lg:text-5xl font-bold tracking-tight text-white mb-6">Designed for scale.<br>Built for simplicity.</h2>
                <p class="text-lg text-zinc-400 max-w-2xl mx-auto font-light">Everything your institution needs to operate efficiently, packaged in a gorgeous, lightning-fast interface.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="premium-card bg-zinc-900/50 backdrop-blur-sm border border-white/5 rounded-3xl p-8 group">
                    <div class="w-14 h-14 bg-violet-500/10 border border-violet-500/20 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-violet-500/20 transition-colors">
                        <i class="fas fa-users text-2xl text-violet-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Student Directory</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed font-light">Comprehensive CRUD operations with image uploads, dynamic filtering, and complete profile management.</p>
                </div>

                <div class="premium-card bg-zinc-900/50 backdrop-blur-sm border border-white/5 rounded-3xl p-8 group">
                    <div class="w-14 h-14 bg-emerald-500/10 border border-emerald-500/20 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-500/20 transition-colors">
                        <i class="fas fa-shield-alt text-2xl text-emerald-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Access Control</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed font-light">Enterprise-grade role management via Spatie. Assign granular permissions to Admins and Teachers seamlessly.</p>
                </div>

                <div class="premium-card bg-zinc-900/50 backdrop-blur-sm border border-white/5 rounded-3xl p-8 group">
                    <div class="w-14 h-14 bg-fuchsia-500/10 border border-fuchsia-500/20 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-fuchsia-500/20 transition-colors">
                        <i class="fas fa-moon text-2xl text-fuchsia-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Premium Interface</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed font-light">A stunning dark mode UI built with Tailwind CSS v4, featuring glassmorphism and flawless responsiveness.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 relative bg-zinc-950 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl lg:text-6xl font-bold bg-clip-text text-transparent bg-gradient-to-br from-white to-zinc-500 mb-2">99.9%</div>
                    <div class="text-zinc-400 text-sm font-medium tracking-wide uppercase">Uptime SLA</div>
                </div>
                <div class="text-center border-l border-white/5">
                    <div class="text-4xl lg:text-6xl font-bold bg-clip-text text-transparent bg-gradient-to-br from-white to-zinc-500 mb-2">250k+</div>
                    <div class="text-zinc-400 text-sm font-medium tracking-wide uppercase">Students Managed</div>
                </div>
                <div class="text-center border-l border-white/5">
                    <div class="text-4xl lg:text-6xl font-bold bg-clip-text text-transparent bg-gradient-to-br from-white to-zinc-500 mb-2">< 50ms</div>
                    <div class="text-zinc-400 text-sm font-medium tracking-wide uppercase">Query Latency</div>
                </div>
                <div class="text-center border-l border-white/5">
                    <div class="text-4xl lg:text-6xl font-bold bg-clip-text text-transparent bg-gradient-to-br from-white to-zinc-500 mb-2">24/7</div>
                    <div class="text-zinc-400 text-sm font-medium tracking-wide uppercase">Expert Support</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 relative bg-[#09090b] border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-20">
                <h2 class="text-3xl lg:text-5xl font-bold tracking-tight text-white mb-4">Go live in minutes.</h2>
                <p class="text-lg text-zinc-400 max-w-xl font-light">We've removed the friction from school management. Our streamlined onboarding gets your institution running instantly.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-12 relative">
                <div class="hidden md:block absolute top-10 left-20 right-20 h-px bg-gradient-to-r from-violet-500/0 via-violet-500/30 to-violet-500/0 -z-10"></div>

                <div class="relative group">
                    <div class="w-20 h-20 bg-zinc-900 border border-white/10 rounded-2xl flex items-center justify-center text-2xl font-bold text-white mb-6 shadow-xl shadow-black group-hover:scale-110 group-hover:border-violet-500/50 transition-all duration-300">
                        1
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">Configure Roles</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed font-light">Set up Super Admins, Teachers, and Staff. Granular permissions ensure data security from day one.</p>
                </div>

                <div class="relative group">
                    <div class="w-20 h-20 bg-zinc-900 border border-white/10 rounded-2xl flex items-center justify-center text-2xl font-bold text-white mb-6 shadow-xl shadow-black group-hover:scale-110 group-hover:emerald-500/50 transition-all duration-300">
                        2
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">Import Students</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed font-light">Add students manually or import databases. Assign classes, sections, and upload profile photography easily.</p>
                </div>

                <div class="relative group">
                    <div class="w-20 h-20 bg-zinc-900 border border-white/10 rounded-2xl flex items-center justify-center text-2xl font-bold text-white mb-6 shadow-xl shadow-black group-hover:scale-110 group-hover:amber-500/50 transition-all duration-300">
                        3
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">Manage & Analyze</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed font-light">Access the beautiful dashboard to monitor active classes, track enrollments, and manage records in real-time.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 relative bg-zinc-950 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-5xl font-bold tracking-tight text-white mb-6">A complete ecosystem.</h2>
                <p class="text-lg text-zinc-400 font-light">More than just a database. EduManage scales with your needs.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 auto-rows-[240px]">
                <div class="premium-card md:col-span-2 md:row-span-2 bg-gradient-to-br from-zinc-900/80 to-zinc-900/30 border border-white/5 rounded-3xl p-8 flex flex-col justify-between overflow-hidden relative">
                    <div class="absolute right-0 bottom-0 opacity-20 text-9xl text-violet-500 transform translate-x-1/4 translate-y-1/4">
                        <i class="fas fa-chart-network"></i>
                    </div>
                    <div>
                        <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center text-white mb-4">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-2">Real-time Analytics</h3>
                        <p class="text-zinc-400 font-light max-w-sm">Watch your institution grow with live enrollment tracking, demographic breakdowns, and system health monitoring.</p>
                    </div>
                </div>

                <div class="premium-card md:col-span-2 bg-zinc-900/50 border border-white/5 rounded-3xl p-8 flex items-center gap-6">
                    <div class="w-16 h-16 bg-emerald-500/10 rounded-2xl flex items-center justify-center text-emerald-400 text-2xl shrink-0">
                        <i class="fas fa-file-export"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">One-Click Exports</h3>
                        <p class="text-zinc-400 text-sm font-light">Export student lists and roles to PDF or CSV instantly.</p>
                    </div>
                </div>

                <div class="premium-card bg-zinc-900/50 border border-white/5 rounded-3xl p-8">
                    <h3 class="text-lg font-semibold text-white mb-1">Dark Mode Native</h3>
                    <p class="text-zinc-400 text-sm font-light mb-4">Easy on the eyes, day or night.</p>
                    <div class="flex gap-2">
                        <div class="w-6 h-6 rounded-full bg-zinc-800 border border-white/10"></div>
                        <div class="w-6 h-6 rounded-full bg-white border border-white/10"></div>
                    </div>
                </div>

                <div class="premium-card bg-zinc-900/50 border border-white/5 rounded-3xl p-8 flex flex-col justify-between">
                    <div class="text-amber-400 text-2xl"><i class="fas fa-shield-check"></i></div>
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">Bank-grade Security</h3>
                        <p class="text-zinc-400 text-sm font-light">CSRF protection & hashed data.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 relative bg-[#09090b] border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl lg:text-5xl font-bold tracking-tight text-white mb-16 text-center">Trusted by educators.</h2>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-zinc-900/30 border border-white/5 rounded-3xl p-8 relative overflow-hidden group">
                    <i class="fas fa-quote-right absolute -right-4 -top-4 text-8xl text-white/5 group-hover:text-violet-500/10 transition-colors"></i>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-indigo-500 flex items-center justify-center text-white font-bold">DR</div>
                        <div>
                            <h4 class="text-white font-medium">Dr. Robert Chen</h4>
                            <p class="text-zinc-500 text-xs uppercase tracking-wider">Principal, Oakridge High</p>
                        </div>
                    </div>
                    <p class="text-zinc-300 font-light leading-relaxed">"Switching to EduManage was the best decision for our admin team. The role-based permissions ensure our teachers only see what they need, and the UI is incredibly fast."</p>
                </div>

                <div class="bg-zinc-900/30 border border-white/5 rounded-3xl p-8 relative overflow-hidden group">
                    <i class="fas fa-quote-right absolute -right-4 -top-4 text-8xl text-white/5 group-hover:text-emerald-500/10 transition-colors"></i>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center text-white font-bold">SJ</div>
                        <div>
                            <h4 class="text-white font-medium">Sarah Jenkins</h4>
                            <p class="text-zinc-500 text-xs uppercase tracking-wider">IT Director</p>
                        </div>
                    </div>
                    <p class="text-zinc-300 font-light leading-relaxed">"Finally, a student management system that doesn't look like it was built in 1998. The Spatie integration for permissions works flawlessly out of the box."</p>
                </div>

                <div class="bg-zinc-900/30 border border-white/5 rounded-3xl p-8 relative overflow-hidden group">
                    <i class="fas fa-quote-right absolute -right-4 -top-4 text-8xl text-white/5 group-hover:text-amber-500/10 transition-colors"></i>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-amber-500 to-orange-500 flex items-center justify-center text-white font-bold">MK</div>
                        <div>
                            <h4 class="text-white font-medium">Michael K.</h4>
                            <p class="text-zinc-500 text-xs uppercase tracking-wider">Lead Administrator</p>
                        </div>
                    </div>
                    <p class="text-zinc-300 font-light leading-relaxed">"The dark mode interface is stunning. We manage over 2,000 student records daily, and the system hasn't lagged once. A truly premium experience."</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 relative bg-zinc-950 border-t border-white/5">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-3xl lg:text-5xl font-bold tracking-tight text-white mb-12 text-center">Frequently asked questions.</h2>

            <div class="space-y-6">
                <div class="bg-zinc-900/50 border border-white/5 rounded-2xl p-6">
                    <h3 class="text-lg font-medium text-white mb-2">Is the data completely secure?</h3>
                    <p class="text-zinc-400 font-light leading-relaxed text-sm">Yes. We use industry-standard hashing for passwords and strict CSRF protection. Spatie's role-based access control guarantees users only access authorized data.</p>
                </div>

                <div class="bg-zinc-900/50 border border-white/5 rounded-2xl p-6">
                    <h3 class="text-lg font-medium text-white mb-2">Can I create custom roles?</h3>
                    <p class="text-zinc-400 font-light leading-relaxed text-sm">Absolutely. The system comes pre-configured with Super Admin, Admin, and Teacher roles, but you can assign granular permissions as needed.</p>
                </div>

                <div class="bg-zinc-900/50 border border-white/5 rounded-2xl p-6">
                    <h3 class="text-lg font-medium text-white mb-2">Does it work on mobile devices?</h3>
                    <p class="text-zinc-400 font-light leading-relaxed text-sm">Yes! The entire dashboard is built with responsive Tailwind CSS v4, meaning it works and looks beautiful on phones, tablets, and large desktop monitors.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 relative overflow-hidden border-t border-white/5">
        <div class="absolute inset-0 bg-violet-900/10 -z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 to-transparent -z-10"></div>

        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl lg:text-5xl font-bold tracking-tight text-white mb-6">Ready to upgrade your system?</h2>
            <p class="text-xl text-zinc-400 mb-10 font-light">Join the institutions that are already streamlining their workflow.</p>

            @auth
                <a href="{{ url('/dashboard') }}" class="px-8 py-4 bg-white text-zinc-950 font-semibold rounded-full hover:scale-105 transition-transform inline-flex items-center gap-2 shadow-xl shadow-white/10">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('register') }}" class="px-8 py-4 bg-violet-600 hover:bg-violet-500 text-white font-semibold rounded-full hover:scale-105 transition-all duration-300 inline-flex items-center gap-2 shadow-xl shadow-violet-600/20">
                    Create Free Account
                </a>
            @endauth
        </div>
    </section>

    <footer class="border-t border-white/5 bg-[#09090b] py-10">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-2 opacity-80">
                <i class="fas fa-graduation-cap text-violet-500"></i>
                <span class="font-semibold text-zinc-200">EduManage</span>
            </div>
            <p class="text-zinc-500 text-sm font-light">© {{ date('Y') }} EduManage Inc. Built with Laravel 13 & Tailwind v4.</p>
        </div>
    </footer>

</body>
</html>
