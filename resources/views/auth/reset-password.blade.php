<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reset Password - {{ config('app.name', 'EduManage') }}</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', system-ui, sans-serif;
            background-color: #09090b;
            color: #fafafa;
        }
        /* Ambient background glow */
        .ambient-glow {
            position: absolute;
            top: -20%;
            left: 50%;
            transform: translateX(-50%);
            width: 70vw;
            height: 60vh;
            background: radial-gradient(ellipse at top, rgba(139, 92, 246, 0.3), transparent 70%);
            z-index: -1;
            pointer-events: none;
            filter: blur(60px);
        }
        /* Subtle grid */
        .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(255,255,255,0.03) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center relative overflow-hidden antialiased selection:bg-violet-500/30 p-6">

    <div class="ambient-glow"></div>
    <div class="absolute inset-0 bg-grid-pattern [mask-image:radial-gradient(ellipse_at_center,black,transparent_80%)] -z-10 pointer-events-none"></div>

    <div class="w-full max-w-md relative z-10">
        <div class="flex flex-col items-center mb-8">
            <div class="w-14 h-14 bg-gradient-to-tr from-violet-600 to-fuchsia-500 rounded-2xl flex items-center justify-center text-3xl shadow-lg shadow-violet-500/20 ring-1 ring-white/10 mb-4">
                🔑
            </div>
            <h2 class="text-3xl font-bold tracking-tight text-white">Set new password</h2>
            <p class="text-zinc-400 mt-2 text-sm">Please choose a strong password for your account</p>
        </div>

        <div class="bg-zinc-900/60 backdrop-blur-2xl border border-white/10 rounded-3xl p-8 shadow-2xl shadow-black/50 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="block text-sm font-medium text-zinc-300 mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-zinc-500">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                               class="w-full pl-11 pr-4 py-3 bg-black/50 border border-white/10 rounded-xl text-zinc-400 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all transition-shadow">
                    </div>
                    @error('email')
                        <span class="text-rose-400 text-xs mt-2 block font-medium"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-zinc-300 mb-2">New Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-zinc-500">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                               class="w-full pl-11 pr-4 py-3 bg-black/50 border border-white/10 rounded-xl text-white placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all transition-shadow">
                    </div>
                    @error('password')
                        <span class="text-rose-400 text-xs mt-2 block font-medium"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-zinc-300 mb-2">Confirm New Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-zinc-500">
                            <i class="fas fa-shield-check"></i>
                        </div>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                               class="w-full pl-11 pr-4 py-3 bg-black/50 border border-white/10 rounded-xl text-white placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all transition-shadow">
                    </div>
                    @error('password_confirmation')
                        <span class="text-rose-400 text-xs mt-2 block font-medium"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-3.5 px-4 bg-white text-zinc-950 font-semibold rounded-xl hover:bg-zinc-200 transition-all duration-300 flex items-center justify-center gap-2 shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:shadow-[0_0_25px_rgba(255,255,255,0.2)] hover:scale-[1.02] active:scale-[0.98]">
                        Update Password <i class="fas fa-check text-sm ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
