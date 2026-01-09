@extends('layouts.front')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-900 text-slate-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6">
        <header class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between md:gap-6">
            <a href="{{ route('home') }}" class="flex items-center gap-3 text-base font-semibold uppercase tracking-[0.25em] sm:text-xl sm:tracking-[0.4em]">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Bachawali logo"
                    class="h-10 w-auto rounded-full border border-white/20"
                    loading="lazy"
                >
                <span class="hidden sm:inline">bachawali.com</span>
            </a>
            <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-200">
                <a href="#services" class="hover:text-white">Services</a>
                <a href="#about" class="hover:text-white">About</a>
            </nav>
            <div class="flex w-full flex-col gap-3 sm:flex-row sm:flex-wrap md:w-auto md:justify-end">
            </div>
        </header>
        <div class="mt-6 flex flex-wrap items-center justify-center gap-6 rounded-2xl border border-white/10 bg-slate-950/60 px-4 sm:px-6 py-4 text-sm text-slate-200">
            <div class="flex items-center gap-2">
                <span class="text-xs uppercase tracking-[0.5em] text-amber-300">Phone</span>
                <span>0345-9356564 · 0312-7834567</span>
            </div>
            <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:gap-2">
                <span class="text-xs uppercase tracking-[0.5em] text-amber-300">Address</span>
                <span>Street # 6, Irum Colony, Nowshera Road, Mardan</span>
                <span class="hidden sm:inline text-slate-500">•</span>
                <span>Office No FF2 1ST FLOOR Plaza No 2 Eleven Heights 4 Acantilado Commercial Bahria 7 Islamabad</span>
            </div>
        </div>
    </div>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 pb-24 space-y-20">
        <section class="relative min-h-[540px] overflow-hidden rounded-3xl sm:rounded-[40px] border border-white/10 shadow-[0_80px_160px_rgba(2,6,23,0.85)]">
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-slate-950/60 to-transparent"></div>
                <div class="absolute inset-0" style="background-image: url('{{ asset('images/front_end.png') }}'); background-size: cover; background-position: center;"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-slate-950/80"></div>
            </div>
                <div class="relative z-10 flex flex-col justify-center px-5 sm:px-8 py-10 text-white">
                <p class="text-[10px] uppercase tracking-[0.45em] text-amber-200 sm:text-xs sm:tracking-[0.5em]">M/S Bacha Wali (CA/331) · PEC Registered Contractor · Sole Proprietor</p>
                <h1 class="mt-3 text-3xl font-semibold leading-tight sm:text-4xl lg:text-6xl">Civil, electrical, and mechanical works—delivered with qualified engineers and disciplined execution.</h1>
                <p class="mt-4 max-w-3xl text-base text-white/80 sm:text-lg">We deliver roads & pavements, buildings, housing societies, water supply & sewerage, MEP, LV/HV installation, fire protection, HVAC, building automation, telecom works, and more—planned with safety, documentation, and quality control.</p>
                <p class="mt-6 text-sm uppercase tracking-[0.6em] text-amber-300">Serving government and private sectors across Pakistan</p>
                <div class="mt-8 flex flex-wrap gap-3 text-sm">
                    <a href="#services" class="px-5 py-3 rounded-full border border-white/40 text-white/90">View project types</a>
                </div>
            </div>
        </section>

        <section id="services" class="space-y-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="uppercase tracking-[0.4em] text-amber-200 text-xs">Featured services</p>
                    <h2 class="text-2xl font-semibold sm:text-3xl">Buildings, roads, and housing societies — end-to-end delivery</h2>
                </div>
            </div>
            <div class="grid gap-6 md:grid-cols-2">
                @foreach ($features as $feature)
                    <article class="rounded-3xl border border-white/5 bg-white/5 p-6 shadow-[0_25px_60px_rgba(15,23,42,0.4)]">
                        <div class="flex items-center justify-between">
                            <span class="text-3xl">{{ $feature->icon ?? '🏗️' }}</span>
                            <span class="text-xs uppercase tracking-[0.4em] text-slate-400">{{ $feature->sort_order ? sprintf('#%02d', $feature->sort_order) : 'Core' }}</span>
                        </div>
                        <h3 class="mt-4 text-2xl font-semibold">{{ $feature->title }}</h3>
                        <p class="mt-3 text-slate-200">{{ $feature->description }}</p>
                    </article>
                @endforeach
            </div>
            <div class="mt-6">
                <article class="mx-auto w-full max-w-4xl rounded-3xl border border-amber-500/30 bg-gradient-to-br from-amber-500/10 to-slate-900/40 p-6 shadow-[0_20px_50px_rgba(250,204,21,0.25)]">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/dr_sn.jpeg') }}" alt="Dr. Talat Shabbir" class="h-20 w-20 rounded-full border-2 border-white/40 object-cover" loading="lazy">
                        <div>
                            <p class="text-lg font-semibold">Dr. Talat Shabbir</p>
                            <p class="text-sm uppercase tracking-[0.4em] text-amber-200">Senior Advisor</p>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-slate-200">Guiding Bachawali.com through strategic decision making and stakeholder engagement, Dr. Talat brings decades of infrastructure leadership to every build.</p>
                </article>
            </div>
        </section>

        <section id="gallery" class="space-y-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="uppercase tracking-[0.4em] text-amber-200 text-xs">Site stories</p>
                    <h2 class="text-2xl font-semibold sm:text-3xl">Field snapshots of buildings, roads, and societies</h2>
                </div>
                <p class="text-sm text-slate-400">These stills and motion clips trace our crews from basement pours to highway overlays and housing society handovers.</p>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                @foreach ($galleryImages as $image)
                    @if (empty($image) || !file_exists(public_path('images/' . $image)))
                        @continue
                    @endif
                    <figure class="rounded-3xl overflow-hidden border border-white/5 bg-white/5 shadow-[0_25px_60px_rgba(15,23,42,0.35)]">
                        <img
                            src="{{ asset('images/' . rawurlencode($image)) }}"
                            alt="Bacha Wali visual"
                            class="h-72 w-full object-cover"
                            loading="lazy"
                        >
                    </figure>
                @endforeach
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                @foreach ($galleryVideos as $video)
                    <video
                        class="rounded-3xl border border-white/10 bg-black/40 shadow-[0_20px_50px_rgba(15,23,42,0.4)]"
                        muted
                        autoplay
                        playsinline
                        loop
                        controlslist="nodownload"
                    >
                        <source src="{{ asset('images/' . rawurlencode($video)) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endforeach
            </div>
        </section>

        <section id="about" class="rounded-[32px] border border-white/5 bg-slate-900/60 p-6 sm:p-8 shadow-[0_30px_70px_rgba(15,23,42,0.45)]">
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="space-y-5">
                    <p class="text-xs uppercase tracking-[0.4em] text-amber-200">About</p>
                    <h2 class="text-3xl font-semibold">{{ $about->headline }}</h2>
                    <p class="text-lg text-slate-300">{{ $about->summary }}</p>
                    <p class="text-slate-200">{{ $about->body }}</p>
                    <p class="text-slate-200">As a PEC registered contractor (CA/331), we cover civil, electrical, mechanical, and telecommunication scopes—coordinated so projects move from survey to handover without surprises.</p>
                    <a href="{{ $about->cta_url ?: '#services' }}" class="inline-flex items-center justify-center px-5 py-2 rounded-full bg-white text-slate-900 font-semibold shadow-lg shadow-white/20">{{ $about->cta_label ?: 'Learn more' }}</a>
                </div>
                <div class="rounded-3xl border border-white/5 bg-gradient-to-br from-slate-800 to-slate-900 p-6">
                    <p class="text-sm uppercase tracking-[0.4em] text-slate-400">Culture</p>
                    <ul class="mt-4 space-y-4 text-slate-200">
                        <li class="flex items-start gap-3">
                            <span class="mt-1 text-amber-300">•</span>
                            <p><strong>Registered capability</strong> with PEC contractor status (CA/331) and documented work processes.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 text-amber-300">•</span>
                            <p><strong>Qualified engineers</strong> across civil, mechanical, electrical, and telecom disciplines.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 text-amber-300">•</span>
                            <p><strong>Quality & safety</strong> via inspections, checklists, and clear site documentation.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 text-amber-300">•</span>
                            <p><strong>End-to-end coordination</strong> aligning civil, MEP, finishing, and external works for on-time handover.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="contact" class="rounded-[32px] border border-white/5 bg-white/5 p-6 sm:p-8 shadow-[0_25px_60px_rgba(15,23,42,0.45)]">
            <div class="grid gap-10 lg:grid-cols-1">
                <div class="space-y-6">
                    <div class="space-y-2">
                        <p class="text-xs uppercase tracking-[0.4em] text-amber-200">Get in touch</p>
                        <h2 class="text-3xl font-semibold">{{ $contact->headline }}</h2>
                        <p class="text-lg text-slate-300">{{ $contact->summary }}</p>
                        <p class="text-slate-200">{{ $contact->body }}</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-slate-950/60 p-6 space-y-5">
                        <div>
                            <p class="text-[10px] uppercase tracking-[0.55em] text-slate-400">Phone</p>
                            <p class="text-lg font-semibold text-white">+92345-9356564</p>
                            <p class="text-lg font-semibold text-white">+92312-7834567</p>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-[0.55em] text-slate-400">Email</p>
                            <p class="text-lg font-semibold text-white"></p>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-[0.55em] text-slate-400">Address</p>
                            <p class="text-lg font-semibold text-white break-words leading-snug">Street # 6, Irum Colony, Nowshera Road, Mardan</p>
                            <p class="mt-2 text-lg font-semibold text-white break-words leading-snug">Office No FF2 1ST FLOOR Plaza No 2 Eleven Heights 4 Acantilado Commercial Bahria 7 Islamabad</p>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-[0.55em] text-slate-400">Office hours</p>
                            <p class="text-lg font-semibold text-white">{{ $contact->metaValue('hours', 'Mon–Sat · 8am–8pm') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
