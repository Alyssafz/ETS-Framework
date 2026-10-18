<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Barang</h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/barang.css') }}">

    <div class="barang-wrap narrow">
        <form action="{{ route('barang.store') }}" method="POST" class="card-form">
            @csrf
            @include('barang._form')
            <div class="form-actions">
                <a class="btn" href="{{ route('barang.index') }}">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan barang</button>
            </div>
        </form>
    </div>
</x-app-layout>
