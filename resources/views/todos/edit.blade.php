<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>

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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .edit-box {
            width: 100%;
            max-width: 500px;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 20px;
            padding: 40px;
           background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            box-sizing: border-box;
        }

        .title {
            text-align: center;
            font-size: 28px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .todo-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            text-align: center;
            color: #166534;
            font-size: 16px;
            box-sizing: border-box;
            margin-bottom: 25px;
        }

        .todo-input:focus {
            outline: none;
            border-color: #22c55e;
            box-shadow: 0 0 0 2px rgba(34,197,94,0.3);
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .update-btn,
        .back-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            box-sizing: border-box;
        }

        .update-btn {
            background: #15803d;
        }

        .update-btn:hover {
            background: #166534;
        }

        .back-btn {
            background: rgba(29, 78, 216, 0.8);
        }

        .back-btn:hover {
            background: rgba(30, 64, 175, 0.9);
        }
    </style>
</head>

<body>

<div class="main-container">

    <div class="background-image"></div>
    <div class="overlay"></div>

    <div class="content">

        <div class="edit-box">

            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <h1 class="title">Update Todo</h1>

                <input
                    type="text"
                    name="todo"
                    value="{{ $todo->todo }}"
                    class="todo-input"
                >

                <div class="button-group">

                    <button type="submit" class="update-btn">
                        Update
                    </button>

                    <a href="{{ route('todos.index') }}" class="back-btn">
                        Back
                    </a>

                </div>
            </form>

        </div>

    </div>

</div>
</html>