<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #444;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        .btn-submit {
            width: 100%;
            background-color: #4e73df;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-submit:hover {
            background-color: #4565c6;
        }

        .image-preview {
            text-align: center;
            margin-top: -10px;
            margin-bottom: 25px;
        }

        .image-preview img {
            max-width: 120px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .error-list {
            background-color: #fee;
            border: 1px solid #fca5a5;
            color: #b91c1c;
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .error-list ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>

        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}">

            <label for="category">Category:</label>
            <input type="text" name="category" id="category" value="{{ old('category', $product->category) }}">

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}">

            <label for="image">Upload New Image:</label>
            <input type="file" name="image" id="image">

            @if ($product->image)
                <div class="image-preview">
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Current Product Image">
                </div>
            @endif

            <button type="submit" class="btn-submit">Update Product</button>
        </form>
    </div>
</body>
</html>
