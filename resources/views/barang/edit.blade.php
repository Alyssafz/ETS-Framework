<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ubah Barang</h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/barang.css') }}">

    <div class="barang-wrap narrow">
        <form action="{{ route('barang.update', $barang->id) }}" method="POST" class="card-form">
            @csrf
            @method('PUT')
            @include('barang._form')
            <div class="form-actions">
                <a class="btn" href="{{ route('barang.index') }}">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan perubahan</button>
            </div>
        </form>
    </div>
</x-app-layout>
