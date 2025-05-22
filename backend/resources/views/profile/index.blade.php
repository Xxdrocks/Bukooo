<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Account</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px;
            background: #fdfdfd;
        }

        .title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .account-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: auto auto;
            gap: 20px;
            align-items: start;
        }

        .profile-card {
            background: #fff6c2;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            height: 300px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #d9d9d9;
            margin: 0 auto 10px;
        }

        .profile-name {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .profile-info p {
            display: flex;
            justify-content: space-between;
            margin: 8px 0;
            font-size: 14px;
        }

        .change-link {
            color: #666;
            font-size: 12px;
        }

        .favorite-box, .wishlist-box {
            border-radius: 10px;
            padding: 10px 20px 20px;
            background: #fff;
            border: 3px solid;
        }

        .favorite-box {
            border-color: #f8b9b9;
        }

        .wishlist-box {
            border-color: #c9e7ce;
        }

        .box-title {
            font-weight: 600;
            margin-top: -14px;
            background: #fff;
            display: inline-block;
            padding: 0 10px;
            font-size: 14px;
        }

        .box-content {
            margin-top: 10px;
            max-height: 150px;
            overflow-y: auto;
            font-size: 14px;
        }

        .payment-history {
            margin-top: 40px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
            max-width: 700px;
        }

        .payment-history h3 {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .payment-history div {
            font-size: 14px;
            margin-bottom: 10px;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <h2 class="title">My Account</h2>

    <div class="account-grid">
        <div class="profile-card">
            <div class="profile-image"></div>
            <h3 class="profile-name">Nama</h3>
            <div class="profile-info">
                <p>username <span class="change-link">Change</span></p>
                <p>{{ $user->sellerProfile->phone_number ?? '081234567890' }} <span class="change-link">Change</span></p>
                <p>{{ $user->email }} <span class="change-link">Change</span></p>
            </div>
        </div>

        <div class="favorite-box">
            <p class="box-title">Favorite Books</p>
            <div class="box-content">
                @forelse($user->books->where('is_favorite', true) as $book)
                    <p>{{ $book->title }}</p>
                @empty
                    <p>No favorite books.</p>
                @endforelse
            </div>
        </div>

        <div class="wishlist-box">
            <p class="box-title">Wishlist</p>
            <div class="box-content">
                @forelse($user->wishlist as $wish)
                    <p>{{ $wish->book->title }}</p>
                @empty
                    <p>No wishlist items.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="payment-history">
        <h3>Riwayat Pembayaran</h3>
        @forelse($user->payments as $payment)
            <div>
                <strong>Order ID:</strong> {{ $payment->order_id }}<br>
                <strong>Jumlah:</strong> Rp{{ number_format($payment->amount, 0, ',', '.') }}<br>
                <strong>Status:</strong> {{ $payment->status }}<br>
                <strong>Dibayar pada:</strong> {{ $payment->paid_at ? $payment->paid_at->format('d M Y') : '-' }}
            </div>
            <hr>
        @empty
            <p>Tidak ada pembayaran.</p>
        @endforelse
    </div>

</body>
</html>
