<h1>Login</h1>

<form action="/login" method="POST">
    @csrf

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Login</button>
</form>

<a href="/register">Create an account</a>