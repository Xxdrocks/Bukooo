<section class="product-section">
    <div class="product-grid" data-aos="slide-down" data-aos-duration="1500">
        @foreach ($products as $product)
            <form action="{{ route('payment.detail') }}" method="GET" class="product-card"
                onclick="this.submit()">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <!-- Gambar buku -->
                <img src="{{ asset('storage/' . $product->image) }}" class="book-image"
                    alt="{{ $product->name }}">

                <div class="productcontent">
                    <img class="new-label" src="/assets/product/new.png" alt="New">

                    <p class="book-title">{{ $product->name }}</p>
                    <p class="book-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
            </form>
        @endforeach
    </div>
</section>
