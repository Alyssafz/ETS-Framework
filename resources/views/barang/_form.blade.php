{{-- Form dipakai bersama oleh create & edit. @csrf dipasang di view pemanggil. --}}
<div class="field">
    <label for="nama_barang">Nama barang</label>
    <input id="nama_barang" type="text" name="nama_barang" maxlength="255"
           value="{{ old('nama_barang', $barang->nama_barang ?? '') }}" required>
    @error('nama_barang') <small class="error">{{ $message }}</small> @enderror
</div>

<div class="field">
    <label for="harga">Harga (Rp)</label>
    <input id="harga" type="number" name="harga" min="0" step="any"
           value="{{ old('harga', $barang->harga ?? '') }}" required>
    @error('harga') <small class="error">{{ $message }}</small> @enderror
</div>

<div class="field">
    <label for="qty">Qty</label>
    <input id="qty" type="number" name="qty" min="0" step="1"
           value="{{ old('qty', $barang->qty ?? '') }}" required>
    @error('qty') <small class="error">{{ $message }}</small> @enderror
</div>
