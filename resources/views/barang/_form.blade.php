{{-- Dipakai create & edit. @csrf dipasang di view pemanggil. --}}
<div class="form-grid">
    <div class="form-group full">
        <label for="nama_barang">Nama barang *</label>
        <input id="nama_barang" type="text" name="nama_barang" maxlength="255" required
               class="@error('nama_barang') is-invalid @enderror"
               value="{{ old('nama_barang', $barang->nama_barang ?? '') }}">
        @error('nama_barang') <span class="field-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="harga">Harga (Rp) *</label>
        <input id="harga" type="number" name="harga" min="0" step="any" required
               class="@error('harga') is-invalid @enderror"
               value="{{ old('harga', $barang->harga ?? '') }}">
        @error('harga') <span class="field-error">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="qty">Qty *</label>
        <input id="qty" type="number" name="qty" min="0" step="1" required
               class="@error('qty') is-invalid @enderror"
               value="{{ old('qty', $barang->qty ?? '') }}">
        @error('qty') <span class="field-error">{{ $message }}</span> @enderror
    </div>
</div>
