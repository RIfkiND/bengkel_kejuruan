<div>
    <div wire:ignore.self class="modal fade" id="ModalMuridKelas" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <form>
                    <div class="modal-header">
                        @if ($updateMode)
                            <h4 class="modal-title" id="myModalLabel">Edit Murid</h4>
                        @else
                            <h4 class="modal-title" id="myModalLabel">Tambahkan Murid</h4>
                        @endif
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click.prevent='cancel()'>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama Murid" wire:model='nama_murid'>
                            @error('nama_murid')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click.prevent='cancel()'>Batal</button>
                        @if ($updateMode)
                            <button type="button" class="btn btn-primary" wire:click.prevent="update()">Simpan</button>
                        @else
                            <button type="button" class="btn btn-primary"
                                wire:click.prevent="store()">Tambahkan</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="ModalImportMuridKelas" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Import Murid Dari Excel</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click.prevent='cancel()'>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <h6>Pastikan Data Nama Murid Ada di Kolom A dan Mulai dari Baris 1 <br> Seperti Pada
                                    Gambar :</h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <img src="/Asset/images/murid-tutor.png" alt="" width="50%">
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control mb-2" type="file" wire:model="file" required>
                            @if ($errors->has('file'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('file') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click.prevent='cancel()'>Batal</button>
                        <button type="button" class="btn btn-primary" wire:click.prevent="importMurids()"
                            wire:loading.attr="disabled">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="ModalGuruKelas" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tambahkan Guru</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            wire:click.prevent='cancel()'>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Daftar Guru (tahan shift untuk pilih lebih dari satu):</label>
                            <select multiple="multiple" class="form-control" id="sel2" wire:model='guru_ids'>
                                @foreach ($gurus as $guru)
                                    <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click.prevent='cancel()'>Batal</button>
                        <button type="button" class="btn btn-primary"
                            wire:click.prevent="store_guru()">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
