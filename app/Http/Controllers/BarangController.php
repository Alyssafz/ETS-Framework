<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangRequest;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::latest()->paginate(10);
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(BarangRequest $request)
    {
        // validated() hanya berisi field yang lolos validasi
        Barang::create($request->validated());
        return redirect()->route('barang.index')->with('success', 'Barang ditambahkan.');
    }

    public function edit(string $id)
    {
        // findOrFail: ID tidak ada -> 404, bukan error 500
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(BarangRequest $request, string $id)
    {
        Barang::findOrFail($id)->update($request->validated());
        return redirect()->route('barang.index')->with('success', 'Barang diperbarui.');
    }

    public function destroy(string $id)
    {
        Barang::findOrFail($id)->delete();
        return redirect()->route('barang.index')->with('success', 'Barang dihapus.');
    }
}
