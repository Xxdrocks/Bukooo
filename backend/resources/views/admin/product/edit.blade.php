<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>

    <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"><br><br>

        <label for="category">Category:</label><br>
        <input type="text" name="category" id="category" value="{{ old('category', $product->category) }}"><br><br>

        <label for="price">Price:</label><br>
        <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}"><br><br>

        <label for="image">Product Image:</label><br>
        <input type="file" name="image" id="image"><br><br>

        <button type="submit">Update Product</button>
    </form>

    <br>
</body>
</html>
