<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @hasSection('title')
                @yield('title') · {{ config('app.name', 'Bachawali') }}
            @else
                Admin · {{ config('app.name', 'Bachawali') }}
            @endif
        </title>

        <link rel="icon" type="image/png" href="/images/logo.png">
        <link rel="shortcut icon" href="/images/logo.png">
        <link rel="apple-touch-icon" href="/images/logo.png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-950 text-slate-100 antialiased overflow-x-hidden">
        <input id="admin-nav" type="checkbox" class="peer sr-only" aria-hidden="true" />

        <div class="min-h-screen">
            <label for="admin-nav" class="fixed inset-0 z-30 bg-black/60 opacity-0 pointer-events-none transition peer-checked:opacity-100 peer-checked:pointer-events-auto md:hidden"></label>

            <aside class="fixed inset-y-0 left-0 z-40 w-72 border-r border-white/10 bg-slate-950/95 backdrop-blur px-4 py-6 transition-transform -translate-x-full peer-checked:translate-x-0 md:translate-x-0">
                <div class="flex items-center justify-between gap-3 px-2">
                    <a href="{{ route('admin.dashboard', absolute: false) }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 rounded-full border border-white/20" loading="lazy" />
                        <div class="leading-tight">
                            <div class="text-sm font-semibold">Admin Panel</div>
                            <div class="text-[10px] uppercase tracking-[0.4em] text-slate-400">Bachawali</div>
                        </div>
                    </a>
                    <label for="admin-nav" class="md:hidden rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-xs text-slate-200">Close</label>
                </div>

                <nav class="mt-8 space-y-2">
                    @php
                        $linkBase = 'flex items-center justify-between rounded-2xl px-4 py-3 text-sm font-semibold transition';
                        $active = 'bg-white/10 border border-white/10 text-white';
                        $inactive = 'border border-transparent text-slate-200 hover:bg-white/5 hover:border-white/10';
                    @endphp

                    <a href="{{ route('admin.dashboard', absolute: false) }}" class="{{ $linkBase }} {{ request()->routeIs('admin.dashboard') ? $active : $inactive }}">
                        <span>Dashboard</span>
                        <span class="text-[10px] uppercase tracking-[0.4em] text-slate-400">Home</span>
                    </a>

                    <a href="{{ route('admin.pages.index', absolute: false) }}" class="{{ $linkBase }} {{ request()->routeIs('admin.pages.*') ? $active : $inactive }}">
                        <span>Pages</span>
                        <span class="text-[10px] uppercase tracking-[0.4em] text-slate-400">Content</span>
                    </a>

                    <a href="{{ route('admin.features.index', absolute: false) }}" class="{{ $linkBase }} {{ request()->routeIs('admin.features.*') ? $active : $inactive }}">
                        <span>Features</span>
                        <span class="text-[10px] uppercase tracking-[0.4em] text-slate-400">Cards</span>
                    </a>

                    <a href="{{ route('admin.submissions.index', absolute: false) }}" class="{{ $linkBase }} {{ request()->routeIs('admin.submissions.*') ? $active : $inactive }}">
                        <span>Contact Requests</span>
                        <span class="text-[10px] uppercase tracking-[0.4em] text-slate-400">Inbox</span>
                    </a>

                    <a href="{{ route('home', absolute: false) }}" class="{{ $linkBase }} {{ $inactive }}">
                        <span>Back to website</span>
                        <span class="text-[10px] uppercase tracking-[0.4em] text-slate-400">Public</span>
                    </a>
                </nav>

                <div class="mt-8 rounded-3xl border border-white/10 bg-white/5 p-4">
                    <div class="text-xs uppercase tracking-[0.4em] text-slate-400">Signed in</div>
                    <div class="mt-2 text-sm font-semibold text-white">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <div class="text-xs text-slate-300 break-all">{{ auth()->user()->email ?? '' }}</div>

                    <form method="POST" action="{{ route('logout', absolute: false) }}" class="mt-4">
                        @csrf
                        <button type="submit" class="w-full rounded-2xl border border-white/10 bg-slate-950/60 px-4 py-2 text-sm font-semibold text-slate-100 hover:border-white/20">Logout</button>
                    </form>
                </div>
            </aside>

            <div class="md:pl-72">
                <header class="sticky top-0 z-20 border-b border-white/10 bg-slate-950/80 backdrop-blur">
                    <div class="mx-auto max-w-6xl px-4 sm:px-6 py-4 flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <label for="admin-nav" class="md:hidden rounded-2xl border border-white/10 bg-white/5 px-4 py-2 text-sm font-semibold">Menu</label>
                            <div>
                                <div class="text-xs uppercase tracking-[0.4em] text-slate-400">Admin</div>
                                <div class="text-lg font-semibold text-white">@yield('heading', 'Dashboard')</div>
                            </div>
                        </div>

                        <div class="hidden sm:flex items-center gap-3 text-sm text-slate-200">
                            <span class="text-slate-400">{{ now()->format('D, j M Y') }}</span>
                        </div>
                    </div>
                </header>

                <main class="mx-auto max-w-6xl px-4 sm:px-6 py-8">
                    @if (session('status'))
                        <div class="mb-6 rounded-2xl border border-emerald-500/30 bg-emerald-500/10 p-4 text-sm font-semibold text-emerald-100">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-rose-500/30 bg-rose-500/10 p-4 text-sm text-rose-100">
                            <div class="font-semibold">Please fix the highlighted fields.</div>
                            <ul class="mt-2 list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>
