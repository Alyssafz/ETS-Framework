<x-pawcare-layout title="Profil" subtitle="Kelola data akun dan keamanan login">
    <div class="profile-stack">

        {{-- 1. Informasi profil --}}
        <form method="POST" action="{{ route('profile.update') }}" class="form-card">
            @csrf
            @method('PATCH')

            <h2 class="section-title">Informasi profil</h2>
            <p class="section-desc">Ubah nama dan alamat email akunmu.</p>

            @if (session('status') === 'profile-updated')
                <div class="alert ok" role="status">Profil berhasil disimpan.</div>
            @endif

            <div class="form-grid">
                <div class="form-group full">
                    <label for="name">Nama</label>
                    <input id="name" type="text" name="name" required autocomplete="name"
                           class="@error('name') is-invalid @enderror"
                           value="{{ old('name', $user->name) }}">
                    @error('name') <span class="field-error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group full">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required autocomplete="username"
                           class="@error('email') is-invalid @enderror"
                           value="{{ old('email', $user->email) }}">
                    @error('email') <span class="field-error">{{ $message }}</span> @enderror
                </div>
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert" style="margin-top:16px">
                    Email belum diverifikasi.
                    <button form="send-verification" type="submit" class="link-btn">Kirim ulang email verifikasi</button>
                </div>
                @if (session('status') === 'verification-link-sent')
                    <div class="alert ok">Link verifikasi baru sudah dikirim.</div>
                @endif
            @endif

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        <form id="send-verification" method="POST" action="{{ route('verification.send') }}">@csrf</form>

        {{-- 2. Ganti password --}}
        <form method="POST" action="{{ route('password.update') }}" class="form-card">
            @csrf
            @method('PUT')

            <h2 class="section-title">Ganti password</h2>
            <p class="section-desc">Pakai password yang panjang dan acak supaya akun tetap aman.</p>

            @if (session('status') === 'password-updated')
                <div class="alert ok" role="status">Password berhasil diganti.</div>
            @endif

            <div class="form-grid">
                <div class="form-group full">
                    <label for="current_password">Password saat ini</label>
                    <input id="current_password" type="password" name="current_password" autocomplete="current-password"
                           class="@if($errors->updatePassword->has('current_password')) is-invalid @endif">
                    @if ($errors->updatePassword->has('current_password'))
                        <span class="field-error">{{ $errors->updatePassword->first('current_password') }}</span>
                    @endif
                </div>
                <div class="form-group full">
                    <label for="new_password">Password baru</label>
                    <input id="new_password" type="password" name="password" autocomplete="new-password"
                           class="@if($errors->updatePassword->has('password')) is-invalid @endif">
                    @if ($errors->updatePassword->has('password'))
                        <span class="field-error">{{ $errors->updatePassword->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group full">
                    <label for="new_password_confirmation">Ulangi password baru</label>
                    <input id="new_password_confirmation" type="password" name="password_confirmation" autocomplete="new-password">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Ganti password</button>
            </div>
        </form>

        {{-- 3. Hapus akun --}}
        <form method="POST" action="{{ route('profile.destroy') }}" class="form-card danger-card"
              onsubmit="return confirm('Akun akan dihapus permanen. Lanjutkan?')">
            @csrf
            @method('DELETE')

            <h2 class="section-title">Hapus akun</h2>
            <p class="section-desc">Setelah dihapus, akun dan datanya tidak bisa dikembalikan. Masukkan password untuk konfirmasi.</p>

            <div class="form-grid">
                <div class="form-group full">
                    <label for="delete_password">Password</label>
                    <input id="delete_password" type="password" name="password" autocomplete="current-password"
                           class="@if($errors->userDeletion->has('password')) is-invalid @endif">
                    @if ($errors->userDeletion->has('password'))
                        <span class="field-error">{{ $errors->userDeletion->first('password') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Hapus akun</button>
            </div>
        </form>

    </div>
</x-pawcare-layout>
