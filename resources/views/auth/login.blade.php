<x-guest-layout>
    @if (session('status'))
        <div class="alert ok">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert" role="alert">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   placeholder="Masukkan email" required autofocus autocomplete="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                   placeholder="Masukkan password" required autocomplete="current-password">
        </div>
        <button type="submit" class="btn-login">Masuk</button>
    </form>

    @if (Route::has('register'))
        <p class="auth-link">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
    @endif
</x-guest-layout>
