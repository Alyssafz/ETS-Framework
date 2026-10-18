<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Barang</h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/barang.css') }}">

    <div class="barang-wrap">
        @if (session('success'))
            <div class="flash" role="status">{{ session('success') }}</div>
        @endif

        <div class="toolbar">
            <p class="muted">{{ $barangs->total() }} barang tercatat</p>
            <a class="btn btn-primary" href="{{ route('barang.create') }}">Tambah barang</a>
        </div>

        <div class="table-scroll">
            <table class="report-table">
                <thead>
                    <tr>
                        <th>Nama barang</th>
                        <th class="num">Harga</th>
                        <th class="num">Qty</th>
                        <th class="actions">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $b)
                        <tr>
                            {{-- {{ }} otomatis di-escape -> aman dari XSS --}}
                            <td>{{ $b->nama_barang }}</td>
                            <td class="num">Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
                            <td class="num">{{ $b->qty }}</td>
                            <td class="actions">
                                <a class="btn" href="{{ route('barang.edit', $b->id) }}">Ubah</a>
                                <form action="{{ route('barang.destroy', $b->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty">Belum ada barang. Klik "Tambah barang" untuk mulai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pager">{{ $barangs->links() }}</div>
    </div>
</x-app-layout>
