<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verify Email - {{ config('app.name', 'EduManage') }}</title>

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
        <div class="flex flex-col items-center mb-8 text-center">
            <div class="w-14 h-14 bg-gradient-to-tr from-violet-600 to-fuchsia-500 rounded-2xl flex items-center justify-center text-3xl shadow-lg shadow-violet-500/20 ring-1 ring-white/10 mb-4">
                ✉️
            </div>
            <h2 class="text-3xl font-bold tracking-tight text-white">Check your email</h2>
            <p class="text-zinc-400 mt-2 text-sm">We need to verify your identity</p>
        </div>

        <div class="bg-zinc-900/60 backdrop-blur-2xl border border-white/10 rounded-3xl p-8 shadow-2xl shadow-black/50 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>

            <p class="text-zinc-300 text-sm leading-relaxed mb-6 text-center font-light">
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 text-sm font-medium flex items-start gap-3">
                    <i class="fas fa-check-circle mt-0.5"></i>
                    <p>A new verification link has been sent to the email address you provided during registration.</p>
                </div>
            @endif

            <div class="space-y-4 pt-2">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full py-3.5 px-4 bg-white text-zinc-950 font-semibold rounded-xl hover:bg-zinc-200 transition-all duration-300 flex items-center justify-center gap-2 shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:shadow-[0_0_25px_rgba(255,255,255,0.2)] hover:scale-[1.02] active:scale-[0.98]">
                        Resend Verification Email <i class="fas fa-paper-plane text-sm ml-1"></i>
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="text-center">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-zinc-500 hover:text-white transition-colors underline underline-offset-4 decoration-white/20 hover:decoration-white/50">
                        Log Out Instead
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
