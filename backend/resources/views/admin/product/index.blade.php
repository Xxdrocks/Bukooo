<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Product Manager</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
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
            padding: 30px;
            background-color: #fff;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 600;
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

        .table-container {
            max-width: 100%;
            max-height: 520px;
            overflow-y: auto;
            overflow-x: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th,
        td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #f8f9fc;
            font-weight: 600;
            font-size: 14px;
        }

        td {
            font-size: 14px;
            color: #444;
        }

        td img {
            width: 60px;
            height: auto;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .edit-btn,
        .delete-btn {
            padding: 6px 12px;
            font-size: 13px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
        @include('components.admin-nav')

        <div class="main-content">
            <div class="header">
                <h1>Product Manager</h1>
                <a href="{{ route('product.add') }}">
                    <button class="btn-primary">+ Add New Product</button>
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
                            <th>Created By</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
                                </td>
                                <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>{{ $product->created_by }}</td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}">
                                        <button class="edit-btn">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('product.delete', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product?')">
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
    </div>
</body>

</html>
