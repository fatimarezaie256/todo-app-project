<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="">

   <div class="relative min-h-screen overflow-hidden bg-gradient-to-br from-emerald-900 via-green-700 to-lime-600 text-white">
        <div class="absolute inset-0 bg-[url('/images/r.png')] bg-cover bg-center opacity-20"></div>
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10">
            <!-- <div class="bg-emerald-800/50 backdrop-blur-md fixed w-full top-0">
                <h1 class="text-center text-2xl font-bold p-5">
                    Update Todo
                </h1>
            </div> -->
            <div class="flex items-center justify-center flex-col mt-32">
         <div class="bg-transparent border border-gray-400 rounded-2xl p-8 w-full max-w-lg mt-20 flex flex-col items-center justify-center">

        <form action="{{ route('todos.update', $todo->id) }}" method="POST" class="">
            @csrf
            @method('PUT')
                <h1 class="text-center text-2xl font-bold pb-8">
                    Update Todo
                </h1>
            <input
                type="text"
                name="todo"
                value="{{ $todo->todo }}"
                class="w-full border text-center border-gray-400 py-2 px-20 text-green-800 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 mb-5"
            >

            <div class="flex flex-col gap-6">
                <button
                    type="submit"
                    class="bg-green-700 w-full hover:bg-green-800/80 text-white px-10 py-2 rounded-lg"
                >
                    Update
                </button>

                <a
                    href="{{ route('todos.index') }}"
                    class="bg-blue-700/80 w-full hover:bg-blue-800/60 text-white text-center px-10 py-2 rounded-lg"
                >
                    Back
                </a>
            </div>
        </form>

    </div></div>
        </div>

</body>
</html>
 