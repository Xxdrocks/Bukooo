<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 550px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #444;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        button {
            width: 100%;
            background-color: #3b82f6;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        button:hover {
            background-color: #2563eb;
        }

        .success-message {
            background-color: #dcfce7;
            border: 1px solid #4ade80;
            color: #166534;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: -14px;
            margin-bottom: 10px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update', $user->id) }}" method="POST">
            @csrf

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
            @error('name') <span class="error">{{ $message }}</span> @enderror

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
            @error('email') <span class="error">{{ $message }}</span> @enderror


            <button type="submit">Update User</button>
        </form>
    </div>
</body>
</html>
