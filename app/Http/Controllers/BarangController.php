<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangRequest;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barangs = Barang::query()
            ->when($request->q, fn ($query, $q) => $query->where('nama_barang', 'like', '%' . $q . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(BarangRequest $request)
    {
        Barang::create($request->validated());
        return redirect()->route('barang.index')->with('success', 'Barang ditambahkan ✓');
    }

    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(BarangRequest $request, string $id)
    {
        Barang::findOrFail($id)->update($request->validated());
        return redirect()->route('barang.index')->with('success', 'Barang diperbarui ✓');
    }

    public function destroy(string $id)
    {
        Barang::findOrFail($id)->delete();
        return redirect()->route('barang.index')->with('success', 'Barang dihapus.');
    }
}
