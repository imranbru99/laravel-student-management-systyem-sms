<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="transition-colors duration-300">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EduManage') }} - Student Management</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style type="text/tailwindcss">
        @custom-variant dark (&:where(.dark, .dark *));
    </style>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', system-ui, sans-serif; }

        /* Custom scrollbar for a cleaner look */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        .dark ::-webkit-scrollbar-thumb { background: #3f3f46; }
    </style>
</head>
<body class="bg-[#f8fafc] dark:bg-[#09090b] text-slate-800 dark:text-zinc-100 antialiased selection:bg-violet-500/30 transition-colors duration-300">

<div class="flex h-screen overflow-hidden">

    <div class="w-72 bg-white/60 dark:bg-zinc-900/40 border-r border-slate-200 dark:border-zinc-800/60 backdrop-blur-xl flex flex-col transition-colors duration-300 shadow-[4px_0_24px_rgba(0,0,0,0.02)] dark:shadow-none z-20">

        <div class="px-8 py-8 flex items-center gap-4">
            <div class="w-12 h-12 bg-gradient-to-tr from-violet-600 to-fuchsia-500 rounded-2xl flex items-center justify-center text-2xl shadow-lg shadow-violet-500/30 text-white ring-1 ring-white/20">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div>
                <span class="text-2xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-600 dark:from-white dark:to-zinc-400">EduManage</span>
                <p class="text-xs font-medium text-violet-500 dark:text-violet-400 uppercase tracking-wider mt-0.5">Student System</p>
            </div>
        </div>

        <nav class="flex-1 px-5 py-4 overflow-y-auto space-y-1.5">
            <a href="{{ route('dashboard') }}"
               class="group flex items-center gap-4 px-4 py-3.5 rounded-xl text-sm font-medium transition-all duration-200
               {{ request()->routeIs('dashboard')
                  ? 'bg-violet-50 dark:bg-violet-500/10 text-violet-700 dark:text-violet-300 shadow-sm shadow-violet-500/5 border border-violet-100 dark:border-violet-500/20'
                  : 'text-slate-500 dark:text-zinc-400 hover:bg-slate-100 dark:hover:bg-zinc-800/50 hover:text-slate-900 dark:hover:text-zinc-100 border border-transparent' }}">
                <i class="fas fa-chart-pie w-5 text-lg transition-transform group-hover:scale-110 {{ request()->routeIs('dashboard') ? 'text-violet-600 dark:text-violet-400' : '' }}"></i>
                <span>Dashboard</span>
            </a>

            @if(auth()->user()->can('students.view') || auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin'))
            <a href="{{ route('students.index') }}"
               class="group flex items-center gap-4 px-4 py-3.5 rounded-xl text-sm font-medium transition-all duration-200
               {{ request()->routeIs('students.*')
                  ? 'bg-violet-50 dark:bg-violet-500/10 text-violet-700 dark:text-violet-300 shadow-sm shadow-violet-500/5 border border-violet-100 dark:border-violet-500/20'
                  : 'text-slate-500 dark:text-zinc-400 hover:bg-slate-100 dark:hover:bg-zinc-800/50 hover:text-slate-900 dark:hover:text-zinc-100 border border-transparent' }}">
                <i class="fas fa-user-graduate w-5 text-lg transition-transform group-hover:scale-110 {{ request()->routeIs('students.*') ? 'text-violet-600 dark:text-violet-400' : '' }}"></i>
                <span>Students</span>
            </a>
            @endif

            @if(auth()->user()->can('users.view') || auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin'))
            <a href="{{ route('users.index') }}"
               class="group flex items-center gap-4 px-4 py-3.5 rounded-xl text-sm font-medium transition-all duration-200
               {{ request()->routeIs('users.*')
                  ? 'bg-violet-50 dark:bg-violet-500/10 text-violet-700 dark:text-violet-300 shadow-sm shadow-violet-500/5 border border-violet-100 dark:border-violet-500/20'
                  : 'text-slate-500 dark:text-zinc-400 hover:bg-slate-100 dark:hover:bg-zinc-800/50 hover:text-slate-900 dark:hover:text-zinc-100 border border-transparent' }}">
                <i class="fas fa-shield-alt w-5 text-lg transition-transform group-hover:scale-110 {{ request()->routeIs('users.*') ? 'text-violet-600 dark:text-violet-400' : '' }}"></i>
                <span>Users &amp; Roles</span>
            </a>
            @endif
        </nav>

        <div class="p-5 pb-6">
            <div class="flex items-center gap-2 mb-4">
                <button onclick="toggleTheme()" class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-xl border border-slate-200 dark:border-zinc-700/50 bg-white dark:bg-zinc-800 hover:bg-slate-50 dark:hover:bg-zinc-700 text-slate-600 dark:text-zinc-300 text-sm font-medium transition-all shadow-sm">
                    <i id="theme-icon" class="fas fa-moon"></i>
                    <span id="theme-text">Dark</span>
                </button>

                <form method="POST" action="{{ route('logout') }}" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 py-2.5 rounded-xl border border-red-100 dark:border-red-500/20 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 text-red-600 dark:text-red-400 text-sm font-medium transition-all shadow-sm">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>

            <div class="p-3 bg-slate-100/50 dark:bg-zinc-800/50 border border-slate-200/60 dark:border-zinc-700/50 rounded-2xl flex items-center gap-3 shadow-sm">
                <div class="w-10 h-10 bg-violet-600 rounded-xl flex items-center justify-center text-lg font-bold text-white shadow-md shadow-violet-500/20">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-sm truncate text-slate-800 dark:text-zinc-100">{{ auth()->user()->name ?? 'User' }}</p>
                    <p class="text-xs text-slate-500 dark:text-zinc-400 truncate">{{ auth()->user()->roles->pluck('name')->join(', ') ?? 'Member' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex-1 flex flex-col overflow-hidden bg-transparent">

        <header class="h-20 bg-white/70 dark:bg-[#09090b]/70 backdrop-blur-xl border-b border-slate-200 dark:border-zinc-800/60 px-10 flex items-center justify-between sticky top-0 z-10 transition-colors duration-300">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">@yield('title', 'Dashboard')</h1>
            </div>

            <div class="flex items-center gap-4">
                <div class="w-8 h-8 rounded-full bg-slate-100 dark:bg-zinc-800 flex items-center justify-center text-slate-500 dark:text-zinc-400 cursor-pointer hover:bg-slate-200 dark:hover:bg-zinc-700 transition">
                    <i class="fas fa-bell text-sm"></i>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-auto p-8 lg:p-12">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>
</div>

<script>
    function toggleTheme() {
        const html = document.documentElement;
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.theme = 'light';
            document.getElementById('theme-icon').classList.replace('fa-moon', 'fa-sun');
            document.getElementById('theme-text').textContent = 'Light';
        } else {
            html.classList.add('dark');
            localStorage.theme = 'dark';
            document.getElementById('theme-icon').classList.replace('fa-sun', 'fa-moon');
            document.getElementById('theme-text').textContent = 'Dark';
        }
    }

    // Load saved theme on initial render
    if (localStorage.theme === 'dark' || (!localStorage.theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        document.getElementById('theme-icon').classList.add('fa-moon');
        document.getElementById('theme-text').textContent = 'Dark';
    } else {
        document.documentElement.classList.remove('dark');
        document.getElementById('theme-icon').classList.add('fa-sun');
        document.getElementById('theme-text').textContent = 'Light';
    }
</script>
</body>
</html>
