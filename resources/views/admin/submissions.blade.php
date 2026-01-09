@extends('layouts.admin')

@section('title', 'Contact Requests')
@section('heading', 'Contact Requests')

@section('content')
<div class="space-y-6">
    <section class="rounded-3xl border border-white/10 bg-white/5 p-6 sm:p-8 shadow-[0_30px_70px_rgba(15,23,42,0.45)]">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-amber-200">Inbox</p>
                <h2 class="mt-2 text-2xl sm:text-3xl font-semibold">Website contact submissions</h2>
                <p class="mt-2 text-slate-300">Latest requests from the contact form.</p>
            </div>
            <div class="text-sm text-slate-400">
                Total: {{ $submissions->total() }}
            </div>
        </div>
    </section>

    @if ($submissions->isEmpty())
        <div class="rounded-3xl border border-white/10 bg-slate-950/60 p-6 text-slate-300">
            No contact requests yet.
        </div>
    @else
        <div class="space-y-4">
            @foreach ($submissions as $submission)
                <article class="rounded-3xl border border-white/10 bg-slate-950/60 p-6">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                        <div class="min-w-0">
                            <div class="text-xs uppercase tracking-[0.4em] text-slate-400">Subject</div>
                            <div class="mt-1 text-lg font-semibold text-white break-words">{{ $submission->subject }}</div>
                        </div>
                        <div class="text-xs text-slate-400 whitespace-nowrap">{{ $submission->created_at?->format('d M Y, h:i A') }}</div>
                    </div>

                    <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <div class="text-[10px] uppercase tracking-[0.45em] text-slate-400">Mobile</div>
                            <div class="mt-1 text-sm font-semibold text-white break-words">{{ $submission->mobile }}</div>
                        </div>
                        <div>
                            <div class="text-[10px] uppercase tracking-[0.45em] text-slate-400">Email</div>
                            <div class="mt-1 text-sm font-semibold text-white break-words">{{ $submission->email ?: '—' }}</div>
                        </div>
                        <div>
                            <div class="text-[10px] uppercase tracking-[0.45em] text-slate-400">Attachments</div>
                            @php
                                $attachments = is_array($submission->attachments) ? $submission->attachments : [];
                            @endphp
                            @if (count($attachments) === 0)
                                <div class="mt-1 text-sm text-slate-300">—</div>
                            @else
                                <div class="mt-2 flex flex-wrap gap-2">
                                    @foreach ($attachments as $path)
                                        <a
                                            class="inline-flex items-center rounded-2xl border border-white/10 bg-white/5 px-3 py-2 text-xs font-semibold text-slate-100 hover:border-white/20"
                                            href="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($path) }}"
                                            target="_blank"
                                            rel="noopener"
                                        >
                                            Download
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    @if (!empty($submission->description))
                        <div class="mt-4">
                            <div class="text-[10px] uppercase tracking-[0.45em] text-slate-400">Description</div>
                            <div class="mt-2 rounded-2xl border border-white/10 bg-white/5 p-4 text-sm text-slate-200 whitespace-pre-line break-words">
                                {{ $submission->description }}
                            </div>
                        </div>
                    @endif
                </article>
            @endforeach
        </div>

        <div class="pt-2">
            <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                {{ $submissions->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
