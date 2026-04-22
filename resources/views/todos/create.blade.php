<!DOCTYPE html>
<html>
<head>
    <title>Add Todo</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<h1>Add Todo</h1>
<div class="flex flex-col items-center justify-center">
<form method="POST" action="/todos" class="flex items-center justify-center flex-col shadow-md h-fit w-fit">
    @csrf
    <input class="border px-4 py-2" type="text" name="todo" placeholder="Enter todo">
    <button type="submit">Add</button>
</form>
</div>
</body>
</html>