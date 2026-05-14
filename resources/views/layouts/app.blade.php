<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:,">
    <title>@yield('title', 'PWDII - Manajemen Guru dan Mata Pelajaran')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen">
    <div class="min-h-screen lg:pl-[260px]">
        <aside class="hidden lg:flex lg:flex-col lg:fixed lg:inset-y-0 lg:left-0 lg:w-[260px] bg-gradient-to-b from-blue-600 to-blue-800 text-blue-50 shadow-xl">
            <div class="px-6 py-6 border-b border-white/20">
                <h1 class="text-xl font-bold text-white">SIAK PWDII</h1>
                <p class="text-xs text-blue-100 mt-1">Sistem Akademik</p>
            </div>

            <nav class="px-4 py-6 space-y-2">
                <a href="{{ route('guru.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('guru.*') ? 'bg-white text-blue-700 shadow-lg scale-[1.01]' : 'text-blue-100 hover:bg-white/20 hover:text-white' }}">
                    <span>Guru</span>
                </a>
                <a href="{{ route('mata-pelajaran.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('mata-pelajaran.*') ? 'bg-white text-blue-700 shadow-lg scale-[1.01]' : 'text-blue-100 hover:bg-white/20 hover:text-white' }}">
                    <span>Mata Pelajaran</span>
                </a>
            </nav>

            <div class="mt-auto px-4 py-6 border-t border-white/20">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2.5 rounded-lg bg-blue-900/40 hover:bg-blue-900/60 text-white text-sm font-medium transition border border-white/20">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="min-w-0">
            <header class="sticky top-0 z-10 bg-white/90 backdrop-blur border-b border-slate-200">
                <div class="px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Dashboard</p>
                        <p class="text-lg font-semibold text-slate-900">@yield('title', 'Manajemen Data')</p>
                    </div>
                    <div class="lg:hidden text-xs text-slate-500">Menu tampil di sidebar saat desktop</div>
                </div>
            </header>

            <main class="px-4 sm:px-6 lg:px-8 py-6">
                @if ($message = session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm">
                        {{ $message }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>

            <footer class="px-4 sm:px-6 lg:px-8 py-6 border-t border-slate-200 bg-white mt-10">
                <p class="text-xs text-slate-500">&copy; 2026 PWDII - Sistem Akademik</p>
            </footer>
        </div>
    </div>
</body>
</html>
