@props(['essay'])

<x-layout>
    <div class="flex justify-between items-center">
        <a href="/" class="hover:underline text-sm font-bold hover:text-blue-500">Go Back</a>
        
        <div class="flex gap-x-4 items-center">
        
            @can('edit-essay', $essay)
                <a href="/essays/{{ $essay->id; }}/edit" class="hover:underline text-sm font-bold text-yellow-500">Edit</a>
                <form method="POST" action="/essays/{{ $essay->id; }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="hover:underline text-sm font-bold text-red-500">Delete</button>
                </form>
            @endcan

        </div>
    </div>
    <div>
        <h3 class="text-2xl font-bold text-center mb-6">{{ $essay->title }}</h3>
        <div class="text-sm text-gray-500 flex justify-between mb-2 italic">
            <a href="/users/{{ $essay->user->id; }}/essays" class="text-blue-500 hover:underline">
                <p>By {{ $essay->user->name }}</p>
            </a>
            <p>Date: {{ $essay->created_at->format('d.m.Y') }}</p>
        </div>
        <p>{!! $essay->body !!}</p>
    </div>
</x-layout>