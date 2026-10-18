<x-guest-layout>
    @if ($errors->any())
        <div class="alert" role="alert">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                   placeholder="Nama lengkap" required autofocus autocomplete="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   placeholder="nama@email.com" required autocomplete="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                   placeholder="Minimal 8 karakter" required autocomplete="new-password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Ulangi password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                   placeholder="Ketik ulang password" required autocomplete="new-password">
        </div>
        <button type="submit" class="btn-login">Daftar →</button>
    </form>

    <p class="auth-link">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
</x-guest-layout>
