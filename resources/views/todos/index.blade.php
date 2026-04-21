<!DOCTYPE html>
<html>
<head>
    <title>All Todo</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">

<h1 class="text-3xl font-bold mb-5">All Todo</h1>

<!-- Add Todo -->
<form method="POST" action="/todos" class="mb-5">
    @csrf
    <input type="text" name="todo" placeholder="New Todo" class="border p-2">
    <button type="submit" class="bg-blue-500 text-white px-4 py-2">Add</button>
</form>

<hr class="mb-5">

<!-- Todo List -->
@foreach($todos as $todo)
    <div class="mb-4 border p-3">

        <!-- Show title -->
        <p class="text-lg">{{ $todo->title }}</p>

        <!-- Update Form -->
        <form method="POST" action="/todos/{{ $todo->id }}" class="inline">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $todo->title }}" class="border p-1">
            <button type="submit" class="bg-green-500 text-white px-3 py-1">Update</button>
        </form>

        <!-- Delete Button -->
        <form method="POST" action="/todos/{{ $todo->id }}" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-3 py-1">Delete</button>
        </form>

    </div>
@endforeach

</body>
</html>