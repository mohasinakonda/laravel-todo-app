<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <h2>this is my best Practice blade template</h2>
    <div class="grid grid-cols-3 gap-5">

        @forelse ($tasks as $task)
            <div class="bg-gray-200 p-4 m-4 rounded {{ $task->status == 1 ? 'bg-green-100' : '' }}">

                <div class="flex items-center gap-2">
                    <input type="checkbox" name=""{{ $task->status == 1 ? 'checked' : '' }} id="">
                    <h3 class="text-2xl font-bold">{{ $task->name }}</h3>

                </div>
                <div class="ml-7">

                    <small class="inline-block px-1 bg-gray-300 rounded shadow-inner ">{{ $task->created_at }}</small>
                </div>
                <p class="text-gray-700">{{ $task->description }}</p>
                <a class="underline" href="{{ route('task.show', ['id' => $task->id]) }}">view more &rarr;</a>
            </div>
        @empty
            <p>no task available</p>
        @endforelse
    </div>
</body>

</html>
