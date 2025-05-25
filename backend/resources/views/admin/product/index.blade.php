<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Module Manager</title>
    <style>
        body {
            font-family: 'Poppins', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            color: #333;
        }

         .container {
            display: flex;
            height: 100vh;
        }


        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        .add-button {
            padding: 10px 20px;
            background-color: #4e73df;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-button:hover {
            background-color: #2e59d9;
        }

        .table-container {
            width: 920px;
            max-height: 520px;
            overflow-y: auto;
            overflow-x: auto;
            border: 1px solid #ddd;
            scrollbar-width: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fc;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px;
            cursor: pointer;
            border-radius: 4px;
        }

        .edit-btn {
            background-color: #1cc88a;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-btn:hover {
            background-color: #17a673;
        }

        .delete-btn {
            background-color: #e74a3b;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
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
                <h1>Module Manager</h1>

                <a href="{{ route('product.add') }}">
                    <button class="btn btn-primary">Add New User</button>
                </a>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Created_by</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category }}</td>
                                <td> <img src="{{ asset('storage/' . $product->image) }}" alt=""></td>
                                <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>{{ $product->created_by }}</td>
                                <td>
                                    <form action="{{ route('product.edit', $product->id) }}" method="PUT">
                                        <button class="edit-btn">EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('product.delete', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
