<!DOCTYPE html>
<html>
<head>
    <title>All Todo</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white">

<h1 class="text-center text-4xl pt-10 text-shadow-lg text-shadow-amber-500 font-bold">All Todo</h1>
<div class="flex items-center justify-center p-10">
<table class="flex flex-col gap-4  items-center justify-center rounded-md">
    <tr>
        <th class="border px-4 py-4 text-center">Todo</th>
        <th class="border px-4 py-4 text-center"><button>Update</button></th>
        <th class="border px-4 py-4 text-center"><button>Delete</button></th>
    </tr>
    @foreach($todos as $todo)
    <tr>
        <td class="border px-4 py-4 text-center">{{$todo->todo}}</td>
        <td class="border px-4 py-4 text-center"><button type="submit">Update</button></td>
        <td class="border px-4 py-4 text-center"><button type="submit">Delete</button></td>
    </tr>
    @endforeach
</table>
</div>

</body>
</html>