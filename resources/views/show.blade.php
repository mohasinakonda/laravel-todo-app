<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="max-w-2xl px-5 py-10 mx-auto bg-white">
        <a class="underline" href="{{ route('tasks.index') }}">&larr; back</a>
        <h2 class="py-5 mt-5 text-3xl ">{{ $task->name }}</h2>
        <p class="py-10 text-gray-600">{{ $task->long_description }}</p>
    </div>
</body>

</html>
