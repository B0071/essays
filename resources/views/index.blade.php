<x-layout>
    <div class="flex items-center justify-center bg-white">
    <div class="w-full max-w-xl text-center mt-20">
        
        <h1 class="text-2xl sm:text-2xl font-extrabold text-gray-900 mb-8">
            What do you want to read about today?
        </h1>
        
        <form action="/results" method="GET" class="flex justify-center space-x-3">
            <div class="relative grow">
                <input 
                    type="text" 
                    name="q"
                    placeholder="Career in 20s"
                    class="w-full py-4 pl-6 pr-6 text-lg bg-white text-gray-900 rounded-lg 
                           border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                           focus:outline-none shadow-md transition duration-300" 
                />
            </div>
            
            <button 
                type="submit" 
                class="px-5 py-4 text-lg bg-blue-600 hover:bg-blue-700 text-white rounded-lg 
                       font-semibold shadow-md transition duration-300 flex items-center justify-center"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
            
        </form>
        
    </div>
</div>
</x-layout>