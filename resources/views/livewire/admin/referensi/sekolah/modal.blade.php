<div>
    <div wire:ignore.self class="modal fade" id="ModalSekolah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <form>
                    <div class="modal-header">
                        @if ($updateMode)
                            <h4 class="modal-title" id="myModalLabel">Edit Sekolah</h4>
                        @else
                            <h4 class="modal-title" id="myModalLabel">Tambahkan Sekolah</h4>
                        @endif
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click.prevent='cancel()'>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="SMKN 1 DAERAH"
                                wire:model='nama_sekolah'>
                            @error('nama_sekolah')
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

    <div wire:ignore.self class="modal fade" id="ModalImportSekolah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Import Data Dari Excel</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click.prevent='cancel()'>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <h6>Pastikan Data Nama Sekolah Ada di Kolom A dan Mulai dari Baris 1 <br> Seperti Pada
                                    Gambar :</h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <img src="/Asset/images/sekolah-tutor.png" alt="" width="50%">
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-file mb-2" type="file" wire:model="file">
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
                        <button type="button" class="btn btn-primary" wire:click.prevent="importSekolah()"
                            wire:loading.attr="disabled">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
