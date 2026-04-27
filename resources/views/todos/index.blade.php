<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen">

    <div class="relative min-h-screen overflow-hidden bg-gradient-to-br from-emerald-900 via-green-700 to-lime-600 text-white">

        <!-- Background Image -->
        <div class="absolute inset-0 bg-[url('/images/r.png')] bg-cover bg-center opacity-20"></div>
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10">

            <!-- Header -->
            <div class="bg-emerald-800/50 backdrop-blur-md fixed w-full top-0">
                <h1 class="text-center text-2xl font-bold p-5">
                    Todo App
                </h1>
            </div>

            <!-- Form -->
            <form action="{{ route('todos.store') }}" method="POST" class="mt-32">
                @csrf

                <div class="flex items-center justify-center px-4 w-[90%] mx-auto">

                    <input 
                        type="text" 
                        name="todo" 
                        placeholder="What do you need to do?"
                        class="w-1/2 px-4 py-3 text-black rounded-l-xl focus:outline-none"
                    >

                    <button 
                        type="submit"
                        class="px-6 py-3 bg-emerald-700 hover:bg-emerald-600 text-white font-semibold rounded-r-xl transition"
                    >
                        Add
                    </button>

                </div>
            </form>

            <!-- Table -->
            <div class="mt-10 flex justify-center">
                <div class="bg-white text-black w-1/2 rounded-xl shadow-xl overflow-hidden">

                    <table class="w-full text-sm">

                        <!-- Table Header -->
                        <thead class="bg-gray-200 uppercase text-xs">
                            <tr>
                                <th class="border border-gray-300 py-3 text-[16px] text-green-800 text-center">#</th>
                                <th class="border border-gray-300 py-3 text-[16px] text-green-800 text-center">Task</th>
                                <th class="border border-gray-300 py-3 text-[16px] text-green-800 text-center">Update</th>
                                <th class="border border-gray-300 py-3 text-[16px] text-green-800 text-center">Delete</th>
                                <th class="border border-gray-300 py-3 text-[16px] text-green-800 text-center">Done</th>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody id="todoTable" class="divide-y divide-slate-100">

                            @foreach($todos as $todo)
                            <tr class="hover:bg-slate-50 transition todo-row">

                               

                                <!-- Number -->
                                <td class="text-center border">
                                    {{ $loop->iteration }}
                                </td>

                                <!-- Todo Text -->
                                <td class="text-center font-medium border todo-text py-3">
                                    {{ $todo->todo }}
                                </td>

                                <!-- Update -->
                                <td class="text-center border">
                                    <a href="{{ route('todos.edit', $todo->id) }}"
                                       class="inline-block px-3 py-1.5 text-xs font-semibold rounded-md hover:text-green-700">
                                        Update
                                    </a>
                                </td>

                                <!-- Delete -->
                                <td class="border py-2 text-center">
                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button 
                                            type="submit"
                                            class="px-3 py-1.5 text-xs font-semibold rounded-md hover:text-red-700"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                 <!-- Checkbox -->
                                <td class="text-center border">
                                    <input 
                                        type="checkbox" 
                                        class="todo-checkbox w-4 h-4 cursor-pointer"
                                    >
                                </td>

                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>

        </div>
    </div>

    <!-- Checkbox Script -->
    <script>
        document.querySelectorAll('.todo-checkbox').forEach(checkbox => {

            checkbox.addEventListener('change', function () {

                let row = this.closest('tr');
                let todoText = row.querySelector('.todo-text');
                let tableBody = document.getElementById('todoTable');

                if (this.checked) {
                    todoText.classList.add('line-through', 'text-gray-400');
                    tableBody.appendChild(row);
                } else {
                    todoText.classList.remove('line-through', 'text-gray-400');
                    tableBody.prepend(row);
                }

            });

        });
    </script>

</body>
</html>