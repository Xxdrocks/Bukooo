<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #ffffff;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 60px auto;
        padding: 0 20px;
    }

    .form-wrapper {
        border: 2px solid #ccc;
        border-radius: 16px;
        padding: 40px;
        background-color: #ffffff;
    }

    h1 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 50px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: #333;
    }

    .form-label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 10px 10px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
        transition: all 0.3s ease;
        background-color: #e5e5e5;
    }

    .form-control:focus {
        border-color: #007bff;
        background-color: #fff;
        outline: none;
        box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.15);
    }

    .mb-3 {
        margin-bottom: 20px;
    }

    .is-invalid {
        border-color: #dc3545;
        background-color: #fff5f5;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 6px;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
        padding: 12px 24px;
        font-size: 16px;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-success:hover {
        background-color: #218838;
        transform: scale(1.03);
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 14px 20px;
        border-left: 6px solid #28a745;
        border-radius: 8px;
        font-weight: 500;
        margin-top: 16px;
    }

    .wave {
        z-index: -1;
            width: 100%;
            margin-top: -80px;
            margin-left: -50px;
        }
</style>

<div class="container">
    <h1>📝 Seller Registration</h1>

    <div class="form-wrapper">
        <div class="form-title">Your Information</div>

        @if(session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('become-seller') }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-3">
                <label for="store_name" class="form-label">Full Name</label>
                <input type="text" name="store_name" class="form-control @error('store_name') is-invalid @enderror" value="{{ old('store_name') }}">
                @error('store_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}">
                @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Register as Seller</button>


        </form>

    </div>
</div>
<img src="{{ asset('assets/background/Vectorwave.png') }}" class="wave" alt="">
