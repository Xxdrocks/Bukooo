
<h2>Edit User</h2>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf

    <p>
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
        @error('name') <br><span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
        @error('email') <br><span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label for="password">Password (kosongkan jika tidak diubah):</label><br>
        <input type="password" name="password" id="password">
        @error('password') <br><span>{{ $message }}</span> @enderror
    </p>

    <p>
        <label for="role">Role:</label><br>
        <select name="role" id="role">
            <option value="seller" {{$user->getAttribute('role')}}>Seller</option>
            <option value="user" {{ $user->getAttribute('role') }}>User</option>
        </select>
        @error('role') <br><span>{{ $message }}</span> @enderror
    </p>

    <p>
        <button type="submit">Update User</button>
    </p>
</form>
