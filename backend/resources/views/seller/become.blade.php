<style>
    /* Kontainer keseluruhan */
.container {
    max-width: 600px;
    margin: 40px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.container h2 {
    font-size: 1.8rem;
    color: #2c3e50;
    margin-bottom: 20px;
}

.form-label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #34495e;
}

.form-control {
    width: 100%;
    padding: 12px 14px;
    font-size: 15px;
    border: 1px solid #ccc;
    border-radius: 10px;
    transition: all 0.3s ease;
    background-color: #fafafa;
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

/* Margin top utilitas */
.mt-2 {
    margin-top: 0.5rem;
}

.mt-4 {
    margin-top: 1.5rem;
}

</style>


    @include('components.nav')

<div class="container mt-4">
    <h2>Daftar Sebagai Seller</h2>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('become-seller') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="store_name" class="form-label">Nama Toko</label>
            <input type="text" name="store_name" class="form-control @error('store_name') is-invalid @enderror" value="{{ old('store_name') }}">
            @error('store_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">No. HP</label>
            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}">
            @error('phone_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Daftar Sebagai Seller</button>
    </form>
</div>
