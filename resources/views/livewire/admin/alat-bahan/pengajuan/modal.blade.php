<div>
    <div wire:ignore.self class="modal fade" id="ModalPengajuan">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        @if ($updateMode)
                            <h5 class="modal-title" id="modallabel">Edit Pengajuan</h5>
                        @else
                            <h5 class="modal-title" id="modallabel">Ajukan Alat atau Bahan</h5>
                        @endif
                        <button type="button" class="close" data-dismiss="modal"
                            wire:click.prevent='cancel()'><span>×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            {{-- preview img --}}
                            @if ($updateMode)
                                @if ($image)
                                    <div class="mb-3 mx-auto col-lg-6">
                                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid" alt="Preview Image">
                                    </div>
                                @else
                                    <div class="mb-3 mx-auto col-lg-6">
                                        <img src="{{ asset('storage/' . $imageprev) }}" class="img-fluid"
                                            alt="Preview Image">
                                    </div>
                                @endif
                            @else
                                @if ($image)
                                    <div class="mb-3 mx-auto col-lg-6">
                                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid" alt="Preview Image">
                                    </div>
                                @else
                                    <div class="mb-3 mx-auto col-lg-6">
                                        <svg class="bd-placeholder-img img-thumbnail" width="200" height="200"
                                            xmlns="http://www.w3.org/2000/svg" role="img"
                                            aria-label="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera: 200x200"
                                            preserveAspectRatio="xMidYMid slice" focusable="false">
                                            <title>A generic square placeholder image with a white border around it,
                                                making it resemble a photograph taken with an old instant camera</title>
                                            <rect width="100%" height="100%" fill="#868e96"></rect>
                                            <text y="50%" x="20%" fill="#dee2e6" dy=".3em">Gambar
                                                Preview</text>
                                        </svg>
                                    </div>
                                @endif
                            @endif
                            {{-- end preview img --}}
                            <div class="form-row mb-3">
                                <div class="col">
                                    <input type="file" class="form-control-file" wire:model='image'>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="tanggal" class="col-md-auto col-form-label">Tanggal
                                        Masuk</label>
                                    <div class="col mb-4">
                                        <input wire:model="tanggal_masuk" type="date" id="tanggal"
                                            class="form-control input-default">
                                        @error('tanggal_masuk')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col mb-4">
                                        <select wire:model="kode" class="form-control" id="kode">
                                            <option value="" selected>JENIS</option>
                                            <option value="A">Alat</option>
                                            <option value="B">Bahan</option>
                                        </select>
                                        @error('kode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-4">
                                        <input wire:model="nama_alat_atau_bahan" type="text"
                                            class="form-control input-default" placeholder="Nama Alat Atau Bahan">
                                        @error('nama_alat_atau_bahan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input wire:model="sumber_dana" type="text" id="sumber_dana"
                                            class="form-control input-default" placeholder="Sumber Dana">
                                        @error('sumber_dana')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <input wire:model="volume" type="text" id="volume"
                                            class="form-control input-default" placeholder="Jumlah">
                                        @error('volume')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <input wire:model="satuan" type="text" id="satuan"
                                            class="form-control input-default" placeholder="Satuan">
                                        @error('satuan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input wire:model="saldo" type="text" id="saldo"
                                            class="form-control input-default" placeholder="Harga">
                                        @error('saldo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <label>Spesifikasi</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col mb-4">
                                        <input wire:model="merk" type="text" id="spek"
                                            class="form-control input-default" placeholder="Merk">
                                        @error('merk')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col mb-4">
                                        <input wire:model="type" type="text" class="form-control input-default"
                                            placeholder="Type/Model">
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col mb-4">
                                        <input wire:model="dimensi" type="text" class="form-control input-default"
                                            placeholder="Dimensi">
                                        @error('dimensi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            wire:click.prevent='cancel()'>Batalkan</button>
                        @if ($updateMode)
                            <button type="button" class="btn btn-primary"
                                wire:click.prevent="update()">Simpan</button>
                        @else
                            <button type="button" class="btn btn-primary"
                                wire:click.prevent="store()">Tambahkan</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
