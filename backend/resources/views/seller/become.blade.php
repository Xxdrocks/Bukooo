@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Sebagai Seller</h2>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('/become-seller') }}" method="POST" class="mt-4">
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
@endsection
