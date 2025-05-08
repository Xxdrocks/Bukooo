<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookshelf</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('assets/background/bg.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top center;
            background-color: #f5f5f5;
            color: white;
            text-align: center;
        }

        .continue-reading {
            margin-top: 30px;
        }

        .continue-reading img {
            width: 120px;
            height: auto;
        }

            .bookshelf-container {
                position: relative;
                width: 700px;
                margin: 0 auto;
            }

            .bookshelf-img {
                width: 100%;
                height: auto;
                display: block;
            }

            .book {
                position: absolute;
                width: 60px;
                height: auto;
                transition: transform 0.3s ease;
            }

            .book:hover {
                transform: scale(1.1);
                z-index: 10;
            }


        .book {
            position: absolute;
            width: 70px;
            height: auto;
        }

        h1 {
            margin-top: 20px;
        }
    </style>
</head>
<body>

@include('components.nav')
{{--  @include('layouts.loading')  --}}

{{-- Continue Reading Section --}}
@if($books->where('is_reading', true)->first())
    @php $readingBook = $books->where('is_reading', true)->first(); @endphp
    <div class="continue-reading">
        <h3>Continue Reading</h3>
        <div>
            <img src="{{ asset('storage/' . $readingBook->cover_image) }}" alt="{{ $readingBook->title }}">
            <p><strong>{{ $readingBook->title }}</strong><br>by {{ $readingBook->author }}</p>
            <p>You have read up to page {{ $readingBook->current_page }}</p>
            <a href="#">Continue read...</a>
        </div>
    </div>
@endif

<h1>My Books Shelf</h1>
<div class="bookshelf-container">
    <img class="bookshelf-img" src="{{ asset('assets/mybooks/bookshelf.png') }}" alt="Bookshelf">

    @foreach($books->take(9) as $index => $book)
        @php
            $col = $index % 3;
            $row = floor($index / 3);

            $x = 95 + $col * 170;
            $y = 45 + $row * 140;
        @endphp

        <img
            class="book"
            src="{{ asset('storage/' . $book->cover_image) }}"
            alt="{{ $book->title }}"
            style="top: {{ $y }}px; left: {{ $x }}px;"
        >
    @endforeach
</div>


</body>
</html>
