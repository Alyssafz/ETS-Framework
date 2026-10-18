<x-pawcare-layout title="Edit Barang" subtitle="Perbarui data barang">
    <form action="{{ route('barang.update', $barang->id) }}" method="POST" class="form-card">
        @csrf
        @method('PUT')
        @include('barang._form')
        <div class="form-actions">
            <a class="btn btn-secondary" href="{{ route('barang.index') }}">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
        </div>
    </form>
</x-pawcare-layout>
