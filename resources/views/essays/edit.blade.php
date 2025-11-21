@props(['essay'])

<x-layout>
    
    <h3 class="text-2xl font-medium mb-3">Edit an Essay</h3>
    <form action="/essays/{{ $essay->id }}" method="POST" id="essay-form">
        @csrf
        @method('PUT')
        <div class="mb-4">
        <input type="text" id="title" name="title" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Title goes here..." value="{{ old('title', $essay->title) }}" />

        @error('title')
            <p class="font-bold italic text-red-500 text-xs">{{ $message; }}</p>
        @enderror
        </div>

        <input type="hidden" name="body" id="quill_html_body">
        <div id="editor-container" style="height: 400px; background-color: white; border: 1px solid #ccc;">
        </div>

        @error('body')
            <p class="font-bold italic text-red-500 text-xs">{{ $message; }}</p>
        @enderror

        <div class="flex justify-between mt-4">
            {{-- Disabled Draft button for now --}}
            <button type="submit" class="rounded-md px-15 bg-gray-200 py-2 text-sm font-semibold shadow-xs focus-visible:outline-2 focus-visible:outline-offset-2" disabled>Save as a Draft</button>

            <button type="submit" class="rounded-md bg-green-600 px-15 py-2 text-sm font-semibold text-white shadow-xs hover:bg-green-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Update</button>
        </div>
    </form>

    <script>
        // const existingContent = {!! json_encode($essay->body) !!};
        const existingContent = {!! json_encode(old('body', $essay->body)) !!};

        var quill = new Quill('#editor-container', {
            'theme': 'snow'
        });

        const delta = quill.clipboard.convert(existingContent);
        quill.setContents(delta, 'silent');

        var form = document.getElementById('essay-form');
        form.onsubmit = function(){
            var htmlContent = quill.root.innerHTML;

            document.getElementById('quill_html_body').value = htmlContent;

            return true;
        }
    </script>

</x-layout>