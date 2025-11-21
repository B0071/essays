@props(['results', 'searchedWord' => null])

<x-layout>
    @if ($searchedWord)
        <h3 class="text-2xl font-bold">{{ count($results); }} results found for "{{ $searchedWord }}".</h3>
    @else
        <div class="flex justify-between items-center">
            <h3 class="text-2xl font-bold">My Esssays</h3>
            <p class="font-bold">Total: {{ count($results); }}</p>
        </div>
    @endif

    <ul class="space-y-2 mt-6">
        @foreach ($results as $essay)
        <li class="block bg-gray-100 rounded-2xl p-3 border-b border-gray-200 hover:bg-gray-50 transition duration-150 ease-in-out">
            <div>
            </div>
            <a class="block border-gray-300 hover:bg-gray-50 transition duration-150 ease-in-out hover:text-blue-500" href="/essays/{{ $essay->id; }}">{{ $essay->title; }}</a>
            <div>
                <p class="text-xs mt-1 text-gray-400">created at: {{ $essay->created_at->format('d.m.Y - h:m') }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</x-layout>