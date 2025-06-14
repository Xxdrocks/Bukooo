<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .payment-details {
            padding: 80px;
            width: 80%;

        }

        .book-information {
            width: 30%;
            background-color: #f8f8f8;
            padding: 20px;
            border-radius: 8px;
        }



        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .header img {
            height: 60px;
            width: auto;
        }

        .countdown {
            display: flex;
            gap: 5px;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .countdown span {
            background-color: #eaeaea;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .payment-method {
            width: 80px;
            height: auto;
            margin-top: 10px;
        }

        .payment-details p {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
        }

        .pay-now-button {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #d1e7dd;
            color: #333;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .pay-now-button:hover {
            background-color: #c3dab0;
        }

        .book-information img {
            width: 200px;
            height: auto;
            margin-bottom: 10px;
        }

        .book-information p {
            margin-bottom: 5px;
        }

        .book-information strong {
            font-weight: bold;
        }

        @media (max-width: 768px) {
    .container {
        flex-direction: column;
        padding: 15px;
    }

    .payment-details,
    .book-information {
        width: 100%;
        padding: 20px;

    }



    .book-information {

        order: 1;
        margin-bottom: 20px;
    }

    .countdown {
        font-size: 16px;
    }

    .pay-now-button {
        font-size: 16px;
        padding: 12px;
    }

    .book-information img {
        width: 30%;
        height: auto;
    }

    .header h1 {
        font-size: 20px;
    }

    .header img {
        height: 40px;
    }

    .payment-method {
        width: 60px;
    }
}



    </style>
</head>

<body>

    @include('components.nav')


    <form action="{{ route('payment.prosess') }}" method="POST">
        @csrf

        <!-- Hidden Inputs -->
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="price" value="{{ $product->price * 1.03 }}">
        <input type="hidden" name="payment_method" value="qris">
        <input type="hidden" name="status" value="paid">

        <div class="container">
            <!-- Payment Details -->
            <div class="payment-details">
                <div class="header">
                    <img src="{{ asset('assets/payment/logo.png') }}" alt="ePayment Logo">
                    <div class="countdown">
                        <span>0</span><span>5</span>:<span>0</span><span>0</span>
                    </div>
                </div>


                <p>Book price: <span>Rp {{ number_format($product->price) }}</span></p>
                <p>Tax: <span> 3%</p></span>
                <p>The amount to be paid: <span>Rp {{ number_format($product->price * 1.03) }}</span></p>

                <button type="submit" class="pay-now-button" id="pay-button">Pay Now</button>
            </div>

            <!-- Book Information -->
            <div class="book-information">
                <h2>Book Information</h2>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Book Cover">
                <p><strong>Book Title</strong><br>{{ $product->name }}</p>
                <p><strong>Author</strong><br>{{ $product->created_by }}</p>
                <p><strong>Price</strong><br>Rp {{ number_format($product->price) }}</p>
            </div>
        </div>

    </form>



    <script>
        let minutes = 5;
        let seconds = 0;

        const countdownSpans = document.querySelectorAll('.countdown span');

        function updateCountdownDisplay(mins, secs) {
            const minStr = mins.toString().padStart(2, '0');
            const secStr = secs.toString().padStart(2, '0');

            countdownSpans[0].textContent = minStr[0];
            countdownSpans[1].textContent = minStr[1];
            countdownSpans[2].textContent = secStr[0];
            countdownSpans[3].textContent = secStr[1];
        }

        updateCountdownDisplay(minutes, seconds);

        const countdownInterval = setInterval(() => {
            if (seconds === 0) {
                if (minutes === 0) {
                    clearInterval(countdownInterval);
                    // Optional: redirect or show message here
                    alert("Waktu pembayaran habis!");
                    return;
                }
                minutes--;
                seconds = 59;
            } else {
                seconds--;
            }

            updateCountdownDisplay(minutes, seconds);
        }, 1000);
    </script>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2 @11"></script>

</body>

</html>
