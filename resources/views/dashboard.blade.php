<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <div class="max-w-lg p-5 mx-auto bg-white">
        <x-todo-form></x-todo-form>
        @foreach ($todos as $value)
            <div
                class="max-w-lg p-2 mx-auto mt-3 border border-gray-700 rounded shadow {{ $value->status == 1 ? 'bg-green-200  text-gray-300' : '' }}">

                <div class="flex items-center justify-between gap-2 ">
                    <div class="flex items-center gap-2">

                        <input type="checkbox" name="status" {{ $value->status == 1 ? 'checked' : '' }}
                            onchange="updateTodo({{ json_encode($value) }})" id="">
                        <h2 class='text-lg font-medium '>{{ $value->name }}</h2>
                    </div>
                    <div>
                        @if ($value->status == 0)
                            <button><img src="assets/edit.svg" alt=""></button>
                        @endif
                        <button><img src="assets/trush.svg" alt=""></button>
                    </div>
                </div>
                <div class="p-2 mt-2 bg-gray-100 shadow">
                    <p class="text-sm font-semibold">{{ $value->description }}</p>
                </div>
            </div>
        @endforeach

    </div>
    <script>
        function updateTodo(value) {
            const status = value.status == 1 ? 0 : 1;
            fetch(`/todo/${value.id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: status,
                        name: value.name,
                        description: value.description

                    })
                })
                .then(res => res.json())
                .then(data => console.log(data))
        }
    </script>
</body>

</html>
