<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Module Manager</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f1f4f9;
            color: #333;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .main-content {
            flex: 1;
            padding: 30px;
            background-color: #fff;
            overflow-y: auto;
            box-shadow: -2px 0 6px rgba(0, 0, 0, 0.05);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
        }

        .btn-primary {
            padding: 10px 18px;
            background-color: #4e73df;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3759c4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        th, td {
            padding: 14px 18px;
            text-align: left;
        }

        th {
            background-color: #f8f9fc;
            font-weight: 600;
            font-size: 14px;
            color: #555;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        td {
            font-size: 14px;
            color: #444;
            border-bottom: 1px solid #eee;
        }

        .edit-btn,
        .delete-btn {
            padding: 6px 14px;
            font-size: 13px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: opacity 0.2s ease;
        }

        .edit-btn {
            background-color: #1cc88a;
            color: white;
        }

        .edit-btn:hover {
            background-color: #17a673;
        }

        .delete-btn {
            background-color: #e74a3b;
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        @include('components.admin-nav')

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>User Manager</h1>
                <a href="{{ route('user.add') }}">
                    <button class="btn-primary">+ Add New User</button>
                </a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}">
                                    <button class="edit-btn">Edit</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('user.delete', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
