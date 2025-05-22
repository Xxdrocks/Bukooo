<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }

   .payment-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 20px;
}

.payment-details {
    width: 60%;
    padding-right: 40px;
}

.book-information {
    width: 35%;
    background-color: #f8f8f8;
    padding: 20px;
    border-radius: 8px;
}

.book-information img {
    width: 150px;
    height: 220px;
    object-fit: cover;
    margin-bottom: 10px;
}

</style>
<img src="{{ asset('assets/payment/logo.png') }}" alt="">


<div class="payment-container">
    <div class="payment-details">
        <p>Choose Payment Method</p>
        <img src="/images/qris.png" alt="QRIS" style="width: 100px">
        <p>Book price:{{ $product->price }}</p>
        <p>Tax: 3%</p>
        <p>The amount to be paid: {{ $product->price * 1.03 }}</p>
        <button>Pay Now</button>
    </div>

    <div class="book-information">
        <h2>Book Information</h2>
        <img src="{{ asset('storage/' . $product->image) }}" alt="Book Cover">
        <p><strong>Book Title</strong><br>{{ $product->name }}</p>
        <p><strong>Author</strong><br>{{ $product->created_by }}</p>
        <p><strong>Price</strong><br>Rp {{ number_format($product->price, 0, ',', '.') }}</p>
    </div>

