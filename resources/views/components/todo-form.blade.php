<x-app-layout>
    <h2 class="text-3xl text-center">Add Task</h2>
    <form method="POST" action="{{ url('create-todo') }}" class="max-w-lg mx-auto">
        <div class="flex flex-col gap-5">
            <div class="w-full py-2">

                <input name="name" value="{{ old('name') }}" type="text" placeholder="Task name"
                    class="w-full px-5 rounded focus:ring-0">
                @error('name')
                    <small class="text-red-400">{{ $message }}</small>
                @enderror
            </div>
            <div class="w-full ">
                <textarea placeholder="Task description" name="description" class="w-full rounded resize-none focus:ring-0">{{ old('description') }}</textarea>
                @error('description')
                    <small class="text-red-400">{{ $message }}</small>
                @enderror
            </div>
            <div class="w-full">

                <textarea placeholder=" long Task description" name="long_description" class="w-full rounded resize-none focus:ring-0">{{ old('long_description') }}</textarea>
                @error('long_description')
                    <small class="text-red-400">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <button type="submit"
            class="flex items-center justify-center w-56 gap-2 p-3 mt-5 transition-all duration-300 border border-gray-700 rounded hover:text-white hover:bg-gray-700 group">
            add <img src="assets/plus-circle.svg" alt="" class="group-hover:hidden">
            <img src="assets/plus-circle-light.svg" alt="" class="hidden group-hover:block">
        </button>
        {{-- <button>
            <img src="assets/search.svg" alt="">
        </button> --}}
    </form>
</x-app-layout>
