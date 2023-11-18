<x-app-layout>

    <h2 class="pt-10 pb-2 text-xl font-semibold leading-tight text-center text-gray-800 shadow">
        Edit Todo
    </h2>
    <div class="max-w-lg p-5 mx-auto mt-5 bg-white">
        <form action="{{ route('task.update', ['id' => $todo->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" value="{{ $todo->name }}"
                    class="border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                    placeholder="Todo Name">
                @error('name')
                    <div class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="mb-4">
                <label for="description" class="sr-only">Description</label>
                <textarea name="description" id="description"
                    class="border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror"
                    placeholder="Todo Description">{{ $todo->description }}</textarea>
                @error('description')
                    <div class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="mb-4">
                <label for="long_description" class="sr-only">Description</label>
                <textarea name="long_description" id="long_description" rows="5"
                    class="border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror"
                    placeholder="Long Todo Description">{{ $todo->long_description }}</textarea>
                @error('description')
                    <div class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="mb-4">
                <input type="checkbox" name="status" id="status" {{ $todo->status == 1 ? 'checked' : '' }}>
                <label for="status" class="">Status</label>
            </div>
            <div>
                <button type="submit"
                    class="w-full px-4 py-3 font-medium text-white bg-blue-500 rounded">Update</button>
</x-app-layout>
