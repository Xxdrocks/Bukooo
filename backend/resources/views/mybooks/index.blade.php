

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
        width: calc(25% - 15px);
        height: 150px;
        margin-bottom: 20px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .book-card:hover {
        transform: scale(1.05);
    }

    .book-cover {
        padding-top: 30px;
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }


    @media (max-width: 992px) {
        .book-card {
            width: calc(50% - 15px);
        }
    }

    @media (max-width: 500px) {
        .book-card {
            width: 100%;
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
