@extends('layouts.admin')

@section('title', 'Pages')
@section('heading', 'Pages')

@section('content')
<div class="space-y-10">
        <section class="rounded-3xl border border-white/10 bg-white/5 p-6 sm:p-8 shadow-[0_30px_70px_rgba(15,23,42,0.45)]">
            <header class="mb-6">
                <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Page content</p>
                <h2 class="text-2xl font-semibold">About builder</h2>
            </header>

            <form action="{{ route('admin.pages.update', $about, absolute: false) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="grid gap-4 md:grid-cols-2">
                    <label class="space-y-1 text-sm font-medium text-slate-200">
                        Title
                        <input type="text" name="title" value="{{ old('title', $about->title) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100" required>
                    </label>
                    <label class="space-y-1 text-sm font-medium text-slate-200">
                        Headline
                        <input type="text" name="headline" value="{{ old('headline', $about->headline) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">
                    </label>
                </div>

                <label class="space-y-1 text-sm font-medium text-slate-200">
                    Summary
                    <textarea name="summary" rows="2" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">{{ old('summary', $about->summary) }}</textarea>
                </label>

                <label class="space-y-1 text-sm font-medium text-slate-200">
                    Body
                    <textarea name="body" rows="4" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">{{ old('body', $about->body) }}</textarea>
                </label>

                <div class="grid gap-4 md:grid-cols-2">
                    <label class="space-y-1 text-sm font-medium text-slate-200">
                        CTA label
                        <input name="cta_label" value="{{ old('cta_label', $about->cta_label) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">
                    </label>
                    <label class="space-y-1 text-sm font-medium text-slate-200">
                        CTA URL
                        <input name="cta_url" type="url" value="{{ old('cta_url', $about->cta_url) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">
                    </label>
                </div>

                <button type="submit" class="w-full sm:w-auto px-6 py-2 rounded-full bg-amber-500 text-slate-900 font-semibold">Save about page</button>
            </form>
        </section>

        <section class="rounded-3xl border border-white/10 bg-white/5 p-6 sm:p-8 shadow-[0_30px_70px_rgba(15,23,42,0.45)]">
            <header class="mb-6">
                <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Page content</p>
                <h2 class="text-2xl font-semibold">Contact us</h2>
            </header>

            <form action="{{ route('admin.pages.update', $contact, absolute: false) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="grid gap-4 md:grid-cols-2">
                    <label class="space-y-1 text-sm font-medium text-slate-200">
                        Title
                        <input type="text" name="title" value="{{ old('title', $contact->title) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100" required>
                    </label>
                    <label class="space-y-1 text-sm font-medium text-slate-200">
                        Headline
                        <input type="text" name="headline" value="{{ old('headline', $contact->headline) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">
                    </label>
                </div>

                <label class="space-y-1 text-sm font-medium text-slate-200">
                    Summary
                    <textarea name="summary" rows="2" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">{{ old('summary', $contact->summary) }}</textarea>
                </label>

                <label class="space-y-1 text-sm font-medium text-slate-200">
                    Body
                    <textarea name="body" rows="4" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">{{ old('body', $contact->body) }}</textarea>
                </label>

                <div class="grid gap-4 md:grid-cols-2">
                    <label class="space-y-1 text-sm font-medium text-slate-200">
                        CTA label
                        <input name="cta_label" value="{{ old('cta_label', $contact->cta_label) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">
                    </label>
                    <label class="space-y-1 text-sm font-medium text-slate-200">
                        CTA URL
                        <input name="cta_url" type="url" value="{{ old('cta_url', $contact->cta_url) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">
                    </label>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    @foreach (\App\Models\Page::CONTACT_META_KEYS as $key => $label)
                        <label class="space-y-1 text-sm font-medium text-slate-200">
                            {{ $label }}
                            <input name="{{ $key }}" value="{{ old($key, $contact->metaValue($key)) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">
                        </label>
                    @endforeach
                </div>

                <button type="submit" class="w-full sm:w-auto px-6 py-2 rounded-full bg-amber-500 text-slate-900 font-semibold">Save contact page</button>
            </form>
        </section>
</div>
@endsection
