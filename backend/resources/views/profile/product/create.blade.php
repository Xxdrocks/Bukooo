@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" name="category" id="category" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" required>
        </div>
        <div class="form-group">
            <label for="created_by">Created By</label>
            <input type="text" class="form-control" name="created_by" id="created_by" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Product</button>
    </form>
</div>
@endsection
