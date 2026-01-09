@extends('layouts.admin')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')

@section('content')
<div class="space-y-8">
    <section class="rounded-3xl border border-white/10 bg-white/5 p-6 sm:p-8 shadow-[0_30px_70px_rgba(15,23,42,0.45)]">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-amber-200">Overview</p>
                <h2 class="mt-2 text-2xl sm:text-3xl font-semibold">Manage your landing page content</h2>
                <p class="mt-2 text-slate-300">Update pages, service cards, and keep the website fresh.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('admin.pages.index', absolute: false) }}" class="px-5 py-3 rounded-2xl bg-white text-slate-900 font-semibold text-center">Edit pages</a>
                <a href="{{ route('admin.features.index', absolute: false) }}" class="px-5 py-3 rounded-2xl border border-white/20 text-white font-semibold text-center">Manage features</a>
            </div>
        </div>
    </section>

    <section class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div class="rounded-3xl border border-white/10 bg-slate-950/60 p-6">
            <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Pages</p>
            <p class="mt-3 text-3xl font-semibold text-white">{{ $pagesCount ?? 0 }}</p>
            <p class="mt-2 text-sm text-slate-300">About + Contact content blocks.</p>
        </div>
        <div class="rounded-3xl border border-white/10 bg-slate-950/60 p-6">
            <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Feature Cards</p>
            <p class="mt-3 text-3xl font-semibold text-white">{{ $featuresCount ?? 0 }}</p>
            <p class="mt-2 text-sm text-slate-300">Services shown on home page.</p>
        </div>
        <div class="rounded-3xl border border-white/10 bg-slate-950/60 p-6">
            <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Contact Requests</p>
            <p class="mt-3 text-3xl font-semibold text-white">{{ $submissionsCount ?? 0 }}</p>
            <p class="mt-2 text-sm text-slate-300">Stored form submissions.</p>
        </div>
    </section>

    <section class="rounded-3xl border border-white/10 bg-white/5 p-6 sm:p-8">
        <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Quick actions</p>
        <div class="mt-4 grid gap-3 sm:grid-cols-2">
            <a href="{{ route('home', absolute: false) }}#services" class="rounded-2xl border border-white/10 bg-slate-950/60 px-5 py-4 hover:border-white/20">
                <div class="text-sm font-semibold">Preview home services section</div>
                <div class="text-xs text-slate-400">Check featured cards on mobile.</div>
            </a>
            <a href="{{ route('home', absolute: false) }}#contact" class="rounded-2xl border border-white/10 bg-slate-950/60 px-5 py-4 hover:border-white/20">
                <div class="text-sm font-semibold">Preview contact form</div>
                <div class="text-xs text-slate-400">Verify phone/address and CTA.</div>
            </a>
        </div>
    </section>
</div>
@endsection
