@props(['essay'])

<x-layout>
    <a href="/" class="hover:underline text-sm font-bold hover:text-blue-500">Go Back</a>
    <div>
        <h3 class="text-2xl font-bold text-center mb-6">{{ $essay->title }}</h3>
        <div class="text-sm text-gray-500 flex justify-between mb-2 italic">
            <p>By {{ $essay->user->name }}</p>
            <p>Date: {{ $essay->created_at->format('d.m.Y') }}</p>
        </div>
        <p>{!! $essay->body !!}</p>
    </div>
</x-layout>