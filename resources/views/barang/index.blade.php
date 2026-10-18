<x-pawcare-layout title="Data Barang" subtitle="Kelola barang yang tersedia">
    <x-slot name="actions">
        <a class="btn btn-primary" href="{{ route('barang.create') }}">Tambah Barang</a>
    </x-slot>

    <form method="GET" action="{{ route('barang.index') }}" class="toolbar">
        <div class="search-box">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama barang..." aria-label="Cari nama barang">
        </div>
        <button type="submit" class="btn btn-secondary">Cari</button>
        @if (request('q'))
            <a class="btn btn-secondary" href="{{ route('barang.index') }}">Reset</a>
        @endif
    </form>

    <div class="rt-outer">
        <div class="rt-table-wrap">
            <table class="rt-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama barang</th>
                        <th class="num">Harga</th>
                        <th class="num">Qty</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $b)
                        <tr class="data-row">
                            <td class="code">{{ $barangs->firstItem() + $loop->index }}</td>
                            {{-- {{ }} otomatis di-escape, aman dari XSS --}}
                            <td class="name">{{ $b->nama_barang }}</td>
                            <td class="num">Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
                            <td class="num">{{ $b->qty }}</td>
                            <td class="act">
                                <div class="act-group">
                                    <a class="btn btn-edit btn-sm" href="{{ route('barang.edit', $b->id) }}">Edit</a>
                                    <form action="{{ route('barang.destroy', $b->id) }}" method="POST"
                                          onsubmit="return confirm('Hapus barang ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" aria-label="Hapus barang"></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="empty-row">
                            <td colspan="5">
                                {{ request('q') ? 'Tidak ada barang yang cocok dengan pencarian.' : 'Belum ada barang. Klik "Tambah Barang" untuk mulai.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="rt-footer">
            <span>Menampilkan {{ $barangs->firstItem() ?? 0 }}–{{ $barangs->lastItem() ?? 0 }} dari {{ $barangs->total() }} barang</span>
            {{ $barangs->links('vendor.pagination.report') }}
        </div>
    </div>
</x-pawcare-layout>
