@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-10">
        <h2 class="text-4xl font-bold tracking-tight text-slate-900 dark:text-white">Welcome back, {{ auth()->user()->name }} 👋</h2>
        <p class="text-slate-500 dark:text-zinc-400 mt-2 text-lg">Here's a quick overview of what's happening today.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white/70 dark:bg-zinc-900/40 backdrop-blur-xl border border-slate-200 dark:border-zinc-800/60 rounded-3xl p-8 hover:border-violet-500 dark:hover:border-violet-500/50 transition-all shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <span class="text-6xl font-bold text-slate-800 dark:text-white">{{ $totalStudents }}</span>
                    <p class="text-slate-500 dark:text-zinc-400 mt-3 text-lg font-medium">Total Students</p>
                </div>
                <div class="w-16 h-16 rounded-2xl bg-violet-50 dark:bg-violet-500/10 flex items-center justify-center">
                    <i class="fas fa-users text-4xl text-violet-600 dark:text-violet-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/70 dark:bg-zinc-900/40 backdrop-blur-xl border border-slate-200 dark:border-zinc-800/60 rounded-3xl p-8 hover:border-emerald-500 dark:hover:border-emerald-500/50 transition-all shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <span class="text-6xl font-bold text-slate-800 dark:text-white">{{ $totalTeachers }}</span>
                    <p class="text-slate-500 dark:text-zinc-400 mt-3 text-lg font-medium">Active Teachers</p>
                </div>
                <div class="w-16 h-16 rounded-2xl bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center">
                    <i class="fas fa-user-tie text-4xl text-emerald-600 dark:text-emerald-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/70 dark:bg-zinc-900/40 backdrop-blur-xl border border-slate-200 dark:border-zinc-800/60 rounded-3xl p-8 hover:border-amber-500 dark:hover:border-amber-500/50 transition-all shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <span class="text-6xl font-bold text-slate-800 dark:text-white">{{ $totalClasses }}</span>
                    <p class="text-slate-500 dark:text-zinc-400 mt-3 text-lg font-medium">Active Classes</p>
                </div>
                <div class="w-16 h-16 rounded-2xl bg-amber-50 dark:bg-amber-500/10 flex items-center justify-center">
                    <i class="fas fa-chalkboard-teacher text-4xl text-amber-600 dark:text-amber-400"></i>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
