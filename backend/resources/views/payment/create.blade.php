<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2 @11/dist/sweetalert2.min.css">


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
</head>

<body>

    <img src="{{ asset('assets/payment/logo.png') }}" alt="">


    <form id="payment-form" action="{{ route('payment.store') }}" method="POST">
        @csrf

        <!-- Hidden Inputs -->
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="payment_method" value="qris">
        <input type="hidden" name="status" value="paid">

        <div class="payment-container">
            <div class="payment-details">
                <p>Choose Payment Method</p>
                <img src="/images/qris.png" alt="QRIS" style="width: 100px">
                <p>Book price: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <p>Tax: 3%</p>
                <p>The amount to be paid: Rp {{ number_format($product->price * 1.03, 0, ',', '.') }}</p>
                <button type="button" id="pay-now-button" class="btn btn-primary">Pay Now</button>
            </div>

            <div class="book-information">
                <h2>Book Information</h2>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Book Cover">
                <p><strong>Book Title</strong><br>{{ $product->name }}</p>
                <p><strong>Author</strong><br>{{ $product->created_by }}</p>
                <p><strong>Price</strong><br>Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
        </div>
    </form>


    <script>
        document.getElementById('pay-now-button').addEventListener('click', function() {
            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Confirm Payment',
                text: 'Are you sure you want to proceed with the payment?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Pay Now!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('payment-form').submit();
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
