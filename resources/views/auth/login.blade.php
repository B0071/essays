<x-layout>
    <h3 class="text-center text-2xl font-bold">Login</h3>
        <form method="POST" action="/login">
            @csrf
    <div class="space-y-12">
        <div>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-5">
            {{-- Email --}}
            <div class="col-span-3 col-start-2">
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
            <div class="mt-2">
                <input id="email" type="email" name="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            @error('email')
                <p class="text-xs text-red-500 italic mt-2 font-bold">{{ $message }}</p>
            @enderror
            </div>

            {{-- Password --}}
            <div class="col-span-3 col-start-2">
            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
            <div class="mt-2">
                <input id="password" type="password" name="password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            @error('password')
                <p class="text-xs text-red-500 italic mt-2 font-bold">{{ $message }}</p>
            @enderror
            </div>
        </div>
        </div>
    </div>

    <div class="mt-10 flex items-center justify-center gap-x-6">
        <a href='/' class="text-sm font-semibold text-gray-900 px-15 py-2 rounded-md bg-gray-200">Go Back</a>
        <button type="submit" class="rounded-md bg-indigo-600 px-15 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
    </div>
    </form>

</x-layout>