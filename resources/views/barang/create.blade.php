r<x-pawcare-layout title="Tambah Barang" subtitle="Isi data barang baru">
    <form action="{{ route('barang.store') }}" method="POST" class="form-card">
        @csrf
        @include('barang._form')
        <div class="form-actions">
            <a class="btn btn-secondary" href="{{ route('barang.index') }}">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</x-pawcare-layout>
