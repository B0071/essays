@props(['essays'])

<x-layout>
    <h3 class="text-2xl font-bold">Recent Essays</h3>
    <p class="text-sm italic">Total - {{ count($essays); }} </p>
    <ul class="space-y-2 mt-6">
        @foreach ($essays as $essay)
        <li class="block bg-gray-100 rounded-2xl p-3 border-b border-gray-200 hover:bg-gray-50 transition duration-150 ease-in-out">
            <div>
                <a href="/register" target="_blank" class="text-xs text-gray-500 hover:text-blue-500 hover:underline">{{ $essay->user->name }}</a>
            </div>
            <a class="block border-gray-300 hover:bg-gray-50 transition duration-150 ease-in-out hover:text-blue-500" href="/essays/{{ $essay->id; }}">{{ $essay->title; }}</a>
            <div>
                <p class="text-xs mt-1 text-gray-400">created at: {{ $essay->created_at->format('d.m.Y - h:m') }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</x-layout>