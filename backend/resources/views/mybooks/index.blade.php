<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
    @include('components.nav')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
    }

    .container {

        max-width: 800px;
        margin: auto;
        padding: 20px;
        text-align: center;
    }

    h1 {
        margin-top: 100px;
        margin-bottom: 30px;
        color: #333;
    }

    .bookshelf-container {
        position: relative;
        width: 100%;
        max-width: 760px;
        margin: auto;
        overflow: hidden;
    }

    .bookshelf-background {
        width: 100%;
        height: auto;
        display: block;
    }

    .book-grid {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        padding: 40px 30px 30px 30px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .book-card {
        width: 23%;
        height: 150px;
        margin-bottom: 65px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .book-card:hover {
        transform: scale(1.05);
    }

    .book-cover {
        padding-top: 40px;
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }


    @media (max-width: 768px) {
    .book-grid {
        padding: 25px 10px 20px 10px;
        gap: 5px;
    }

    .book-card {
        width: 20%;
        height: 100px;
        margin-bottom: 0px;
    }

    .book-cover {
        padding-top: 5px;
        width: 50%;
        object-fit: contain;
    }
}

@media (max-width: 480px) {
    .book-card {
        width: 23%;
        height: 90px;
    }

    .book-cover {
        padding-top: 5px;
    }
}

</style>

@include('components.nav')

<div class="container">
    <h1>My Books Shelf</h1>

    <div class="bookshelf-container">
        <img src="{{ asset('assets/mybooks/bookshelf.png') }}" alt="Bookshelf" class="bookshelf-background">

        <div class="book-grid">
            @foreach ($products as $product)
                <div class="book-card">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="book-cover">
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')


</body>
</html>
