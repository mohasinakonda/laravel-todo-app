<x-app-layout>
    <h2 class="text-3xl text-center">lists</h2>
    <form method="POST" action="{{ url('create-todo') }}" class="max-w-lg mx-auto">
        <div class="flex flex-col gap-5">

            <input name="name" type="text" placeholder="Task name" class="px-5 py-2 rounded focus:ring-0 ">
            <textarea type="text" placeholder="Task description" name="description" class="rounded resize-none focus:ring-0"></textarea>
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
