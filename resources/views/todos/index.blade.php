# Full Updated Todo Blade Code

## Pure CSS Version (Replace Tailwind Classes)

Use this complete pure CSS + HTML + Blade code:

```html
<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        .main-container {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
            background: linear-gradient(to bottom right, #064e3b, #15803d, #65a30d);
            color: white;
        }

        .background-image {
            position: absolute;
            inset: 0;
            background: url('/images/r.png') center/cover no-repeat;
            opacity: 0.2;
        }

        .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
        }

        .content {
            position: relative;
            z-index: 10;
        }

        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(6, 78, 59, 0.5);
            backdrop-filter: blur(8px);
            text-align: center;
            padding: 20px 0;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }

        .form-wrapper {
            margin-top: 130px;
            display: flex;
            justify-content: center;
        }

        .form-group {
            width: 90%;
            display: flex;
            justify-content: center;
        }

        .todo-input {
            width: 50%;
            padding: 12px 16px;
            border: none;
            outline: none;
            border-radius: 12px 0 0 12px;
            color: black;
        }

        .add-btn {
            padding: 12px 24px;
            background: #047857;
            color: white;
            border: none;
            border-radius: 0 12px 12px 0;
            cursor: pointer;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #059669;
        }

        .table-wrapper {
            margin-top: 40px;
            display: flex;
            justify-content: center;
        }

        .table-box {
            width: 50%;
            background: white;
            color: black;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }

        .todo-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .todo-table th {
            background: #e5e7eb;
            color: #166534;
            padding: 12px;
            border: 1px solid #d1d5db;
            text-align: center;
        }

        .todo-table td {
            border: 1px solid #d1d5db;
            padding: 12px;
            text-align: center;
        }

        .todo-row:hover {
            background: #f8fafc;
        }

        .todo-text.completed {
            text-decoration: line-through;
            color: #9ca3af;
        }

        .action-link,
        .delete-btn {
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .action-link:hover {
            color: #15803d;
        }

        .delete-btn:hover {
            color: #dc2626;
        }

        .todo-checkbox {
            width: 16px;
            height: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="main-container">

    <div class="background-image"></div>
    <div class="overlay"></div>

    <div class="content">

        <div class="header">
            <h1>Todo App</h1>
        </div>

        <div class="form-wrapper">
            <form action="{{ route('todos.store') }}" method="POST" class="form-group">
                @csrf

                <input
                    type="text"
                    name="todo"
                    placeholder="What do you need to do?"
                    class="todo-input"
                >

                <button type="submit" class="add-btn">
                    Add
                </button>
            </form>
        </div>

        <div class="table-wrapper">
            <div class="table-box">

                <table class="todo-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Update</th>
                            <th>Delete</th>
                            <th>Done</th>
                        </tr>
                    </thead>

                    <tbody id="todoTable">

                        @foreach($todos as $todo)
                        <tr class="todo-row">

                            <td>{{ $loop->iteration }}</td>

                            <td class="todo-text {{ $todo->completed == 'true' ? 'completed' : '' }}">
                                {{ $todo->todo }}
                            </td>

                            <td>
                                <a href="{{ route('todos.edit', $todo->id) }}" class="action-link">
                                    Update
                                </a>
                            </td>

                            <td>
                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="delete-btn">
                                        Delete
                                    </button>
                                </form>
                            </td>

                            <td>
                                <input
                                    type="checkbox"
                                    class="todo-checkbox"
                                    data-id="{{ $todo->id }}"
                                    {{ $todo->completed == 'true' ? 'checked' : '' }}
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

<script>
    document.querySelectorAll('.todo-checkbox').forEach(checkbox => {

        checkbox.addEventListener('change', function () {

            let row = this.closest('tr');
            let todoText = row.querySelector('.todo-text');
            let tableBody = document.getElementById('todoTable');

            let todoId = this.dataset.id;
            let completed = this.checked ? 'true' : 'false';

            fetch(`/todos/${todoId}/complete`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    completed: completed
                })
            });

            if (this.checked) {
                todoText.classList.add('completed');
                tableBody.appendChild(row);
            } else {
                todoText.classList.remove('completed');
                tableBody.prepend(row);
            }

        });

    });
</script>

</body>
</html>
```

# Full Updated Todo Blade Code

Replace your current Blade file with this complete code:

```html
<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                <td class="text-center font-medium border todo-text py-3 {{ $todo->completed ? 'line-through text-gray-400' : '' }}">
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
                                        data-id="{{ $todo->id }}"
                                        {{ $todo->completed ? 'checked' : '' }}
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

                let todoId = this.dataset.id;
                let completed = this.checked ? 1 : 0;

                fetch(`/todos/${todoId}/complete`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        completed: completed
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                });

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