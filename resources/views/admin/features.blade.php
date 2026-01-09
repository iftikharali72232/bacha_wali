@extends('layouts.admin')

@section('title', 'Features')
@section('heading', 'Features')

@section('content')
<div class="space-y-8">
        <section class="rounded-3xl border border-white/10 bg-white/5 p-6 sm:p-8 shadow-[0_30px_70px_rgba(15,23,42,0.45)]">
            <header class="mb-5 space-y-1">
                <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Feature cards</p>
                <h2 class="text-2xl font-semibold">Add a feature</h2>
            </header>

            <form action="{{ route('admin.features.store') }}" method="POST" class="grid gap-4 md:grid-cols-2">
                @csrf
                <label class="space-y-1 text-sm font-medium text-slate-200">
                    Title
                    <input name="title" value="{{ old('title') }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100" required>
                </label>
                <label class="space-y-1 text-sm font-medium text-slate-200">
                    Icon
                    <input name="icon" value="{{ old('icon') }}" placeholder="e.g. 🦺" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">
                </label>
                <label class="space-y-1 text-sm font-medium text-slate-200 md:col-span-2">
                    Description
                    <textarea name="description" rows="3" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">{{ old('description') }}</textarea>
                </label>
                <label class="space-y-1 text-sm font-medium text-slate-200">
                    Order
                    <input name="sort_order" type="number" min="0" value="{{ old('sort_order', 0) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-4 py-2 text-slate-100">
                </label>
                <div class="flex items-end">
                    <button type="submit" class="w-full md:w-auto px-5 py-2 rounded-full bg-amber-500 text-slate-900 font-semibold">Add feature</button>
                </div>
            </form>
        </section>

        <section class="rounded-3xl border border-white/10 bg-white/5 p-6 sm:p-8 shadow-[0_30px_70px_rgba(15,23,42,0.45)] space-y-6">
            <header>
                <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Existing cards</p>
                <h2 class="text-2xl font-semibold">Maintain feature library</h2>
            </header>

            @if ($features->isEmpty())
                <p class="text-slate-400">No features yet. Add one to display it on the landing page.</p>
            @else
                <div class="space-y-5">
                    @foreach ($features as $feature)
                        <div class="rounded-2xl border border-slate-700 bg-slate-900/40 p-5 space-y-4">
                            <form action="{{ route('admin.features.update', $feature) }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')
                                <div class="grid gap-4 md:grid-cols-3">
                                    <label class="space-y-1 text-sm font-medium text-slate-200">
                                        Title
                                        <input name="title" value="{{ old('title', $feature->title) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-3 py-2 text-slate-100" required>
                                    </label>
                                    <label class="space-y-1 text-sm font-medium text-slate-200">
                                        Icon
                                        <input name="icon" value="{{ old('icon', $feature->icon) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-3 py-2 text-slate-100">
                                    </label>
                                    <label class="space-y-1 text-sm font-medium text-slate-200">
                                        Order
                                        <input name="sort_order" type="number" min="0" value="{{ old('sort_order', $feature->sort_order) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-3 py-2 text-slate-100">
                                    </label>
                                </div>
                                <label class="space-y-1 text-sm font-medium text-slate-200">
                                    Description
                                    <textarea name="description" rows="2" class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-3 py-2 text-slate-100">{{ old('description', $feature->description) }}</textarea>
                                </label>
                                <div class="flex flex-wrap gap-3 items-center">
                                    <button type="submit" class="w-full sm:w-auto px-4 py-2 rounded-full bg-amber-500 text-slate-900 font-semibold">Save</button>
                                    <button type="submit" form="delete-feature-{{ $feature->id }}" class="w-full sm:w-auto px-4 py-2 rounded-full border border-slate-700 text-slate-200 hover:border-white">Delete</button>
                                </div>
                            </form>

                            <form id="delete-feature-{{ $feature->id }}" action="{{ route('admin.features.destroy', $feature) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
</div>
@endsection
